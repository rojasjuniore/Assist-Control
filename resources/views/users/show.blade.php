@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    {!! Form::model($user) !!}
                    <div class="card">
                        <div class="card-header card-header-icon card-header-danger">
                            <div class="card-icon">
                                <i class="material-icons">account_box</i>
                            </div>
                            <h4 class="card-title">Usuario# <b>{{str_pad($user->id, 6, '0', STR_PAD_LEFT)}}</b></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre:</strong> {{$user->name}}</p>
                            <p><strong>Email:</strong> {{$user->email}}</p>

                            <h4 class="mt-4">Lista de Roles</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    @foreach($roles AS $item)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                {{ Form::checkbox('roles[]', $item->id, null, ['class' => 'form-check-input', 'disabled' => 'disabled']) }}
                                                {{ $item->name }} ({{$item->description ?: 'Sin descripcion' }})
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