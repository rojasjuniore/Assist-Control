@extends('admin.layout')

@section('title', 'Cambiar contraseña')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Cambiar contraseña</li>
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
            <form class="form-horizontal form-material" action="{{ route('users.update-password', [$user->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label class="col-md-12">Contraseña</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Actualizar contraseña</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection