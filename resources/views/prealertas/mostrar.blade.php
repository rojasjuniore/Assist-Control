@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush

@section('css')
   <link href="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="row">
                  
                </div>
 <div class="card">
 	<div class="card-body">
        <div class="row">
        <div class="col-md-6">
            <div class="card card-outline-inverse">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Información del paquete</h4></div>
                <div class="card-body">
                    <h4 class="card-title">Compañia Courier</h4>
                    <p class="card-text">{{$prealertas->courier}}</p>
                    <h4 class="card-title">Tienda</h4>
                    <p class="card-text">{{$prealertas->tienda}}</p>
                    <h4 class="card-title">Valor del paquete</h4>
                    <p class="card-text">{{$prealertas->valor}}</p>
                    <h4 class="card-title">Numero de orden</h4>
                    <p class="card-text">{{$prealertas->nu_orden}}</p>
                    <h4 class="card-title">Tracking</h4>
                    <p class="card-text">{{$prealertas->tracking}}</p>
                    <h4 class="card-title">Tipo de proceso</h4>
                    <p class="card-text">{{$prealertas->estatus}}</p>
                    <h4 class="card-title">Dirección</h4>
                    <p class="card-text">{{$prealertas->direccion}}</p>
                    <h4 class="card-title">Descripción</h4>
                    <p class="card-text">{{$prealertas->descripcion}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-outline-inverse">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Archivos</h4></div>
                <div class="card-body">
                    <?php $archivos = explode(";", $prealertas->doc)?>
                    <ul class="list-group">
                    @for ($i = 0; $i <  count($archivos) ; $i++)
                        <?php if($archivos[$i]){ ?>
                          <li class="list-group-item"> <a href="{{asset('files/'.$archivos[$i])}}"  target="_blank"> {{$archivos[$i]}} <br></a></li>
                        <?php } ?>
                    @endfor
                    </ul>
                    
                </div>
                    
            </div>
        </div>
        </div>


            


	</div>
</div>

@endsection

@section('js')
  <script src="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/js/horizontal-timeline.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection
