<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\FacturaOrdenDescripcion;
use App\FacturaOrder;
use App\Order;
use App\Pricing;
use Illuminate\Http\Request;
use App\FacturacionHistorial;
use Auth;
use App\User;
use App\Direccion;
use App\Visita;
use App\Notifications\WelcomeNotification;
use App\Pagodhl;
use App\Promocion;
use App\PromocionVar;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * Just for testing Vue components
         */
        $this->middleware('auth');
//        \Auth::loginUsingId(1);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $titulopagina = 'Bivenidos a Casillero Express - Inicio';
        return view('front.home', [
            'titulopagina' => $titulopagina
        ]);
    }
    public function dashboard(){
        $visita = Visita::where('code_cliente',Auth::user()->code_cliente)->first();
        if($visita){
          
        }else{
             $item = Visita::create([
                'code_cliente' => Auth::user()->code_cliente,
                'prealerta' => 0,
                'home' => 0,
            ]);
        }
        $direcciones = Direccion::where('id_cliente',Auth::user()->id_cliente)->get();
        $direccion1 = Auth::user()->direccion.', '.Auth::user()->ciudad.', '.Auth::user()->pais;
//        $pagodhl = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('estatus', 'pendiente')->first();
//        if($pagodhl == ''){
//            $pagodhl = 0;
//        }

        //$invoicePayable = $this->invoicePayable(Auth::user()->id_cliente);
//        echo json_encode($invoicePayable);
//        die();
        $invoicePayable=0;

        if(Auth::user()->password_admin){
            $password_admin = 1;
            $user = Auth::user();
        }else{
            $password_admin = 0;
            $user = '';
        }

        $completeData = 0;
        if(!Auth::user()->password){
            $completeData = 1;
        }

        $promocion = Pricing::where('promocion','=','1')->first();
        $sincard = 1;

        return view('home-one', compact('visita','direcciones','direccion1', 'invoicePayable', 'password_admin', 'user', 'promocion', 'sincard', 'completeData'));
        
    }

    public function invoicePayable($id_client)
    {
        $cliente = Clientes::where('id_cliente',$id_client)->first();
        if($cliente->cliente_envio != 0){
            return array('result'=>0, 'cant'=>0);
        }
        $facturaOrden = DB::table('factura_orden')
                        ->leftJoin('email', 'email.id_orden', '=', 'factura_orden.id_factura_orden')
                        ->whereNull('email.estatus')
                        ->where('factura_orden.estatus',1)
                        ->where('factura_orden.id_cliente',$id_client)->get();
        /*FacturaOrder::where('id_cliente',$id_client)
            ->leftJoin('email', 'email.id_orden', '=', 'posts.user_id')
            ->where('factura_ordenestatus',1)->get();*/
        if(count($facturaOrden) > 0){
            return array('result'=>1, 'cant'=>count($facturaOrden));
        }else{
            return array('result'=>0, 'cant'=>0);
        }
    }

    public function soporte(){
        return view('soporte');
    }

    public function facturaciondhl(){
        $pagos = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('estatus', 'pendiente')->get();
        if($pagos == ''){
            $pagos = '0';
        }
        return view('facturaciondhl.index', compact('pagos'));
    }

    public function facturacioncomun(){
//        $facturaOrdenes = FacturaOrder::where('id_cliente',Auth::user()->id_cliente)->where('estatus',1)->get();

        $facturaOrdenes = DB::table('factura_orden')
            ->leftJoin('email', 'email.id_orden', '=', 'factura_orden.id_factura_orden')
            ->whereNull('email.estatus')
            ->where('factura_orden.estatus',1)
            ->where('factura_orden.id_cliente',Auth::user()->id_cliente)
            ->orderBy('id_factura_orden', 'DESC')
            ->get();

        if(count($facturaOrdenes) < 0){
            $facturaOrdenes = '0';
        }
        return view('facturacioncomun.index', compact('facturaOrdenes'));
    }

    static public function getDetailFactura($id_factura)
    {
        $facturaDescripciones = FacturaOrdenDescripcion::where('id_factura_orden', $id_factura)->get();
        $detail = array();
        if($facturaDescripciones){
            foreach ($facturaDescripciones as $facturaDescripcion){
                $orden = Order::where('id_orden', $facturaDescripcion->id_orden)->first();
                if($orden){
                    $detail[] = array('ware_reciept'=>$orden->ware_reciept, 'descripcion'=>$orden->descripcion);
                }
            }
            return $detail;
        }
        return array();
    }

    public function promocion(){
        $promo = Promocion::all();
        $promovar = PromocionVar::whereNotNull('precio')->get();
        return view('promocion', compact('promo','promovar'));
    }


    public function homeTwo()
    {
        return view('home-two');
    }

    public function stripe()
    {
        $historial = FacturacionHistorial::where('code_cliente',Auth::user()->code_cliente)->get();
        return view('stripe',compact('historial'));
    }

    public function perfil()
    {
        $user = User::where('code_cliente',Auth::user()->code_cliente)->first();
        return view('perfil',compact('user'));
    }
    public function storeperfil(Request $data)
    {
        $user = User::where('code_cliente',Auth::user()->code_cliente)->first();
        $user->fill([
            'nombre' => $data['nombre'],
            'telefono' => $data['tlf_personal'],
            'ciudad' => $data['ciudad'],
            'pais' => $data['pais'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
        ]);
        $user->save();
        Direccion::create([
            'id_cliente' => $user->id_cliente,
            'direccion' => $user->direccion,
            'id_pais' => $user->pais,
            'id_ciudad' => $user->ciudad,
        ]);
        return back();

    }
}
