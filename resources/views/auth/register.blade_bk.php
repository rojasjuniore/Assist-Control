@extends('web.layout')



@section('title_page', 'Registro')



@section('content')

<div class="container-fluid">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="login-register-form">

                    <div class="form-holder">

                        <div class="form-row form-head">

                            <div class="col-xs-6">

                                <a class="site-brand" href="index.html"><img src="158624558/images/logo.png" alt="Hustbee"></a>

                            </div>

                            <div class="col-xs-6">

                                <div class="form-title"><img src="images/lock.svg" alt=""><a href="{{url('login')}}">Area Clientes</a></div>

                            </div>

                        </div>

                        <form method="POST" action="{{ route('register') }}">

                            {{ csrf_field() }}

                            <div class="form-row">

                                <div class="col-md-6">

                                    <label>Nombre</label>

                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('name') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                  <div class="col-md-6">

                                    <label>Apellido</label>

                                    <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required>

                                    @if ($errors->has('surname'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('surname') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-md-6">

                                    <label>País</label>

                                    <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                                    @if ($errors->has('country'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('country') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                    <div class="col-md-6">

                                    <label>Ciudad</label>

                                    <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('city') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="form-row">



                            </div>

                            <div class="form-row">

                                <div class="col-xs-12">

                                    <label>Dirección</label>

                                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('address') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div>
<!-- 
                            <div class="form-row">

                                <div class="col-xs-12">

                                    <label>Teléfono</label>

                                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('phone') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div> -->
                              <div class="form-row">

                                <div class="col-md-12">

                                    <label>Celular</label> <br>

                                    <input style="display: block;" type="tel" name="cell" id="phone" class="form-control"> 
                                    <br><br>

                                    @if ($errors->has('phone'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('cell') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                    
                            </div>

                            <div class="form-row">
                                
                                  <div class="col-md-12">

                                    <label style="color: #fff;">Correo</label>

                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('email') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-md-6">

                                    <label style="color: #fff;">Contraseña</label>

                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('password') }}</strong>

                                        </span>

                                    @endif

                                </div>


                                <div class="col-md-6">

                                    <label style="color: #fff;">Confirmar contraseña</label>

                                    <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                    @if ($errors->has('password'))

                                        <span class="text-warning">

                                            <strong>{{ $errors->first('password') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            </div>

<!--                             <div class="form-row">


                            </div> -->
<!-- 
                            <div class="form-row">


                            </div> -->

                             @if (isset($_GET['giftcard']))
                                <input type="hidden" name="giftcard" value="{{ substr(URL::full(), strpos(URL::full(), '=') + 1) }}">
                            @endif

                            <div class="form-row">

                                <div class="col-xs-12">

                                    <div class="submit-holder">

                                        <button style=" background-color: #ffc600;    color: #000;" class="hbtn hbtn-primary hbtn-lg modlogin" type="submit">Registrarse</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@section('js')

<script>
    var input = document.querySelector("#phone");
                    window.intlTelInput(input, {
                      // allowDropdown: false,
                      // autoHideDialCode: false,
                      // autoPlaceholder: "off",
                      // dropdownContainer: document.body,
                      // excludeCountries: ["us"],
                      // formatOnDisplay: false,
                      // geoIpLookup: function(callback) {
                      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                      //     var countryCode = (resp && resp.country) ? resp.country : "";
                      //     callback(countryCode);
                      //   });
                      // },
                      //hiddenInput: "full_number",
                      //initialCountry: "auto",
                      // localizedCountries: { 'de': 'Deutschland' },
                      nationalMode: false,
                      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                      // placeholderNumberType: "MOBILE",
                        preferredCountries: ['ve'],
                      // separateDialCode: true,
                      utilsScript: "{{ asset('js/web/utils.js') }}",
                  });
</script>
@endsection

