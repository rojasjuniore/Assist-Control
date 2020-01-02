<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Pais;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * Just for testing Vue components
         */
        $this->middleware('auth');
    }

    public function dashboard(){

        if(Auth::user()->password_admin){
            $password_admin = 1;
            $user = Auth::user();
        }else{
            $password_admin = 0;
            $user = '';
        }

        $completeData = Auth::user()->completeData;
        $sincard = 1;

        return view('home-one', compact('password_admin', 'user', 'sincard', 'completeData'));
        
    }

    public function perfil()
    {
        $paises = Pais::all();
        $user = User::where('id',Auth::user()->id)->first();
        $sincard = 1;

        return view('perfil',compact('user','sincard','paises'));
    }

    public function storeperfil(Request $data)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->fill([
            'nombre' => $data['nombre'],
            'pais_id' => $data['pais_id'],
            'estado_id' => $data['estado_id'],
            'ciudad_id' => $data['ciudad_id'],
            'telefono' => $data['telefono'],
            'fax' => $data['fax'],
            'direccion' => $data['direccion'],
            'completeData' => 0
        ]);

        $password = $data->input('password');

        if($password) {
            $user['password'] = md5($password);
        }

        $user->save();

        return back()->with('info', 'Datos Guardados Satisfactoriamente');

    }
}
