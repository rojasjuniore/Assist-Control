@extends('admin.layout')

@section('title', 'Perfil')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Perfil</li>
    </ol>
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="tab-pane" id="settings" role="tabpanel">
        <div class="card-body">
            <form class="form-horizontal form-material" action="{{ route('users.update-profile') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-12">Nombre</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Apellido</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->surname }}">
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">País</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->country }}">
                        @if ($errors->has('country'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Ciudad</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->city }}">
                        @if ($errors->has('city'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Dirección</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->address }}">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Teléfono</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->phone }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" value="{{ $user->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Contraseña</label>
                    <div class="col-md-12">
                        <input type="password" class="form-control form-control-line">
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Actualizar perfil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection