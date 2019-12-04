<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">@yield('nombre_modulo', 'Panel de Control')</h3>
        <ol class="breadcrumb">

            @yield('breadcrumb', 'Inicio')
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <h2 class="text-primary font-bold">Bienvenido</h2>
        </div>
        <div style="margin-top: -10px" class="d-flex justify-content-end">
             <h6 class="card-title">{{Auth::user()->nombre}}  Nº {{Auth::user()->code_cliente}}</h6>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->