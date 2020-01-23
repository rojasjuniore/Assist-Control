@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', _i('Permisos'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">{{ _i('Inicio') }}</a></li>
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">{{ _i('Permisos') }}</a></li>
    <li class="breadcrumb-item active">{{ _i('Detalle') }}</li>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ _i('Permiso') }}# <b>{{str_pad($permission->id, 6, '0', STR_PAD_LEFT)}}</b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="card-body">
                    <p><strong>{{ _i('Nombre del Permiso') }}:</strong> {{$permission->name}}</p>
                    <p><strong>{{ _i('Permiso') }}:</strong> {{$permission->slug}}</p>
                    <p><strong>{{ _i('Descripción') }}:</strong> {{$permission->description}}</p>
                    <hr>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-success float-right">{{_i('Regresar')}}</a>
                </div>
            </div>
        </div>

@endsection