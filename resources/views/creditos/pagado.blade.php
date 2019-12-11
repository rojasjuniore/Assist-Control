@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', 'Credito Abonado')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('creditos.index')}}">Creditos</a></li>
    <li class="breadcrumb-item"><a href="{{route('creditos.create')}}">Obtenga su Abono</a></li>
    <li class="breadcrumb-item active">Credito Abonado</li>
@endsection
@section('content')
    <div class="content">

        <div class="box box-primary">

            @if(session('message'))
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center">{{session('message')}}</div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body pricing-body pl-4 pr-4 text-center">
                                <i class="far fa-check-circle fa-5x text-success"></i>
                                <h2 class="text-center">{{$credito->cantidad}}</h2>
                                <p class="text-center">
                                    @if ($credito->cantidad>1)
                                        Créditos Abonados
                                    @else
                                        Crédito Abonado
                                    @endif
                                </p>
                                <div class="price-table-content text-center">
                                    <div class="price-row"><h4>US$ {{number_format($credito->costo,0,'','.')}}</h4></div>
                                    <div class="price-row">Operación: <h5>{{$credito->operacion}}</h5></div>
                                    <div class="price-row">
                                        @if (Auth::user()->creditos->sum('cantidad')>0)
                                            <a href="{{route('estudios.create')}}" class="btn btn-success">
                                                Crear un Nuevo Estudio Médico
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="row text-center mt-5">--}}
                            {{--<div class="col-sm-12">--}}
                                {{--<a href="#" class="btn btn-success">Ir a su Estado de Cuenta</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        {{--<div class="row text-center">--}}
                            {{--<div class="col-sm-12">--}}
                                {{--@if (Auth::user()->creditos->sum('cantidad')>0)--}}
                                    {{--<a href="{{route('estudios.create')}}" class="btn btn-success">--}}
                                        {{--Crear un Nuevo Estudio Médico--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection