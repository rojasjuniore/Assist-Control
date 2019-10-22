<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicioAdicional;
use App\Icon;

class ServicioAdicionalController extends Controller
{
    public function get()
    {
         $itemsd = ServicioAdicional::all();
        return response()->json($itemsd);
    }
    public function iconget(){
        $itemsd = Icon::all();
        return response()->json($itemsd);
    }
    public function store(Request $request)
    {
         $item = ServicioAdicional::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'icono' => $request->icono,
            'descripcion' => $request->descripcion,
        ]);
        return response()->json();
    }

    public function destroy($id)
    {
       $item = ServicioAdicional::find($id);
       $item->delete();
    }

    public function icono(Request $request){

    if ($request->hasFile('icon')) {

         $file = $request->file('icon');
         $name= str_replace(' ', '', $request->iconname);
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =$name.'.'.$extension;
          $file->move('icons', $filename);
            $item = Icon::create([
                'url' => $filename,
                'nombre' => $request->iconname,
            ]);
       return ('success');
    }else{
        return ($request);
    }
    
    }
}
