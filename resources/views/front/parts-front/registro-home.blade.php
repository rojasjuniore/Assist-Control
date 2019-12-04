        <!-- Area de Registro --> 
    <section class="get_touch_area" id="registrohome">
        <div class="container">
            <h2>Formulario de registro</h2>
            <p class="text-center">Obt&eacute;n 2 lb gratis en tu primer envío con Casillero Express<br>
<small>(aplican condiciones y restricciones)</small></p>
            <div class="row">                
                <div class="col-lg-12"> 
                    <form class="from_main" method="POST" action="{{ route('register') }}" onsubmit="return checkForm(this);">
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
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre completo">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Direccion de correo electr&oacute;nico">
                        </div>
                         <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary p-t-0">
                                    <input id="checkbox-signup" name="terms" type="checkbox"  >
                                    <label for="checkbox-signup"> Acepto los terminos y condiciones<a href="#"></a></label>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <button class="theme_btn btn" id="js-contact-btn" type="submit">Enviar</button> 
                            <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Messages Successfully"></div>
                            <br><center><span>O inicia sesión con:</span><center>
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social"><a href="https://app.efectylogistic.com/login/facebook" class="btn  btn-facebook" data-toggle="tooltip" title="Ingresar con Facebook"> <i  style="font-size: 40px;"aria-hidden="true" class="fab fa-facebook"></i> </a> <a href="https://app.efectylogistic.com/login/google" class="btn btn-googleplus" data-toggle="tooltip" title="Ingresar con google
                            "> <i  style="font-size: 40px; color: #dd4b39;" aria-hidden="true" class="fab fa-google-plus"></i> </a> </div>
                    </div>
                        </div>

                    </form>

                </div>
            </div> 

        </div>

    </section>
    <!-- Area de Registro--> 