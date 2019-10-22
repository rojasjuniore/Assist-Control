<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        @include('templates.application.components.sidebar-profile')
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="">
                    <a href="{{ url('/dashboard') }}" aria-expanded="true">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="hide-menu">Panel de control </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pre-alertas')}}"><i class="far fa-chart-bar"></i>Pre-alertas</a>
                </li>
                <li>
                    <a href="{{route('programar-envios')}}"> <i class="far fa-calendar"></i> Programar envíos</a>
                </li>
               <!--  <li>
                   <a href="{{ url('/home3') }}"> <i class="fas fa-file"></i> Mis pedidos</a>
               </li> -->
                <li>
                    <a href="{{route('ordenes')}}"><i class="fa fa-th-list" ></i>Mis paquetes</a>
                </li>
                 <li>
                    <a href="{{route('direcciones')}}"><i class="fa fa-map-marker" ></i>Direcciones</a>
                </li>
                <li>
                    <a href="{{route('stripe')}}"><i class="fa fa-credit-card" ></i>Facturación</a>
                </li>
               @if(Auth::user()->cliente_envio == 1)
                <li>
                    <a href="{{route('facturaciondhl')}}"><i class="fa fa-credit-card" ></i>Facturas Pendientes</a>
                </li>
                @endif
                @if(Auth::user()->rol == 'admin')
                <li>
                    <a href="{{route('usuarios')}}"><i class="fa fa-users" ></i>Usuarios</a>
                </li>
                <li>
                    <a href="{{route('listado-ordenes')}}"><i class="fa fa-th-list" ></i>Ordenes</a>
                </li>
                <li>
                    <a href="{{route('servicioadicional')}}"><i class="fa fa-check-square" aria-hidden="true"></i>Servicios Adicionales</a>
                </li>
                 <li>
                    <a href="{{route('guia')}}"><i class="fa fa-plane" aria-hidden="true"></i>Generar guia</a>
                </li>
                 <li>
                    <a href="{{route('promociones')}}"><i class="fa fa-plus" aria-hidden="true"></i>Promociones</a>
                </li>
                @endif
                <li>
                    <a href="{{route('soporte')}}"><i class="fa fa-question-circle" aria-hidden="true"></i>Soporte</a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
       {{--  <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> --}}
        <!-- item-->  <a href="/logout" class="link" data-toggle="tooltip" title="Cerrar sesión"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->