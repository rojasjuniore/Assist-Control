<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsuariosController extends Controller
{
    public function index(){
        $users = User::all();            
        return view('usuarios.index', compact( 'users'));
    }

}
