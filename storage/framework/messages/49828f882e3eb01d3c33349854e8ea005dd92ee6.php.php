<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function searchCity($estado_id){
        return Ciudad::where('state_id','=',$estado_id)->get();
    }
}
