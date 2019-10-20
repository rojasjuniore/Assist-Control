<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use Auth;
use App\Pais;
use App\User;
use App\Ciudad;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
       
    }
    public function get($id)
    {
         $itemsd = Direccion::where('id_cliente',$id)->with('paises')->with('ciudades')->get();
        return response()->json($itemsd);
    }
    public function getDir($id,$id_cli)
    {
        if (is_numeric($id)) { 
            $itemsd = Direccion::where('id_direccion_cliente',$id)->with('paises')->with('ciudades')->first();
          }else{
              $user = User::where('id_cliente',$id_cli)->first();
              $ciu = Ciudad::where('id_ciudad',$user->ciudad)->first();
              $itemsd = $ciu->zip;
          }
        
        return response()->json($itemsd);
    }

    public function getpais()
    {
        $paises = Pais::orderBy('pais','ASC')->get();
        return response()->json($paises);
    }

    public function getciudad($id){
        $ciudades = Ciudad::where('id_pais', $id)->orderBy('ciudad','ASC')->get();
        return response()->json($ciudades);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $item = Direccion::create([
            'id_cliente' => $request->id_cliente,
            'direccion' => $request->direccion,
            'id_pais' => $request->id_pais,
            'id_ciudad' => $request->id_ciudad,
        ]);
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Direccion::find($id);
       $item->delete();
    }
    
}
