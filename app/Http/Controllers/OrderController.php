<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\OrderDespacho;
use App\Direccion;
use App\FechaDespacho;
use App\OrderStatus;
use App\Visita;
use App\ServicioCompra;
use App\ServicioGuias;
use App\Pagodhl;
use App\OrdenDhl;
use App\User;
use App\Ciudad;
use App\Pais;
use App\Notifications\ProgramarNotification;

class OrderController extends Controller
{
    public function setValor($valor){
        $this->code_cliente = $valor;
    }
    public function index()
    {
         $ordenes = Order::where('code_cliente',Auth::user()->code_cliente)->get(); 
       /*   $ordenes = Order::where('ware_reciept','CO2324-52123874')->get(); */
         
         $programar = Order::where('code_cliente',Auth::user()->code_cliente)->where('status',0)->get();
        return view('ordenes.index', compact('ordenes','programar'));
    }
    
    public function list(){
        $orders =  Order::all(); 
        return view('listadoordenes.index', compact('orders'));

    }

    public function programar(Request $request)
    {
        $hora = getdate();
        $hoy = date('Y-m-d',strtotime("now"));
        $ayer = date('Y-m-d',strtotime("-1 days"));
        if($hora['hours'] >= '11'){
            $ordenest= OrderDespacho::where('code_cliente',Auth::user()->code_cliente)->where('fecha_registro','>=', $hoy." ".'11:00:00')->get();
            $total = 0;
            foreach($ordenest as $orden){
                $total = $total + $orden->valor_declarado; 
            }
            $vtotal = $total; 
        }else{
            $ordenest= OrderDespacho::where('code_cliente',Auth::user()->code_cliente)->where('fecha_registro','>=', $ayer." ".'11:00:00')->where('fecha_registro','<',$hoy." ".'11:00:00')->get();
            $total = 0;
            foreach($ordenest as $orden){
                $total = $total + $orden->valor_declarado;  
            }
            $vtotal = $total; 
        }
        if($request->seleccionados){
            $items = explode(",", $request->seleccionados); 
                 $programar = Order::whereIn('id_orden',$items)->get();
        }else{
            $programar = Order::where('code_cliente',Auth::user()->code_cliente)->where('status',0)->get();
        }
         $direcciones = Direccion::where('id_cliente',Auth::user()->id_cliente)->with('paises')->with('ciudades')->get();
         $direccion1 = Auth::user()->direccion.', '.Auth::user()->ciudad.', '.Auth::user()->pais;
         $visita = Visita::where('code_cliente',Auth::user()->code_cliente)->first();
         $pagodhl = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('estatus', 'pendiente')->first();
        if($pagodhl == ''){
            $pagodhl = 0;
        }
           return view('programarenvio.index', compact('programar','direcciones','vtotal','direccion1','visita','pagodhl'));  
    }

    public function visitap($code){
        $findVisita = Visita::where('code_cliente',$code)->first();
        if($findVisita){
            $findVisita->fill([
                'prealerta' => 1,
            ]);
            $findVisita->save();
            return response()->json();
        }else{
            $item = Visita::create([
                'code_cliente' => $code,
                'prealerta' => 1,
            ]);
            return response()->json();
        }
    }
    public function visitah($code){
        $findVisita = Visita::where('code_cliente',$code)->first();
        if($findVisita){
            $findVisita->fill([
                'home' => 1,
            ]);
            $findVisita->save();
            return response()->json();
        }else{
            $item = Visita::create([
                'code_cliente' => $code,
                'home' => 1,
            ]);
            return response()->json();
        }
       
    }
    public function getdhl($zip,$ids,$total){

      $pais = Ciudad::where('zip',$zip)->first();
      $countrycode = Pais::where('id_pais', $pais->id_pais)->first();
        $paq =  '';
        $ids = substr($ids, 0, -1);
        $paquetes = explode(",",$ids);
        $libras = 0;
        for($i = 0; $i < count($paquetes); $i++ ){
            $apaquetes[$i]= Order::where('ware_reciept',$paquetes[$i])->first();
        } 
        if($pais->id_pais == "97"){
          $data= '';
        $data= $data.'<?xml version="1.0" encoding="UTF-8"?>
        <p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
          <GetQuote>
            <Request>
              <ServiceHeader>
                <MessageTime>2002-08-20T11:28:56.000-08:00</MessageTime>
                <MessageReference>1234567890123456789012345678901</MessageReference>
                        <SiteID>v62_qKzE5RjCAJ</SiteID>
                        <Password>plsQoQN8Q5</Password>
              </ServiceHeader>
            </Request>
            <From>
               <CountryCode>US</CountryCode>
              <Postalcode>32801</Postalcode>
            </From>
            <BkgDetails>
              <PaymentCountryCode>CO</PaymentCountryCode>
              <Date>2019-04-24</Date>
              <ReadyTime>PT10H21M</ReadyTime>
              <ReadyTimeGMTOffset>+01:00</ReadyTimeGMTOffset>
              <DimensionUnit>CM</DimensionUnit>
              <WeightUnit>KG</WeightUnit>
              <Pieces>
              ';

              for($i = 0; $i < count($apaquetes); $i++ ){
                $libras = $libras + $apaquetes[$i]->peso;
                $data =$data.'
                <Piece>
                <PieceID>'.$i.'</PieceID>
                <Height>'.$apaquetes[$i]->alto.'</Height>
                <Depth>'.$apaquetes[$i]->largo.'</Depth>
                <Width>'.$apaquetes[$i]->ancho.'</Width>
                <Weight>'.$apaquetes[$i]->peso.'</Weight>
                </Piece>
                ';
                 }      
                $data =$data.'
              </Pieces>
                          <PaymentAccountNumber>683075599</PaymentAccountNumber>     
              <IsDutiable>N</IsDutiable>
              <NetworkTypeCode>AL</NetworkTypeCode>
                          <QtdShp>
                                    <GlobalProductCode>D</GlobalProductCode>
                             <LocalProductCode>D</LocalProductCode>                              
                             <QtdShpExChrg>
                    <SpecialServiceType>AA</SpecialServiceType>
                 </QtdShpExChrg>
                          </QtdShp>
            </BkgDetails>
            <To>
              <CountryCode>CO</CountryCode>
              <Postalcode>'.$zip.'</Postalcode>
            </To>
           <Dutiable>
              <DeclaredCurrency>USD</DeclaredCurrency>
              <DeclaredValue>'.$total.'</DeclaredValue>
            </Dutiable>
          </GetQuote>
        </p:DCTRequest>';

        }else{

          $data= '';
        $data= $data.'<?xml version="1.0" encoding="UTF-8"?>
        <p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
          <GetQuote>
            <Request>
              <ServiceHeader>
                <MessageTime>2002-08-20T11:28:56.000-08:00</MessageTime>
                <MessageReference>1234567890123456789012345678901</MessageReference>
                    <SiteID>v62_feJ93XJ4mD</SiteID>
                    <Password>PDtnrS6xyG</Password>
              </ServiceHeader>
            </Request>
            <From>
               <CountryCode>US</CountryCode>
              <Postalcode>32801</Postalcode>
            </From>
            <BkgDetails>
              <PaymentCountryCode>CO</PaymentCountryCode>
              <Date>2019-04-24</Date>
              <ReadyTime>PT10H21M</ReadyTime>
              <ReadyTimeGMTOffset>+01:00</ReadyTimeGMTOffset>
              <DimensionUnit>CM</DimensionUnit>
              <WeightUnit>KG</WeightUnit>
              <Pieces>
              ';

              for($i = 0; $i < count($apaquetes); $i++ ){
                $libras = $libras + $apaquetes[$i]->peso;
                $data =$data.'
                <Piece>
                <PieceID>'.$i.'</PieceID>
                <Height>'.$apaquetes[$i]->alto.'</Height>
                <Depth>'.$apaquetes[$i]->largo.'</Depth>
                <Width>'.$apaquetes[$i]->ancho.'</Width>
                <Weight>'.$apaquetes[$i]->peso.'</Weight>
                </Piece>
                ';
                 }      
                $data =$data.'
              </Pieces>
                          <PaymentAccountNumber>683075599</PaymentAccountNumber>     
              <IsDutiable>N</IsDutiable>
              <NetworkTypeCode>AL</NetworkTypeCode>
                          <QtdShp>
                                    <GlobalProductCode>D</GlobalProductCode>
                             <LocalProductCode>D</LocalProductCode>                              
                             <QtdShpExChrg>
                    <SpecialServiceType>AA</SpecialServiceType>
                 </QtdShpExChrg>
                          </QtdShp>
            </BkgDetails>
            <To>
              <CountryCode>'.$countrycode->Code.'</CountryCode>
              <Postalcode>'.$zip.'</Postalcode>
            </To>
           <Dutiable>
              <DeclaredCurrency>USD</DeclaredCurrency>
              <DeclaredValue>'.$total.'</DeclaredValue>
            </Dutiable>
          </GetQuote>
        </p:DCTRequest>';

        } 


$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, "https://xmlpi-ea.dhl.com/XMLShippingServlet");
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));
$tuData = curl_exec($tuCurl);
curl_close($tuCurl);
$simple = $tuData;
$xml = simplexml_load_string($tuData);
json_encode($xml);
$arancel = $total * 0.10;
if($total > '200'){
    $iva= $total * 0.29;
}else{
    $iva= $total * 0.10;
}
$libras = $libras * 0.30;
$seguro = 7;
$precio = intval($xml->GetQuoteResponse->BkgDetails->QtdShp->QtdShpExChrg[0]->ChargeValue);
$libras = $libras + $precio;
$precio = $precio + $seguro + $arancel + $iva;
$data = new \stdClass();
$data->precio = $precio;
$data->seguro = $seguro;
$data->libras = $libras;
$data->arancel = $arancel;
$data->iva =$iva;
          return response()->json($data);  
    }
    public function store(Request $request)
    {
        $c_cliente = '';
        $now = date_create()->format('Y-m-d H:i:s');
        $id_transaccion = bin2hex(openssl_random_pseudo_bytes(4));
        $mañana = date('Y-m-d H:i:s',strtotime("+1 days"));
        $idorders = '';
        $ordenes = $request->paquetes;
         foreach ($ordenes as $orden) {
            $user = User::where('code_cliente',$orden['code'])->first();
            $item = Order::where('ware_reciept',$orden['id'])->first();
            $idorders = $idorders.$item->id_orden.',';
            $item->fill([
                'costo' => $orden['costo'],
                /*'status' => 1,
                'instrucciones' => 2,*/
            ]);
            $item->save();
            $despacho = OrderDespacho::create([
                'orden' => $orden['id'],
                'descripcion' => $item->descripcion,
                'tipo_envio'=> $request->tipo_envio,
                'valor_declarado' => $orden['costo'],
                'estatus' => 0,
                'fecha_registro' => $now,
                'id_direccion_clientePrimaria' => $request->direccion,
                'code_cliente' => $orden['code'],
            ]);
            if($request->dhl == 1){
              $pagodhl = Pagodhl::create([
                  'id_orden' => $orden['id'],
                  'id_transaccion' => $id_transaccion,
                  'code_cliente' => $orden['code'],
                  'usd' => $request['usd'],
                  'cop' => $request['cop'],
                  'estatus' => 'pendiente',
              ]);    
            }

            if($request->fecha == 0){
                $despachofecha = FechaDespacho::create([
                    'tipo' => '1',
                    'ware_reciept'=> $orden['id'],
                    'fecha_despacho' => $now,
                    ]);
            }else{
                $despachofecha = FechaDespacho::create([
                    'tipo' => '1',
                    'ware_reciept'=> $orden['id'],
                    'fecha_despacho' => $mañana,
                    ]);
            }
            if($request->dhl == 1){
                $ordendhl = Ordendhl::create([
                    'orden' => $orden['id'],
                    'descripcion' => $item->descripcion,
                    'comentario' => $request->comentario,
                    'valor_declarado' => $orden['costo'],
                    'id_usuario_sistema' => $user->id_cliente,
                    'id_direccion_clientePrimaria' => $request->direccion,
                    'code_cliente' => $orden['code'],
                ]);
            }
          
           $c_cliente = $orden['code'];
         } 
         $idorders = substr($idorders, 0, -1);
         $idorders = explode(",", $idorders);
         $ordersnotify = Order::whereIn('id_orden', $idorders)->get();
       
        $compraservicio = ServicioCompra::create([
            'codigo_cliente' => $c_cliente,
        ]); 
        $aux = ''; $precio = 0;
        foreach($request->idselected as $serv){
            $aux = explode(';', $serv);
            ServicioGuias::create([
                'id_servicio' => $aux[0],
                'id_compra' => $compraservicio->id,
                'id_orden' => $aux[1],
            ]);
            $precio = $precio+(int)$aux[2];
        }
        $compraservicio->fill([
            'precio' => $precio,
        ]);
        $compraservicio->save();
        $user = new User();
        $user->nombre = "Admin";
        $user->email = "tracking@gmail.com";
        $user->notify(new ProgramarNotification($ordersnotify));
        return ($ordersnotify);
    }

    function unique_multidim_array($array, $key) { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($array as $val) { 
            if (!in_array($val[$key], $key_array)) { 
                $key_array[$i] = $val[$key]; 
                $temp_array[$i] = $val; 
            } 
            $i++; 
        } 
        return $temp_array; 
    } 

    public function mostrar($id){
        $historial = OrderStatus::where('ware_reciept', $id)->where('estatus','>=',11)->where('estatus','<=',15)->orderBy('estatus','ASC')->get();
        for($i = 0; $i < count($historial); $i++ ){
            $historial[$i]->fecha = date('d', strtotime($historial[$i]->fecha_orden)).'/'.date('m', strtotime($historial[$i]->fecha_orden)).'/'.date('Y', strtotime($historial[$i]->fecha_orden));
        }
        $historial = $this->unique_multidim_array($historial,'estatus');
        $orden = Order::where('ware_reciept',$id)->first();
   
        return view('ordenes.mostrar', compact('historial','orden'));

    }
    public function buscar(Request $request){
        $orden = Order::where('ware_reciept',$request->code)->first();
        if($orden){
            $historial = OrderStatus::where('ware_reciept', $request->code)->where('estatus','>=',11)->where('estatus','<=',15)->orderBy('estatus','ASC')->get();
            for($i = 0; $i < count($historial); $i++ ){
                $historial[$i]->fecha = date('d', strtotime($historial[$i]->fecha_orden)).'/'.date('m', strtotime($historial[$i]->fecha_orden)).'/'.date('Y', strtotime($historial[$i]->fecha_orden));
            }
            $historial = $this->unique_multidim_array($historial,'estatus');
            return view('ordenes.mostrar', compact('historial','orden'));

        }else{
            return view('ordenes.no-encontrado');
        }
        
        
   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
