<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;
use Hash;
use \App\Direccion;
use Laravel\Socialite\Facades\Socialite;
use App\Notifications\WelcomeNotification;
use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->where('password', md5($request->password))->first();
        if (isset($user->id_cliente)) {
            Auth::login($user);
            return redirect('/dashboard');
        }
        Session::flash('error', 'Los datos ingresados son incorrectos');
        return back();
    }

    public function showLoginFormfacebook()
    {
        return view('auth.loginfacebook');
    }

    public function register(Request $data)
    {

        $validatedData = $data->validate([
            'email' => 'unique:clientes',
        ]);

        $user = User::create([
            'nombre' => $data['nombre'] . ' ' . $data['apellidos'],
            'telefono' => $data['tlf_personal'],
            'ciudad' => $data['ciudad'],
            'pais' => $data['pais'],
            'direccion' => $data['direccion'],
            'email' => $data['email'],
            'cliente_envio' => '1',
            'password' => md5($data['password']),
        ]);
        $code_cliente = ($user->id_cliente + 1000) - 3570;
        $user->code_cliente = 'CA' . $code_cliente;
        $user->save();
//        $user->notify(new WelcomeNotification($user));
        if ($data['direccion'] != '') {
            Direccion::create([
                'id_cliente' => $user->id_cliente,
                'direccion' => $user->direccion,
                'id_pais' => $data['pais'],
                'id_ciudad' => $data['ciudad'],

            ]);
        }


        if (isset($user->id_cliente)) {
            Auth::login($user);
            return redirect('/dashboard');
        }


        return back();
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();
        $findUser = User::where('email', $user->getEmail())->first();
        if ($findUser) {
            if (session('promo') == 'si') {
                Auth::login($findUser);
                return redirect('/promocion');
            }
            Auth::login($findUser);
            return redirect('/dashboard');
        } else {
            $newUser = User::create([
                'nombre' => $user->getName(),
                'email' => $user->getEmail(),
                'cliente_envio' => '1',
                'password' => md5('123456'),
            ]);
            $code_cliente = ($newUser->id_cliente + 1000) - 3570;
            $newUser->code_cliente = 'CA' . $code_cliente;
            $newUser->save();
            $newUser->notify(new WelcomeNotification());

            if (isset($newUser->id_cliente)) {
                Auth::login($newUser);
                return redirect('/dashboard');
            }
            return $user->name;
        }

    }
}
