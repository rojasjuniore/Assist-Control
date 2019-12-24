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

        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child:before {
            top: 15px;
            background-color: #26c6da;
        }

        #data-table-analisis-combinado > tbody {
            border-top: 5px #CCC solid;
        }
        .table .thead-light th {
            font-size: small;
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

    <script>
        $(document).ready(function () {
            cargarAnalisis(1,1,1,1,1,1);

            let varOrden='1';
            let filtro1=1;
            let filtro2=1;
            let filtro3=1;
            let filtro4=1;
            let filtro5=1;

            $('#btnOrden1').click(function () {
                if(varOrden != '1'){
                    varOrden = '1';
                    $(this).blur();
                    $('#btnOrden1').removeClass('btn-outline-success');
                    $('#btnOrden1').addClass('btn-success');
                    $('#btnOrden2').removeClass('btn-success');
                    $('#btnOrden2').addClass('btn-outline-success');
                    $('#btnOrden3').removeClass('btn-success');
                    $('#btnOrden3').addClass('btn-outline-success');
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });
            $('#btnOrden2').click(function () {
                if(varOrden != '2'){
                    varOrden = '2';
                    $(this).blur();
                    $('#btnOrden2').removeClass('btn-outline-success');
                    $('#btnOrden2').addClass('btn-success');
                    $('#btnOrden1').removeClass('btn-success');
                    $('#btnOrden1').addClass('btn-outline-success');
                    $('#btnOrden3').removeClass('btn-success');
                    $('#btnOrden3').addClass('btn-outline-success');
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });
            $('#btnOrden3').click(function () {
                if(varOrden != '3'){
                    varOrden = '3';
                    $(this).blur();
                    $('#btnOrden3').removeClass('btn-outline-success');
                    $('#btnOrden3').addClass('btn-success');
                    $('#btnOrden1').removeClass('btn-success');
                    $('#btnOrden1').addClass('btn-outline-success');
                    $('#btnOrden2').removeClass('btn-success');
                    $('#btnOrden2').addClass('btn-outline-success');
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });

            $('#btnRMS1').click(function () {
                if(filtro1==1) {
                    $(this).blur();
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-outline-success');
                    filtro1 = 0;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }else {
                    $(this).removeClass('btn-outline-success');
                    $(this).addClass('btn-success');
                    filtro1 = 1;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });
            $('#btnImpregnancia1').click(function () {
                if(filtro2==1) {
                    $(this).blur();
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-outline-success');
                    filtro2 = 0;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }else {
                    $(this).removeClass('btn-outline-success');
                    $(this).addClass('btn-success');
                    filtro2 = 1;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });

            $('#btnSecuencia1').click(function () {
                if(filtro3==1) {
                    $(this).blur();
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-outline-success');
                    filtro3 = 0;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }else {
                    $(this).removeClass('btn-outline-success');
                    $(this).addClass('btn-success');
                    filtro3 = 1;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });

            $('#btnConsonante1').click(function () {
                if(filtro4==1) {
                    $(this).blur();
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-outline-success');
                    filtro4 = 0;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }else {
                    $(this).removeClass('btn-outline-success');
                    $(this).addClass('btn-success');
                    filtro4 = 1;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });

            $('#btnClave1').click(function () {
                if(filtro5==1) {
                    $(this).blur();
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-outline-success');
                    filtro5 = 0;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }else {
                    $(this).removeClass('btn-outline-success');
                    $(this).addClass('btn-success');
                    filtro5 = 1;
                    cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
                }
            });

            $(document).on('click', '.btnGuardarNota', function (event) {

                let remedio_id = $(this).data('remedioid');
                let estudio_id = $('#estudio_id').val();
                let nota = $(`#nota${remedio_id}`).val();

                $(`#msg${remedio_id}`).html('');

                $.ajax({
                    type:'POST',
                    url:'/guardarNota',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data:{
                        estudio_id:estudio_id,
                        remedio_id:remedio_id,
                        nota:nota
                    },
                    success:function(respuesta){

                        $(`#msg${remedio_id}`).html('<i class="fas fa-check-circle fa-2x text-success"></i>');

                    }
                });
            });

        });

    </script>


    <script type="text/javascript">

        $(document).ready(function () {

            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function (html) {
                var switchery = new Switchery(html);
            });

        });

        var page = new Vue({
            el: '#main-wrapper',
            data: {
                cant: 0,
                items: [],
                historiales: [],
                idselected: [],
                paquetes: [],
                formItems: {
                    paquetes: [],
                    peso: '',
                    total: '',
                    tipo_envio: '',
                    comentario: '',
                }
            },
            computed: {
                mostrarp() {
                    if (this.cant < 1) {
                        return false;
                    } else {
                        return true;
                    }
                },
            },
            methods: {
                listaids(data) {
                    if (!this.idselected.includes(data)) {
                        this.idselected.push(data);
                        this.cant = this.idselected.length;
                    } else {
                        var indicedata = this.idselected.indexOf(data);
                        this.idselected.splice(indicedata, 1);
                        this.cant = this.cant - 1;
                    }
                },
                getHistorial: function (id) {
                    axios.get('/api/get/' + id + '/historial').then((response) => {
                        this.historiales = response.data;

                    }).catch((error) => {
                        console.log(error);
                    });
                },
            }
        })
    </script>




@endsection
