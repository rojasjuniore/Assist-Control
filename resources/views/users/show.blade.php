@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('content')
    <section class="content-header">
        <h1>
            Usuario# <b>{{str_pad($user->id_cliente, 6, '0', STR_PAD_LEFT)}}</b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                            <p><strong>Code Cliente:</strong> {{$user->code_cliente}}</p>
                            <p><strong>Nombre:</strong> {{$user->nombre}}</p>
                            <p><strong>Email:</strong> {{$user->email}}</p>

                            <h4 class="mt-4">Lista de Roles</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    @foreach($roles AS $item)
                                        <div class="form-check">
                                                {{ Form::checkbox('roles[]', $item->id, (in_array($item->id, $selected)? true : false), ['disabled' => 'disabled', 'id'=>$item->id]) }}
                                                <label class="form-check-label" for="{{$item->id}}">
                                                    {{ $item->name }} ({{$item->description ?: 'Sin descripcion' }})
                                                </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                <hr>
                <a href="{{ URL::previous() }}" class="btn btn-outline-success float-right">{{__('Regresar')}}</a>
            </div>
        </div>
    </div>

@endsection