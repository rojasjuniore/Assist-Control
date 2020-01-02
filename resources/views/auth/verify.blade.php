@extends('templates.application.master')

@section('layout-content')

    <div id="main-wrapper">
        <section id="wrapper" class="login-register login-sidebar" style="background-image:url({{asset('images/background.jpg')}});">
            <div class="login-box card">
                <div class="card-body" style="overflow-x: hidden; overflow-y:auto;">


                    <a href="javascript:void(0)" class="text-center db">
                        <img src="{{asset('images/logo.png')}}" alt="Home" style="height: 10em"/>
                    </a>

                    <hr>
                    @if(session('resent'))
                        <div class="alert alert-success text-center">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            {{ __('Verifique su dirección de correo.') }}
                        </div>
                    @endif

                    <p class="text-center">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </p>

                    <hr>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>{{__('¿Ya posees una cuenta verificada?')}} <a href="{{ route('logout') }}" class="text-info m-l-5"><b>{{__('Inicia sesión')}}</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection