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
<style>
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
@section('content')
@if(Auth::user()->direccion == '')
<div class="alert alert-danger"> <i class="ti-warning"></i> Debes completar tu información de contacto para gestionar paquetes <br>
    <b><a href="{{route('perfil')}}">Completar perfil</a></b>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>
@else
@if($pagodhl != '0')
<div class="alert alert-danger"> <i class="ti-warning"></i> Tiene un proceso de pago de envio pendiente, por favor completalo:  <br>
    <b><a href="{{route('facturaciondhl')}}">Pagar Ahora</a></b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
@endif
<input type="hidden" id="tipocliente" value="{{Auth::user()->cliente_envio}}">
<div class="card">
    <div class="card-body">
        <button class="btn btn-outline-success" data-toggle="modal" data-target="#prealertaModal" data-backdrop="static" data-keyboard="false"> <i class="fas fa-plus"></i> Crear</button>
        <p style="max-width: 800px; margin-top: 10px; margin-bottom: 20px"><i class="far fa-chart-bar"></i><b> Recuerda</b> siempre pre alertar tus compras. Este proceso nos permitirá estar atentos a la llegada de tus paquetes a nuestras instalaciones y en la modalidad de envío inmediato, realizar más rápido y eficiente el proceso de envío a tu destino.</p>
        <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>Numero Orden</th>
                    <th>Tienda</th>
                    <th>Valor</th>
                    <th>Estatus</th>
                    <th>Tracking</th>
                    <th>Courier</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prealertas as $prealerta)
                <tr>
                    <td>{{$prealerta->nu_orden}}</td>
                    <td>{{$prealerta->tienda}}</td>
                    <td>{{$prealerta->valor}}</td>
                    <td>
                        @if( $prealerta->tipoenvio == 0 || $prealerta->tipoenvio == null  )
                        <div class="label label-table label-warning">En espera</div>
                        @else
                        <div class="label label-table label-success">{{$prealerta->tipoenvio}}</div>
                        @endif
                    </td>
                    <td>{{$prealerta->tracking}}</td>
                    <td>{{$prealerta->courier}}</td>
                    <td>{{date('Y-m-d',strtotime($prealerta->fecha))}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button btn-sm" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('/pre-alertas/mostrar/'.$prealerta->id_orden_cli)}}">Ver</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
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
                                    <br><i style="font-size:3vw;" class="fa fa-file" aria-hidden="true"></i><br>
                                    <small>Agrega siempre tu factura. Este documento nos permite validar tu compra y tener presentes los datos necesarios para la recepción y el posterior envío de tus paquetes. </small>
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
                                    <option v-for="item in itemsd"  v-bind:value="item.id_direccion_cliente">@{{item.direccion+', '+item.paises.pais+', '+item.ciudades.ciudad}} </option>s
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

<!-- Button trigger modal -->


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
    		toastr["success"]("Pre Alerta creada con éxito");
            $('#prealertaModal').modal('hide');
            
    	});
    }
    };
      $(document).ready(function() {
      $('#mdate').bootstrapMaterialDatePicker({ format : 'YYYY/MM/DD', lang : 'es', weekStart : 1 , time : false});
      $('#data-table').DataTable({
      	"order": [[ 6, "desc" ]],
          "language":{
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    
              "sInfoPostFix":    "",
    
              "sSearch":         "Buscar:",
    
              "sUrl":            "",
    
              "sInfoThousands":  ",",
    
              "sLoadingRecords": "Cargando...",
    
              "oPaginate": {
    
                  "sFirst":    "Primero",
    
                  "sLast":     "Último",
    
                  "sNext":     "Siguiente",
    
                  "sPrevious": "Anterior"
    
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
<script>
    var app2 = new Vue({
    el: '#main-wrapper',
    data () {
            return{
                clientedhl: '',
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
        greet: function (event) {
         
          alert('Hello');
           },
           createPrealertaItem: function () {
            this.clientedhl = document.getElementById(tipocliente).value;
                var input = {
                    nu_orden: this.create_prealerta.nu_orden,
                     tienda: this.create_prealerta.tienda,
                     descripcion: this.create_prealerta.descripcion,
                     doc: this.files,
                     valor: this.create_prealerta.valor,
                     tracking: this.create_prealerta.tracking,
                     courier: this.create_prealerta.courier,
                     fecha: $('#mdate').val(),
                     idc : $('#prealert_id_field').val(),
                     dhl : this.clientedhl,
                }
                axios.post('/api/prealerta', 
                        input
                    ).then((response) => {
                    console.log(response);
                    this.create_prealerta = {
                     nu_orden : null,
                     tienda: null,
                     descripcion : null,
                     doc: null,
                     valor: null,
                     tracking: null,
                     courier: null,
                     fecha: null,
                    }
                });
             },
             /*Direcciones*/
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
             deleteDatosd: function (id) {
                if ( confirm('¿Estas seguro que deseas borrar esto?')) { 
                    axios.delete('/api/direccion/'+id).then((response) => {
                       this.getVueItemsDireccion();
                    });
                }
                
                  },
        }
});
</script>
@endsection