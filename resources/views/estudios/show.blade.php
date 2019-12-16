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

    <div class="row mt-4">
        <div class="col-sm-12">
            @include('estudios.show_analisis_combinado')
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12">
            @include('estudios.show_remedio')
        </div>
    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>



    <script>


        $(document).ready(function () {

            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function (html) {
                var switchery = new Switchery(html);
            });

            $('#data-table').DataTable({
                "order": [[3, "desc"]],
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

    <script type="text/javascript">
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

    <script src="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/switchery/dist/switchery.min.js')}}" type="text/javascript"></script>


    <script>
        let varRMS=1;
        let varImpregnancia=1;
        let varSecuencia=1;
        let varConsonante=1;
        let varClave=1;

        $('#btnRMS1').click(function () {
            if(varRMS==1) {
                $(this).blur();
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-success');
                $('#divRSM').css('display', 'none');
                varRMS = 0;
            }else {
                $(this).removeClass('btn-outline-success');
                $(this).addClass('btn-success');
                $('#divRSM').css('display', 'table-row');
                varRMS = 1;
            }
        });

        $('#btnImpregnancia1').click(function () {
            if(varImpregnancia==1) {
                $(this).blur();
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-success');
                $('#divImpregnancia').css('display', 'none');
                varImpregnancia = 0;
            }else {
                $(this).removeClass('btn-outline-success');
                $(this).addClass('btn-success');
                $('#divImpregnancia').css('display', 'table-row');
                varImpregnancia = 1;
            }
        });

        $('#btnSecuencia1').click(function () {
            if(varSecuencia==1) {
                $(this).blur();
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-success');
                $('#divSecuencia').css('display', 'none');
                varSecuencia = 0;
            }else {
                $(this).removeClass('btn-outline-success');
                $(this).addClass('btn-success');
                $('#divSecuencia').css('display', 'table-row');
                varSecuencia = 1;
            }
        });

        $('#btnConsonante1').click(function () {
            if(varConsonante==1) {
                $(this).blur();
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-success');
                $('#divConsonantes').css('display', 'none');
                varConsonante = 0;
            }else {
                $(this).removeClass('btn-outline-success');
                $(this).addClass('btn-success');
                $('#divConsonantes').css('display', 'table-row');
                varConsonante = 1;
            }
        });

        $('#btnClave1').click(function () {
            if(varClave==1) {
                $(this).blur();
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-success');
                $('#divClaves').css('display', 'none');
                varClave = 0;
            }else {
                $(this).removeClass('btn-outline-success');
                $(this).addClass('btn-success');
                $('#divClaves').css('display', 'table-row');
                varClave = 1;
            }
        });

    </script>
@endsection
