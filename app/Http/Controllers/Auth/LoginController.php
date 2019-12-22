<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

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
                'password' => ''
            ]);
            $user->roles()->sync($request->get('roles'));

        }

        Auth::login($user);
        return redirect()->route('home-one');
    }

}
