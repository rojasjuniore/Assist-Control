<?php

namespace App\Http\Controllers;

use App\Creditos;
use App\Pricing;
use Illuminate\Http\Request;

class CreditosController extends Controller
{

    public function store(Request $request)
    {

        $cantidad = $request->input('cantidad');
        $id_cliente = $request->input('cliente_id');

        Creditos::create([
            'cliente_id' => $id_cliente,
            'cantidad' => intval($cantidad),
            'tipo' => 'Credito',
            'fecha' => date("Y-m-d")
        ]);

        return redirect()->route('users.index')
            ->with('info','Abono de '.$cantidad.' Créditos realizado satisfactoriamente.');
    }

    public function promociones()
    {
        $promocion = Pricing::where('promocion','=','1')->first();
        $princings = Pricing::where('promocion','!=','1')->get();
        $sincard = 1;

        return view('creditos.promociones', compact('promocion', 'princings', 'sincard'));
    }

    public function abonar($cliente_id)
    {
        return view('creditos.create', compact('cliente_id'));
    }
}
