<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function searchState($pais_id){
        return Estado::where('country_id','=',$pais_id)->get();
    }
}
