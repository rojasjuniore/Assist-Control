@extends('templates.application.master')

@section('layout-content')

<div id="main-wrapper">
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(/vendor/wrappixel/material-pro/4.2.1/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body" style="overflow-x: hidden; overflow-y:auto;">
                <form class="form-horizontal form-material" method="POST" action="{{ route('register') }}" onsubmit="return checkForm(this);">
                    @csrf
                    <a href="javascript:void(0)" class="text-center db">
                            <img src="{{asset('images/logo-web-casillero.jpg')}}" alt="Home" style="height: 15em"/>
                    </a>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mt-4">
                        <div class="col-xs-12">
                            <input id="nombre" placeholder="Nombre y Apellido" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" placeholder="Correo Electrónico" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
             
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                  <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" name="terms" type="checkbox"  >
                                <label for="checkbox-signup"> Acepto los terminos y condiciones<a href="#"></a></label>
                              
                            </div>
                        </div>
                    </div> 
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">  {{ __('Registrar') }}</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p class="text-center">¿Ya posees una cuenta verificada? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Inicia sesión</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
    <script>
        function checkForm(form)
        {
            if(!form.terms.checked) {
                alert("Por favor, acepta los terminos y condiciones");
                form.terms.focus();
                return false;
            }
            return true;
        }
    </script>
@endsection