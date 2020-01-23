@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">

@endsection
@section('nombre_modulo', _i('Roles'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">{{ _i('Inicio') }}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">{{ _i('Roles') }}</a></li>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Roles
            @can('roles.create')
            <a href="{{route('roles.create')}}" class="btn btn-outline-success float-right"> <i class="fas fa-plus"></i> {{ _i('Crear') }}</a>
            @endcan
        </h1>
    </section>
    <div class="content">
        @if(session('info'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success text-center">{{session('info')}}</div>
                    </div>
                </div>
            </div>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="data-table">
                    <thead class="text-primary">
                    <tr>
                        <th width="10px">{{ _i('ID') }}</th>
                        <th>{{ _i('Roles') }}</th>
                        <th>{{ _i('Descripción') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles AS $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td class="td-actions text-right">
                                @can('roles.show')
                                    <a href="{{route('roles.show', $item->id)}}" class="btn btn-outline-success btn-round btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('roles.edit')
                                    <a href="{{route('roles.edit', $item->id)}}" class="btn btn-outline-success btn-round btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('roles.destroy')
                                    {!! Form::open(['route' => ['roles.destroy', $item->id], 'method' => 'DELETE','class' => 'd-inline']) !!}
                                    <button class="btn btn-outline-success btn-round btn-sm">
                                        <i class="fas fa-trash-alt"></i>
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

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#data-table').DataTable({
                "order": [[0, "desc"]],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Ver _MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "_START_ al _END_ de  _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": ">>",
                        "sNext": ">",
                        "sPrevious": "<"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "pageLength": 10,
                "bDestroy": true
            });
        });
    </script>

@endsection
