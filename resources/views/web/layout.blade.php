<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Giftcard Reembolsable</title>

    <link rel="stylesheet" type="text/css" href="/158624558/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/158624558/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/158624558/css/slick.css">

    <link rel="stylesheet" type="text/css" href="/158624558/css/style.css">

    <link rel="stylesheet" type="text/css" href="/158624558/css/custom.css">
    <link href="{{ asset('css/web/intlTelInput.min.css') }}" rel="stylesheet">

</head>

<body>

<div id="header-holder" style="min-height: 100vh;">

    <nav id="nav" class="navbar navbar-full">

        <div class="container-fluid">

            <div class="container container-nav">

                <div class="row">

                    <div class="col-md-12">

                        <div class="navbar-header">

                            <button style="background: #24285d" aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>

                            <a class="navbar-brand" href="{{url('/')}}"><img class="img-responsive" src="/158624558/images/logo.png" alt="Hustbee"></a>

                        </div>

                        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse navbar-collapse-centered" id="bs">

                            <ul class="nav navbar-nav navbar-nav-centered">

                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{url('/')}}">Inicio</a></li>

                                <li class="nav-item">

                                    <a class="nav-link {{ request()->is('/compra-de-giftcard/') ? 'active' : '' }}" href="{{url('compra-de-giftcard')}}">Comprar</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link {{ request()->is('/register') ? 'active' : '' }}" href="{{url('register')}}">Registro</a>

                                </li>

                                  <li class="nav-item">

                                    <a class="nav-link {{ request()->is('/register') ? 'active' : '' }}" href="{{url('login')}}">Ingresar</a>

                                </li>

                                                            <ul class="nav navbar-nav navbar-right other-navbar">

                                <li class="nav-item">

                                    <a class="nav-link btn-client-area" href="{{url('login')}}"><img src="/158624558//158624558/images/lock.svg" alt="">Mi Cuenta</a>

                                   <!--  <div class="chat-info"><i class="hstb hstb-right-arrow"></i>Chat Available</div> -->

                                </li>

                              <li class="nav-item">

                                    <span style="color:#24285D; "><b>Tasa del día: </b>  {{ getRate() }}Bss </span>

                                </li> 

                            </ul>

                            </ul>



                        </div>

                    </div>

                </div>

            </div>

        </div>

    </nav>



@yield('content')

@yield('footer')

@yield('elements')

<script src="/158624558/js/jquery.min.js"></script>

<script src="/158624558/js/bootstrap.min.js"></script>

<script src="/158624558/js/slick.min.js"></script>
<script src="{{ asset('js/web/intlTelInput.min.js') }}"></script>


<script src="/158624558/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
    <script src="{{ asset('/js/web/axios.js') }}"></script>
    @yield('js')

</body>

</html>