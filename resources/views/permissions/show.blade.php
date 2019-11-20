@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-danger">
                            <div class="card-icon">
                                <i class="material-icons">pan_tool</i>
                            </div>
                            <h4 class="card-title">Permiso# <b>{{str_pad($permission->id, 6, '0', STR_PAD_LEFT)}}</b></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre del Permiso:</strong> {{$permission->name}}</p>
                            <p><strong>Permiso:</strong> {{$permission->slug}}</p>
                            <p><strong>Descripción:</strong> {{$permission->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ URL::previous() }}" class="btn btn-default">{{__('Volver')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection