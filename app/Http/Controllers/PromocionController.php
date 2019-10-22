<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promocion;
use App\PromocionVar;

class PromocionController extends Controller
{
     public function store(Request $request)
    {
        $promocion = Promocion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        foreach ($request->fields as $value) {
        	$variacion = PromocionVar::create([
            'id_promocion' => $promocion->id,
            'precio' => $value['precio'],
            'peso' => $value['peso'],
        ]);
        }
        return response()->json('Exitoso');
    }

      public function get()
    {
         $itemsd = Promocion::all();
        return response()->json($itemsd);
    }

      public function destroy($id)
    {
       $item = Promocion::find($id);
       $item->delete();
    }

}
