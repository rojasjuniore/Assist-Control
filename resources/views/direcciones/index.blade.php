@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')
<div class="card">
    <div class="card-body">
         <form action="" v-on:submit.prevent="createDireccionItem()">
                    <div class="row">
                        <div class="col-md-12"><center><p style="max-width: 800px; margin-top: 10px; margin-bottom: 20px"><i class="fa fa-map-marker"></i><b> Actualiza siempre tus direcciones</b>. Recuerda que la información correcta nos permite realizar el proceso más rápido y eficiente.</p></center></div>
                          <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion"><b>Ciudad</b></label>
                                <select v-model="create_direccion.ciudad"  class="form-control"  name="ciudad" id="">
                                    <option value="" disabled selected>Seleccione una Ciudad</option>
                                    <option v-for="ciudad in ciudades"  v-bind:value="ciudad.id_ciudad">@{{ ciudad.ciudad }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion"><b>Dirección</b></label>
                                <input type="text" v-model="create_direccion.direccion"  class="form-control" placeholder="Ingrese la dirección" name="direccion" required>
                                <input type="hidden" id="id_cli" name="id_cliente" value="{{Auth::user()->id_cliente}}" required>
                            </div>
                        </div>
                      
                    </div>
                 <button class="btn btn-outline-success" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#prealertaModal"> <i class="fas fa-plus"></i> Crear</button>
            </form>
    </div>
    <hr>
    <div class="table-responsive">
      <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Dirección</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in itemsd">
                                <td v-text="item.direccion"></td>
                                <td> <span v-if="item.paises" v-text="item.paises.pais"></span></td>
                                <td> <span  v-if="item.ciudades"  v-text="item.ciudades.ciudad"></span></td>
                                <td>
                                    <a href="#" v-on:click.prevent="deleteDatosd(item.id_direccion_cliente)" class="btn btn-danger btn-sm">Borrar</a>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
</div>
  
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script>
    var app2 = new Vue({
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
        greet: function (event) {
         
          alert('Hello');
           },
           createPrealertaItem: function () {
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
                        pais: '',
                        direccion: null,
                        ciudad: '',
                    }
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