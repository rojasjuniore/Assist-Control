@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', 'Permisos')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permisos</a></li>
    <li class="breadcrumb-item active">Detalle</li>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Permiso# <b>{{str_pad($permission->id, 6, '0', STR_PAD_LEFT)}}</b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                        <div class="card-body">
                            <p><strong>Nombre del Permiso:</strong> {{$permission->name}}</p>
                            <p><strong>Permiso:</strong> {{$permission->slug}}</p>
                            <p><strong>Descripción:</strong> {{$permission->description}}</p>
                            <hr>
                            <a href="{{ URL::previous() }}" class="btn btn-outline-success float-right">{{__('Regresar')}}</a>
                        </div>
            </div>
        </div>

@endsection