@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if(session('info'))
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center">{{session('info')}}</div>
                        </div>
                    </div>
                </div>
            @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-danger">
                        <div class="card-icon">
                            <i class="material-icons">pan_tool</i>
                        </div>
                        <h4 class="card-title">Permisos</h4>
                        @can('permissions.create')
                            <a href="{{route('permissions.create')}}">
                                <i class="material-icons text-danger fa-3x float-right">add_circle</i>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead class="text-primary">
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Permiso</th>
                                <th>Descripción</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions AS $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="td-actions text-right">
                                            @can('permission.show')
                                                <a href="{{route('permissions.show', $item->id)}}" class="btn btn-danger btn-round">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            @endcan
                                            @can('permission.edit')
                                                <a href="{{route('permissions.edit', $item->id)}}" class="btn btn-danger btn-round">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            @endcan
@can('permission.destroy')
                                                {!! Form::open(['route' => ['permissions.destroy', $item->id], 'method' => 'DELETE', 'id' => 'formDelete','class' => 'd-inline']) !!}
                                                <button class="btn btn-danger btn-round">
                                                    <i class="material-icons">delete_forever</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
            });
        } );
    </script>
@endsection