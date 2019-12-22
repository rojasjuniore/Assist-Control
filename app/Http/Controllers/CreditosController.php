<?php

namespace App\Http\Controllers;

use App\Creditos;
use App\Pricing;
use Illuminate\Http\Request;

class CreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promocion = Pricing::where('promocion','=','1')->first();
        $princings = Pricing::where('promocion','!=','1')->get();
        $sincard = 1;

        return view('creditos.create', compact('promocion', 'princings', 'sincard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function show(Creditos $creditos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function edit(Creditos $creditos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creditos $creditos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creditos  $creditos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creditos $creditos)
    {
        //
    }
}
