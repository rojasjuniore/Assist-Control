@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"/>
    <link rel="stylesheet" href="{{asset('css/introjs.css')}}">
    <style>
        .ticket {
            width: 40%;

        }

        @media only screen and (max-width: 600px) {
            .ticket {
                width: 30%;
                padding: 15px;
            }
        }

        .dtp > .dtp-content > .dtp-date-view > header.dtp-header {
            background: #1e88e5;
            color: #fff;
            text-align: center;
            padding: 0.3em;
        }

        .dtp div.dtp-date, .dtp div.dtp-time {
            background: #1e88e5;
            text-align: center;
            color: #fff;
            padding: 10px;
        }

        .dtp .p10 > a {
            color: #fff;
            text-decoration: none;
        }

        .dtp table.dtp-picker-days tr > td > a.selected {
            background: #1e88e5;
            color: #fff;
        }

        #dtp_UpXtk {
            overflow-y: inherit;
            overflow-x: hidden;
        }

        .dropzone {
            border: none;
            background: none !important;
        }

        .dropzone-style {
            border: 1px dashed #ccc;
            border-radius: 10px;
        }

        .dz-message {
            height: 70px;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child:before {
            top: 15px;
            background-color: #26c6da;
        }
    </style>
@endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('content')

    @if(session('claveCambiada'))
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center">{{session('claveCambiada')}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
    @if ($password_admin)
        <div class="card">
            <div class="card-body">
                @include('users.change_password')

            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-lg-4 col-xlg-4 col-md-4">
            <div class="card blog-widget">
                <div class="card-body text-center">
                    <div class="blog-image">
                        <i class="fas fa-user-md fa-3x"></i>
                    </div>
                    <h3>Estudio Médico</br>&nbsp;</h3>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('estudios.create')}}" class="btn btn-success">Crear Nuevo</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xlg-4 col-md-4">
            <div class="card blog-widget">
                <div class="card-body text-center">
                    <div class="blog-image">
                        <i class="fas fa-wallet fa-3x"></i>
                    </div>
                    <h3>Abono Promocional</br> {{$promocion->creditos}} Créditos</h3>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('payment', $promocion->id) }}" class="btn btn-warning">
                        Comprar por US$ {{number_format($promocion->costo,2,',','.')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xlg-4 col-md-4">
            <div class="card blog-widget">
                <div class="card-body text-center">
                    <div class="blog-image">
                        <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    </div>
                    <h3>Instrucciones de </br>Uso</h3>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-success">Mostrar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        var archivos = 0;

        function verificar() {
            if (archivos == 0) {
                toastr["warning"]("Debe agregar al menos 1 archivo adjunto.");
            }
        }
    </script>
    <script>
        Dropzone.options.myDz = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilessize: 100,
            maxFiles: 15,
            parallelUploads: 15,
            addRemoveLinks: true,
            previewsContainer: ".dz-preview",
            dictRemoveFile: 'Quitar de la lista',
            init: function () {
                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                submitButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on('addedfile', function (file) {
                    archivos = 1;
                    //alert('Se agregó un archivo');
                });
                this.on('complete', function (file) {
                    //myDropzone.removeFile(file);
                    location.reload();

                });
            }
        };
    </script>
    <script type="text/javascript">
        var page = new Vue({
            el: '#main-wrapper',
            data() {
                return {
                    itemsd: [],
                    ciudades: [],
                    paises: [],
                    pais: '',
                    create_direccion: {
                        direccion: null,
                        id_cliente: null,
                        pais: '',
                        ciudad: '',
                    },
                }
            },
            mounted() {
                console.log('init');
                this.getVueItemsDireccion();

                this.getPais();
            },
            methods: {
                noMostrar() {
                    axios.get('/api/visitah/{{Auth::user()->code_cliente}}').then((response) => {
                        introJs().exit();
                    });
                },
                getVueItemsDireccion: function () {
                    axios.get('/api/get/' + $('#id_cli').val() + '/direcciones').then((response) => {
                        this.itemsd = response.data;
                        console.log(this.itemsd);
                    }).catch((error) => {
                        console.log(error);
                    });
                },
                getPais: function () {
                    axios.get('/api/get/paises').then((response) => {
                        this.paises = response.data;
                    }).catch((error) => {
                        console.log(error);
                    });
                },
                getCiudad: function () {
                    axios.get('/api/get/' + this.pais + '/ciudades').then((response) => {
                        this.ciudades = response.data;
                    }).catch((error) => {
                        console.log(error);
                    });
                },
                createDireccionItem: function () {
                    var input = {
                        direccion: this.create_direccion.direccion,
                        id_cliente: $('#id_cli').val(),
                        id_pais: this.pais,
                        id_ciudad: this.create_direccion.ciudad,
                    };
                    axios.post('/api/direccion', input).then((response) => {

                        this.getVueItemsDireccion();
                        this.create_direccion = {
                            direccion: null,
                            id_cliente: null,
                            direccion: null,
                            pais: '',
                            ciudad: '',
                        }
                        toastr["success"]("Dirección creada con éxito.");
                        $('#modalDireccion').modal('hide');
                    }).catch((error) => {
                        console.log(error);
                    });
                },
            },
        })
    </script>
    <script src="{{asset('js/intro.js')}}"></script>
    @if(isset($visita->home))
        @if($visita->home == 0)
            <script>
                var functionDone = false;
                var timeout = setTimeout(function () {
                    introJs().setOptions({nextLabel: 'Siguiente', prevLabel: 'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más'}).start();
                    functionDone = true;
                }, 1000);
                $(document).ready(function () {
                    if (!functionDone) {
                        clearTimeout(timeout);
                        introJs().setOptions({nextLabel: 'Siguiente', prevLabel: 'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más'}).start();
                    }
                });
            </script>
        @endif
    @else
        <script>
            var functionDone = false;
            var timeout = setTimeout(function () {
                introJs().setOptions({nextLabel: 'Siguiente', prevLabel: 'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más'}).start();
                functionDone = true;
            }, 1000);
            $(document).ready(function () {
                if (!functionDone) {
                    clearTimeout(timeout);
                    introJs().setOptions({nextLabel: 'Siguiente', prevLabel: 'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más'}).start();
                }
            });
        </script>

    @endif
@endsection
