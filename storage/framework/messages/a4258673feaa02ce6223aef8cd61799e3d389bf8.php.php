<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $datos_social = Socialite::driver('facebook')->user();

        $user = User::where('email', $datos_social->getEmail())->first();
        if(!$user){
            $user = User::create([
                'nombre' => $datos_social->getName(),
                'email' => $datos_social->getEmail(),
                'email_verified_at' => date("Y-m-d"),
                'password' => '',
                'facebook_id' => $datos_social->getId(),
                'avatar' => $datos_social->getAvatar(),
                'nick' => $datos_social->getNickname(),
                'completeData' => 1
            ]);
            $user->roles()->sync(9); //El 9 viene siendo el id del Rol Medico quer seria el Rol por default

            $codCliente = 'CA' . str_pad($user->id_cliente, 6, "0", STR_PAD_LEFT);
            $user->code_cliente = $codCliente;
            $user->save();
        }else{
            $user->nombre = $datos_social->getName();
            $user->facebook_id = $datos_social->getId();
            $user->avatar = $datos_social->getAvatar();
            $user->nick = $datos_social->getNickname();
            $user->save();
        }

        Auth::login($user);
        return redirect()->route('home-one');
    }

    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterProviderCallback()
    {
        $datos_social = Socialite::driver('twitter')->user();

        $user = User::where('email', $datos_social->getEmail())->first();
        if(!$user){
            $user = User::create([
                'nombre' => $datos_social->getName(),
                'email' => $datos_social->getEmail(),
                'email_verified_at' => date("Y-m-d"),
                'password' => '',
                'twitter_id' => $datos_social->getId(),
                'avatar' => $datos_social->getAvatar(),
                'nick' => $datos_social->getNickname(),
                'completeData' => 1
            ]);
            $user->roles()->sync(9); //El 9 viene siendo el id del Rol Medico quer seria el Rol por default
        }else{
            $user->nombre = $datos_social->getName();
            $user->twitter_id = $datos_social->getId();
            $user->avatar = $datos_social->getAvatar();
            $user->nick = $datos_social->getNickname();
            $user->save();
        }

        Auth::login($user);
        return redirect()->route('home-one');
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback()
    {
        $datos_social = Socialite::driver('google')->user();

        $user = User::where('email', $datos_social->getEmail())->first();
        if(!$user){
            $user = User::create([
                'nombre' => $datos_social->getName(),
                'email' => $datos_social->getEmail(),
                'email_verified_at' => date("Y-m-d"),
                'password' => '',
                'google_id' => $datos_social->getId(),
                'avatar' => $datos_social->getAvatar(),
                'nick' => $datos_social->getNickname(),
                'completeData' => 1
            ]);
            $user->roles()->sync(9); //El 9 viene siendo el id del Rol Medico quer seria el Rol por default
        }else{
            $user->nombre = $datos_social->getName();
            $user->google_id = $datos_social->getId();
            $user->avatar = $datos_social->getAvatar();
            $user->nick = $datos_social->getNickname();
            $user->save();
        }

        Auth::login($user);
        return redirect()->route('home-one');
    }
}
