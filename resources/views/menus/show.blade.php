@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-danger">
                            <div class="card-icon">
                                <i class="material-icons">menu</i>
                            </div>
                            <h4 class="card-title">Menu# <b>{{str_pad($menu->id, 6, '0', STR_PAD_LEFT)}}</b></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre del Menu:</strong> {{$menu->menu}}</p>
                            <p><strong>Ruta:</strong> {{$menu->ruta}}</p>
                            <p><strong>Padre:</strong> {{$menu->padre}}</p>
                            <p><strong>Nivel:</strong> {{$menu->nivel}}</p>
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