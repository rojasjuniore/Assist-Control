@extends('admin.layout')

@section('title', 'Usuario')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Usuario</li>
    </ol>
@endsection

@section('content')
    <div class="tab-pane" id="settings" role="tabpanel">
        <div class="card-body">
            <div class="form-horizontal form-material">
                <div class="form-group">
                    <label class="col-md-12">Nombre</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Apellido</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->surname }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">País</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->country }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Ciudad</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->city }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Dirección</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->address }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Teléfono</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->email }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection