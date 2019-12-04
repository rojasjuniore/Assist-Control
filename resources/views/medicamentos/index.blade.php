@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">

@endsection
@section('nombre_modulo', 'Medicamentos')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{route('medicamentos.index')}}">Medicamentos</a></li>
@endsection
@section('content')
            <section class="content-header">
                <h1 class="pull-left">Medicamentos</h1>
                <div class="pull-right">
{{--                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('medicamentos.create') !!}">--}}
                        <a href="{!! route('medicamentos.create') !!}" class="btn btn-outline-success" > <i class="fas fa-plus"></i> Crear</a>
{{--                    </a>--}}
                </div>
            </section>
            <div class="content">
                @include('flash::message')
                <div class="clearfix"></div>

                <br>

                <div class="clearfix"></div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Image</th>
                                    <th style="width: auto">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicamentos as $medicamento)
                                    <tr>
                                        <td>{!! $medicamento->nombre !!}</td>
                                        <td>{!! $medicamento->descripcion !!}</td>
                                        <td>{!! $medicamento->image !!} {!! route('medicamentos.edit', [2]) !!}</td>
                                        <td>
                                            <center>
                                            {!! Form::open(['route' => ['medicamentos.destroy', $medicamento->id], 'method' => 'delete']) !!}
                                            <a href="">
                                                <a href="{!! route('medicamentos.show', [$medicamento->id]) !!}" >
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{!! route('medicamentos.edit', [$medicamento->id]) !!}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                            </a>
                                            {!! Form::close() !!}
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center">

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
        $(document).ready(function() {
            $('#data-table').DataTable({
                "order": [[ 0, "desc" ]],
                "language":{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Ver _MENU_",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "_START_ al _END_ de  _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     ">>",
                        "sNext":     ">",
                        "sPrevious": "<"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "pageLength": 10,
                "bDestroy": true
            });
        } );
    </script>

@endsection
