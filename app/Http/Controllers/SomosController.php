<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomosController extends Controller
{
    //
    public function index (){
    		$titulopagina = 'Bivenidos a Casillero Express - Somos';
    		return view('front.somos', [
    			'titulopagina' => $titulopagina
    		]);
    }
}
