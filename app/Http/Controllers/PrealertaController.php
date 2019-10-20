<?php

namespace App\Http\Controllers;

use App\Prealerta;
use Illuminate\Http\Request;
use Auth;
use \App\Direccion;
use App\Pagodhl;

class PrealertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prealertas = Prealerta::where('id_cli',Auth::user()->id_cliente)->get();
        $direcciones = Direccion::where('id_cliente',Auth::user()->id_cliente)->get();
        $direccion1 = Auth::user()->direccion.', '.Auth::user()->ciudad.', '.Auth::user()->pais;
        $pagodhl = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('estatus', 'pendiente')->first();
        if($pagodhl == ''){
            $pagodhl = 0;
        }
        return view('prealertas.index', compact('prealertas','direcciones','direccion1','pagodhl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = date_create()->format('Y-m-d H:i:s');
        $destinationPath = 'productos';
        $count = 0;
        $imagenes='';
        $items = $request->file('file');
        $dir = Direccion::where('id_direccion_cliente', $request->direccion)->first();
        foreach($items as $item) {
            $filename = 'fl'.$request->nu_orden.$request->idc.$count.'.'.$item->getClientOriginalExtension();
            $upload_success = $item->move(public_path().'/files/', $filename);
            $imagenes =  $imagenes.';'.$filename; 
            $count++;
        }
        $item = Prealerta::create([
            'id_cli' => $request->id_cli,
            'nu_orden' => $request->nu_orden,
            'tienda' => $request->tienda,
            'descripcion' => $request->descripcion,
            'doc' =>substr($imagenes,1),
            'valor' => $request->valor,
            'tracking' => $request->tracking,
            'courier' => $request->courier,
            'fecha' => $now,
            'tipo_envio' =>$request->estatus,
            'direccion' => $dir->direccion.'/'.$dir->ciudades->ciudad.'/'.$dir->paises->pais,
            'id_direccion' => $request->direccion,
        ]);
        
        return $request;
    }

     public function mostrar($id){
        $prealertas = Prealerta::where('id_orden_cli',$id)->first();
        return view('prealertas.mostrar', compact('prealertas'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Prealerta  $prealerta
     * @return \Illuminate\Http\Response
     */
    public function show(Prealerta $prealerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prealerta  $prealerta
     * @return \Illuminate\Http\Response
     */
    public function edit(Prealerta $prealerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prealerta  $prealerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prealerta $prealerta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prealerta  $prealerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prealerta $prealerta)
    {
        //
    }
}
