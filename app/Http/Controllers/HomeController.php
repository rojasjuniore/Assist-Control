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
use App\Pais;
use App\Repositories\EstudiosRepository;

class HomeController extends Controller
{

    private $estudiosRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EstudiosRepository $estudiosRepo)
    {
        /**
         * Just for testing Vue components
         */
        $this->middleware('auth');
        $this->estudiosRepository = $estudiosRepo;
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

        if(Auth::user()->password_admin){
            $password_admin = 1;
            $user = Auth::user();
        }else{
            $password_admin = 0;
            $user = '';
        }

        $estudios = $this->estudiosRepository->orderBy('id', 'DESC')
            ->limit(200)
            ->get();

        $completeData = Auth::user()->completeData;
        $promocion = Pricing::where('promocion','=','1')->first();
        $sincard = 1;

        return view('home-one', compact('password_admin', 'user', 'promocion', 'sincard', 'completeData', 'estudios'));
        
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
        $paises = Pais::all();
        $user = User::where('code_cliente',Auth::user()->code_cliente)->first();
        $sincard = 1;

        return view('perfil',compact('user','sincard','paises'));
    }

    public function storeperfil(Request $data)
    {
        $user = User::where('id_cliente',Auth::user()->id_cliente)->first();
        $user->fill([
            'nombre' => $data['nombre'],
            'pais_id' => $data['pais_id'],
            'estado_id' => $data['estado_id'],
            'ciudad_id' => $data['ciudad_id'],
            'telefono' => $data['telefono'],
            'fax' => $data['fax'],
            'direccion' => $data['direccion'],
            'completeData' => 0
        ]);

        $password = $data->input('password');

        if($password) {
            $user['password'] = md5($password);
        }

        $user->save();

        return back()->with('info', 'Datos Guardados Satisfactoriamente');

    }
}
