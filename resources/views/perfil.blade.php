@extends('templates.material.main')

@section('nombre_modulo', 'Perfil del Usuario')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{route('perfil')}}">Perfil del Usuario</a></li>
@endsection
@section('content')

    @if(session('info'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-success text-center">{{session('info')}}</div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        @if($user->avatar)
                            <img src="{{$user->avatar}}" class="img-circle" width="150">
                        @else
                            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="img-circle" width="150"/>
                        @endif
                        <h4 class="card-title m-t-10">{{$user->nombre}}</h4>
                        <h6 class="card-subtitle">Rol: {{$user->perfiles->rol->name}}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4">
                                <a href="{{route('estudios.index')}}" class="link">
                                    Estudios</br>
                                    <i class="fas fa-user-md"></i>
                                    <font class="font-medium">{{$user->estudios->count()}}</font>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{route('creditos.promociones')}}" class="link">
                                    Créditos</br>
                                    <i class="fas fa-wallet"></i>
                                    <font class="font-medium">{{$user->creditos->sum('cantidad')}}</font>
                                </a>
                            </div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">

                    <small class="text-muted">Email:</small>
                    <h6>{{$user->email}}</h6>

                    <small class="text-muted p-t-10 db">Telefóno:</small>
                    <h6>{{$user->telefono}}</h6>

                    <small class="text-muted p-t-10 db">Fax:</small>
                    <h6>{{$user->fax}}</h6>

                    <small class="text-muted p-t-10 db">Dirección:</small>
                    <h6>{{$user->direccion}}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Datos</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storeperfil') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nombre</b></label>
                                    <input type="text" name="nombre" value="{{$user->nombre}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Email</b></label>
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pais_id" class="mb-0"><b>{{ __('Pais') }}</b></label>
                                    <select class="form-control {{ $errors->has('pais_id') ? ' is-invalid' : '' }}" name="pais_id" id="pais_id" required>
                                        <option value="">Seleccione un Pais</option>
                                        @foreach($paises AS $pais)
                                            <option value="{{$pais->id}}" @isset($user) @if($pais->id==$user->pais_id) selected
                                                    @endif @endisset @if(@old("pais_id")==$pais->id) selected @endif>{{$pais->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pais_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado_id" class="mb-0"><b>{{ __('Estado') }}</b></label>
                                    <select class="form-control {{ $errors->has('estado_id') ? ' is-invalid' : '' }}" name="estado_id" id="estado_id">
                                        <option value="">Seleccione un Estado</option>
                                    </select>
                                    @if ($errors->has('estado_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ciudad_id" class="mb-0"><b>{{ __('Ciudad') }}</b></label>
                                    <select class="form-control {{ $errors->has('ciudad_id') ? ' is-invalid' : '' }}" name="ciudad_id" id="ciudad_id">
                                        <option value="" selected>Seleccione una Ciudad</option>
                                    </select>
                                    @if ($errors->has('ciudad_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Dirección</b></label>
                                    <textarea name="direccion" id="direccion" class="form-control">{{ @old("direccion", $user->direccion) }}</textarea>
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono" class="mb-0"><b>{{ __('Telefono') }}</b></label>
                                <input id="telefono" name="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" required value="{{ @old("telefono", $user->telefono) }}" value="{{ @old("telefono", $user->telefono) }}">
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fax" class="mb-0"><b>{{ __('Fax') }}</b></label>
                                <input id="fax" name="fax" type="text" class="form-control" value="{{ @old("fax", $user->fax) }}">
                                @if ($errors->has('fax'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password" class="mb-0"><b>{{ __('Clave') }}</b></label>
                                <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       @if(!isset($user)) required @endif>
                                @if(isset($user))
                                    <p class="small">Llene este campo solamente si desea cambiar la clave</p>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>

                <input type="hidden" name="pais_select" id="pais_select" value="{{$user->pais_id}}">
                <input type="hidden" name="estado_select" id="estado_select" value="{{$user->estado_id}}">
                <input type="hidden" name="ciudad_select" id="ciudad_select" value="{{$user->ciudad_id}}">

                <button type="submit" class="btn btn-outline-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Column -->

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

@endsection

@section('scripts')
    <script src="{{asset('js/geo_dependientes.js')}}"></script>
@endsection