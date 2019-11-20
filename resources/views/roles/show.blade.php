@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    {!! Form::model($role) !!}
                    <div class="card">
                        <div class="card-header card-header-icon card-header-danger">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Rol# <b>{{str_pad($role->id, 6, '0', STR_PAD_LEFT)}}</b></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre:</strong> {{$role->name}}</p>
                            <p><strong>Slug:</strong> {{$role->slug}}</p>
                            <p><strong>Descripcion:</strong> {{$role->description}}</p>

                            <h4 class="mt-4">Permiso Especial</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="special" name="special" class="form-check-input" type="radio" value="all-access" {{ old('special', $role->special) == 'all-access' ? 'checked="checked"' : '' }} disabled>
                                            {{__('Acceso Total')}}
                                            <span class="circle">
                                              <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="special" name="special" class="form-check-input" type="radio" value="no-access" {{ old('special', $role->special) == 'no-access' ? 'checked="checked"' : '' }} disabled>
                                            {{__('Ningún Acceso')}}
                                            <span class="circle">
                                              <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h4 class="mt'4">Lista de Permisos</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    @foreach($permissions AS $item)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                {{ Form::checkbox('permissions[]', $item->id, null, ['class' => 'form-check-input','disabled' => 'disabled']) }}
                                                {{ $item->name }} ({{$item->description ?: 'Sin descripción' }})
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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