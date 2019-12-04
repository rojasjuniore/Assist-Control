@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', 'Menu')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('menus.index')}}">Menu</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Menu# <b>{{str_pad($menu->id, 6, '0', STR_PAD_LEFT)}}</b>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @if(session('info'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success text-center">{{session('info')}}</div>
                    </div>
                </div>
            </div>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method'=>'PUT', 'style'=>'width: 100%']) !!}
                        @include('menus.partials.form')

                        <hr>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right">{{__('Regresar')}}</a>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success float-right mr-1'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection