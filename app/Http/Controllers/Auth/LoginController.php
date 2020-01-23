<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asistencia;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Xinax\LaravelGettext\Facades\LaravelGettext;
use SweetAlert;
use Carbon\Carbon;

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
        $this->middleware('guest')->except(['logout', 'changeLang']);
    }

    /**
     * Changes the current language and returns to previous page
     * @return Redirect
     */
    public function changeLang($locale = null)
    {
        LaravelGettext::setLocale($locale);
        return back();
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if (isset($user->id)) {

            $asistioHoy = Asistencia::where('user_id', $user->id)
                                    ->where('fecha', date("Y-m-d"))
                                    ->first();

            if(isset($asistioHoy->fecha)){
                $hora = $asistioHoy->created_at->format('H:m');

                Session::flash('error', 'Usted marco su llegada a las: '.$hora);
                return back();
            }else{
                $roles = $user->perfiles;
                $isAsistente = 0;
                foreach ($roles AS $rol) {
                    if ($rol->role_id == 4) { //El Rol 4 es el de Asistente
                        $isAsistente = 1;
                    }
                }

                if ($isAsistente) {

                    $data['user_id'] = $user->id;
                    $data['fecha'] = date('Y-m-d');

                    $asistencia = Asistencia::create($data);

                    Session::flush();

                    $hora = $asistencia->created_at->format('H:i');

                    return back()->with('info', $hora);

                } else {
                    Auth::login($user);
                    return redirect('/dashboard');
                }
            }

        }

        Session::flash('error', 'Los datos ingresados son incorrectos o el Usuario no Existe.');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


}
