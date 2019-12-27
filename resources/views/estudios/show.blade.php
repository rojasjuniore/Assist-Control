@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.css">
    <!-- Timeline CSS -->
    <link href="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/switchery/dist/switchery.min.css')}}"/>
    <style>
        table.dataTable thead .sorting:after {
            content: "\F0DC";
            margin-left: 10px;
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 900;
            cursor: pointer;
            color: rgba(255, 255, 255, 1);
        }

        table {
            color: #000;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #26c6da;
            border-color: #26c6da;
        }

        .events li a {
            top: -35px;
        }
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

        .imagenRemedio{
            position: fixed !important;
            width: 14em !important;
        }
    </style>

@endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('nombre_modulo', 'Estudios')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home-one')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('estudios.index')}}">Estudios</a></li>
    <li class="breadcrumb-item active">Detalle</li>
@endsection
@section('content')
    <?php
    //        var_dump($result['reino']["vegetal"]);
    ?>
    {{--    <div class="progress-bar bg-success" style="width: 75%; height:15px;" role="progressbar">75%</div>--}}

    <div class="row">
        <div class="col-sm-6">
            @include('estudios.show_fields')
        </div>
        <div class="col-sm-6">
            @include('estudios.show_barra')
        </div>
    </div>

    {{--<div class="row mt-4">--}}
        {{--<div class="col-sm-12">--}}
            {{--@include('estudios.show_analisis_combinado')--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row mt-4">--}}
        {{--<div class="col-sm-12">--}}
            {{--@include('estudios.show_remedio')--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row mt-4">
        <div class="col-sm-12">
            <input type="hidden" name="estudio_id" id="estudio_id" value="{{$estudios->id}}">
            <input type="hidden" name="remedios" id="remedios" value="{{json_encode($remedios)}}">
            <input type="hidden" name="data" id="data" value="{{json_encode($data)}}">
            <input type="hidden" name="predominante" id="predominante" value="{{json_encode($predominante)}}">

            @include('estudios.show_analisis')
        </div>
    </div>

    @include('estudios.modal_descripcion')
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script src="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/switchery/dist/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/cargarAnalisis.js') }}"></script>
    <script src="{{ asset('js/btnes_ordenacion_filtrado.js') }}"></script>
    <script src="{{ asset('js/guardar_notas.js') }}"></script>
    <script src="{{ asset('js/buscarDescripcion.js') }}"></script>

    <script>
        $(document).ready(function () {
            cargarAnalisis(1,1,1,1,1,1);
        });

    </script>
@endsection
