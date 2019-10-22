@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<link rel="stylesheet" href="{{asset('css/introjs.css')}}">
<style>
    .ticket{
        width: 40%;
    
    }
        @media only screen and (max-width: 600px) {
            .ticket{
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
    #dtp_UpXtk{
    overflow-y: inherit;
    overflow-x: hidden;
    }
    .dropzone{
    border: none;
    background: none !important;
    }
    .dropzone-style{
    border: 1px dashed #ccc;
    border-radius: 10px;
    }
    .dz-message{
    height: 70px;
    }
    table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child:before {
    top: 15px;
    background-color: #26c6da ;
    }
</style>
@endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('content')
    @if($pagodhl == '0')
    @else
        <div class="alert alert-danger"> <i class="ti-warning"></i> Tiene un proceso de pago de envio pendiente, por favor completalo:  <br>
            <b><a href="{{route('facturaciondhl')}}">Pagar Ahora</a></b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
    @endif
    @if($invoicePayable['result'] == '0')
    @else
        <div class="alert alert-danger"> <i class="ti-warning"></i> Tiene ({{$invoicePayable['cant']}}) proceso(s) de pago de envio pendiente, por favor completalo:  <br>
            <b><a href="{{route('facturacioncomun')}}">Pagar Ahora</a></b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
    @endif

@if(Auth::user()->direccion == '')
    <div class="alert alert-danger"> <i class="ti-warning"></i> Debes completar tu información de contacto para gestionar paquetes <br>
    <b><a href="{{route('perfil')}}">Completar perfil</a></b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
@endif
<button style="margin-bottom:15px;"  onclick="javascript:introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'Saltar' }).start();" class="btn btn-success btn-sm">Ver guía de uso</button> <br>
        <b>Siempre que envíes mercancía a tu casillero: </b>
        <p>Recibirás información del producto / Consultarás tu inventario en tiempo real / Programarás tus despachos.</p>
      <div class="row">
                    <!-- Column -->
                     <div class="col-lg-3 col-md-6" data-step="4" data-intro="Aquí podrás crear pre alertas para notificarnos del envío y agilizar el proceso." >
                        <div class="card">
                            <div class="card-body" style="padding: 0">
                          <a href="#" data-toggle="modal" data-target="#prealertaModal" data-backdrop="static" data-keyboard="false">
                               
                                    <div class="d-flex flex-row">
                                        <div  style="" class="bg-success ticket">
                                            <div class="m-md-3">   
                                                    <img class=""  width="60px;" src="{{asset('images/prealertar.png')}}" alt="">
                                            </div>
                                        </div>
                                        
                                        <div class="m-l-10 p-md-3 align-self-center">
                                            <h4 class="m-b-0 font-light">Crear Pre alerta</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6" data-step="5" data-intro="Aquí podrás programar tus envíos, declarar los valores y seleccionar las direcciones donde deseas recibir tus paquetes." class="table browser m-t-0 no-border">
                        <div class="card">
                            <div class="card-body" style="padding: 0">
                                <a href="{{route('programar-envios')}}">
                                <div class="d-flex flex-row">
                                    <div  class="bg-success ticket">
                                        <div class="m-md-3">   
                                                <img class=""  width="60px;" src="{{asset('images/programar-envio.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="m-l-10 p-md-3 align-self-center">
                                        <h4 class="m-b-0 font-light">Programar envío</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6" data-step="6" data-intro="Aquí podrás monitorear el estado de tus paquetes ingresando el número de guía. ">
                        <div class="card">
                            <div class="card-body" style="padding: 0">
                                <a data-toggle="modal" data-target="#rastrearModal">
                                <div class="d-flex flex-row">
                                    <div   class="bg-success ticket">
                                        <div class="m-md-3">   
                                                <img class=""  width="60px;" src="{{asset('images/rastrea.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="m-l-10 p-md-3 align-self-center">
                                        <h4 class="m-b-0 font-light">Rastrear paquete</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="padding: 0">
                                <div class="d-flex flex-row">
                                    <div  class="bg-success ticket">
                                        <div class="m-md-3">   
                                                <img class=""  width="60px;" src="{{asset('images/puntos.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="m-l-10 p-md-3 align-self-center">
                                        <h4 class="m-b-0 font-light">Puntos</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Paquetes en proceso</h3>
                                        <h6 class="card-subtitle">Enero 2018 <i class="fa fa-angle-down "></i>  </h6>
                                        <button type="button" style="" class="btn btn-secondary btn-circle btn-sm float-right"><i class="fa fa-plus"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Paquetes en bodega</h3>
                                        <h6 class="card-subtitle">Enero 2018 <i class="fa fa-angle-down "></i> </h6>
                                         <button type="button" style="" class="btn btn-secondary btn-circle btn-sm float-right"><i class="fa fa-plus"></i> </button>
                                          </div>
                                       
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{Auth::user()->nombre}}</h3>
                                <div data-step="1" data-intro="Este es tu código de casillero.">
                                    <h6 class="card-subtitle">Cliente Nº {{Auth::user()->code_cliente}}</h6>
                                </div>
                                <hr class="m-t-0 m-b-4">
                                <h3 class="text-primary m-b-0">Dirección de entrega</h3>
                                <table data-step="2" data-intro="A estas direcciones debes enviar tus paquetes, dependiendo del país donde realizaste la compra" class="table browser m-t-0 no-border">
                                    <tbody>
                                        <tr>
                                            <td style="width:48px;"><img style="width:48px;" src="{{asset('images/USA.png')}}" alt="logo"></td>
                                            <td><span class="label label-inverse">USA </span> {{Auth::user()->nombre}}  / {{Auth::user()->code_cliente}} <br> <span style="margin-left: 45px;"> 3509 nw 115 Ave, Doral FL 33178 </span></td>
                                        </tr>
                                        <tr>
                                            <td><img style="width:48px;"  src="{{asset('images/SPAIN.png')}}"  alt="logo"></td>
                                            <td><span class="label label-inverse">ESP</span> {{Auth::user()->nombre}} / {{Auth::user()->code_cliente}} <br> <span style="margin-left: 45px;">Avd de las Américas 4 Nave B6 CP 28823 Coslada </span></td>
                                    </tbody>
                                </table>
                                <a href="{{route('direcciones')}}">
                                   <button data-step="3" data-intro="Aquí podrás gestionar las direcciones donde deseas se envien tus paquetes." type="button" class="btn btn-success btn-lg  float-right"> <i class="fas fa-map"></i> Mis Direcciones </button>                                </a>
                            </div>

                                <br>
                        </div>
                    </div>

                    {{-- <div class="col-lg-6 col-md-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                	<center>
                                    <h4 class="mt-md-3 card-title font-bold" style="color: #24c6da; font-size: 20px;">Tips de seguridad</h4>
                                    <h5>Para compras en online</h5>
                                    <a href="https://casilleroexpressusa.com/casillero-espresss-usa-tip-de-seguridad.pdf" target="_blank"><button type="button" class="btn btn-success m-md-3"><i class="fas fa-file-pdf"></i> VER MÁS</button></a></center>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://casilleroexpressusa.com/imagenes/tips-banner.png">
                                </div>     
                                </div>
                          </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-5 col-md-12">
                        <a href="https://casilleroexpressusa.com/casillero-espresss-usa-tip-de-seguridad.pdf" target="_blank">
                         	<img src="https://casilleroexpressusa.com/imagenes/casillero-express-tip-seguridad.png" class="img-responsive" style="max-width: 580px">
                        </a>       
                    </div>
                    {{-- <div class="col-lg-6 col-md-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <center><h4 class="card-title font-bold" style="color: #24c6da; font-size: 20px;">No solo<br>Amazon y Walmart </h4>
                                    <h5 class="font-light">Hay Miles de tienda en el mundo</h5></center>
                                    <center>
                                    	<a href="{{route('directorio')}}" target="_blank">
                                        	<button type="button" class="btn btn-success m-md-3 align-self-center"><i class="fas fa-file-cart"></i> COMPRAR</button>
                                    	</a>
                                    </center>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://casilleroexpressusa.com/imagenes/casillero-express-tiendas-1.png">
                                </div>     
                                </div>
                          </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-2 col-md-12">
                                                        
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <a href="{{route('directorio')}}">
                        	<img src="https://casilleroexpressusa.com/imagenes/casillero-express-tiendas-3.png" class="img-responsive" style="max-width: 580px">
                        </a>                                
                    </div>
                </div>
    </div>

                    

    <!-- Modal -->
    <div class="modal fade" id="rastrearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs" role="document" >
                <form action="{{route('ordenes-buscar')}}"  method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-body">
                          <h3><b>Rastreo de paquetes</b></h3>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Ingrese el codigo de rastreo" name="code">
                          </div>
                          <button class="btn btn-success" type="submit">Rastrear</button>
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
         </div>
<!-- Modal -->
<div class="modal fade" id="prealertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" >
        <form action="{{route('prealerta.store')}}" class="dropzone" id="my-dz" files="true" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-body">
                        <h4 class="box-title font-weight-bold">Paso #1: Información del paquete</h4>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Compañia Courier</label>
                                    <input type="text" class="form-control"  name="courier" placeholder="Courier" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tienda donde compraste</label>
                                    <input type="text" class="form-control"  name="tienda" placeholder="Tienda" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Valor del paquete</label>
                                    <input type="number" class="form-control" name="valor" placeholder="Valor" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">N&uacute;mero de Orden</label>
                                    <input type="text" class="form-control"  name="nu_orden" placeholder="N&uacute;mero Orden" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">N&uacute;mero de Tracking</label>
                                    <input type="text" class="form-control"  name="tracking" placeholder="Tracking" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Describe tu paquete</label>
                                    <textarea name="descripcion" class="form-control" id="" cols="30" rows="1" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="box-title font-weight-bold">Paso #2: Añade la factura</h4>
                            <div style="padding 0px; border-color: rgb(1, 203, 213); border-width: 2px;" class="dropzone-style">
                                <div style="margin:0px;" class="dz-message text-success" >
                                    <b> Arrastra y suelta tus archivos o haz click aquí </b>
                                    <br><i style="font-size:3vw;" class="fa fa-file" aria-hidden="true"></i>
                                </div>
                                <div class="dz-preview dz-file-preview"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="box-title font-weight-bold">Paso #3: Detalles de env&iacute;o</h4>
                            <div class="form-group">
                                <label class="control-label">¿Cómo deseas procesar tu paquete? </label>
                                <select name="estatus" class="form-control" id="" required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="1">Despachar de inmediato</option>
                                    <option value="0">Esperar por otros</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label  class="control-label">¿A qué dirección deseas enviar tu paquete?</label>
                                <select name="direccion" class="form-control" id="" required>
                                    <option value="" disabled selected>Seleccione una dirección</option>
                                    @if(count($direcciones) > 0)
                                    <option v-for="item in itemsd"  v-bind:value="item.direccion+' '+item.ciudades.ciudad+' '+item.paises.pais">@{{item.direccion+', '+item.paises.pais+', '+item.ciudades.ciudad}} </option>s
                                    @else
                                    <option value="{{$direccion1}}">{{$direccion1}}</option>
                                    @endif
                                </select>
                            </div>
                            <button type="button" class="btn btn-success btn-sm float-right mt-0 " data-toggle="modal" data-target="#modalDireccion">
                                  Agregar dirección 
                                </button>
                            <input type="hidden" name="id_cli" value="{{Auth::user()->id_cliente}}">
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" onclick="verificar()" class="btn btn-success" id="submit-all">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva dirección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" v-on:submit.prevent="createDireccionItem()">
      <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group">
                <label for=""><b>País</b></label>
                <select v-model="pais" v-on:change="getCiudad()" class="form-control"  name="pais" id="">
                    <option value="" disabled selected>Seleccione un País</option>
                    <option value="12">Argentina</option>
                    <option value="97">Colombia</option>
                    <option value="39">Costa Rica</option>
                    <option value="37">Chile</option>
                    <option value="225">Venezuela</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="direccion"><b>Ciudad</b></label>
                <select v-model="create_direccion.ciudad"  class="form-control"  name="ciudad" id="">
                    <option value="" disabled selected>Seleccione una Ciudad</option>
                    <option v-for="ciudad in ciudades"  v-bind:value="ciudad.id_ciudad">@{{ ciudad.ciudad }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="direccion"><b>Dirección</b></label>
                <input type="text" v-model="create_direccion.direccion"  class="form-control" placeholder="Ingrese la dirección" name="direccion" required>
                <input type="hidden" id="id_cli" name="id_cliente" value="{{Auth::user()->id_cliente}}" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Crear</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    var archivos = 0;
    function verificar(){
        if(archivos == 0){
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
        submitButton.addEventListener('click', function(e) {
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
     data () {
            return{
                itemsd: [],
                ciudades: [],
                paises: [],
                pais: '',
                 create_direccion : {
                     direccion : null,
                     id_cliente : null,
                     pais: '',
                     ciudad:'',
                },
            }   
        },
        mounted() {
           console.log('init');
            this.getVueItemsDireccion();
            
            this.getPais();
        },
  	methods: {
        noMostrar(){
            axios.get('/api/visitah/{{Auth::user()->code_cliente}}').then((response) =>  {
                introJs().exit();
            });
        },
        getVueItemsDireccion: function () {
                axios.get('/api/get/'+$('#id_cli').val()+'/direcciones').then((response) => {
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
                axios.get('/api/get/'+this.pais +'/ciudades').then((response) => {
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
                 axios.post('/api/direccion', input).then((response) =>  {

                    this.getVueItemsDireccion();
                    this.create_direccion = {
                        direccion: null,
                        id_cliente: null,
                        direccion: null,
                         pais: '',
                        ciudad:'',
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
            var timeout = setTimeout(function() {
                introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más' }).start();
                functionDone = true;
            }, 1000);
            $(document).ready(function() {
                if (!functionDone) {
                    clearTimeout(timeout);
                    introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más' }).start();
                }
            });
        </script>
    @endif
@else
<script>
    var functionDone = false;
    var timeout = setTimeout(function() {
        introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más' }).start();
        functionDone = true;
    }, 1000);
    $(document).ready(function() {
        if (!functionDone) {
            clearTimeout(timeout);
            introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'No mostrar más' }).start();
        }
    });
</script>

@endif
@endsection
