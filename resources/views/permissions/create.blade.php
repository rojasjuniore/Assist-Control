@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', _i('Permisos'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">{{ _i('Inicio') }}</a></li>
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">{{ _i('Permisos') }}</a></li>
    <li class="breadcrumb-item active">{{ _i('Crear') }}</li>
@endsection
@section('content')

    <section class="content-header">
        <h1>
            {{ _i('Nuevo Permiso') }}
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
                    {!! Form::open(['route' => 'permissions.store', 'style'=>'width: 100%']) !!}
                    @include('permissions.partials.form')
                    <hr>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right">{{_i('Regresar')}}</a>
                    {{ Form::submit(_i('Guardar'), ['class' => 'btn btn-outline-success float-right mr-1'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection