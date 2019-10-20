@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')
<style>
    .custom-file-label::after {
    content: "Buscar" !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">
@endsection
@section('content')

<div class="card">
    <div class="card-body">
     
                    <div class="row">
                        
                        <div class="col-md-6">
                            <h3>Crear Servicio</h3>
                            <form action="" v-on:submit.prevent="createServicioItem()">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Nombre del servicio</b></label>
                                        <input type="text" v-model="create_servicio.nombre"  class="form-control" placeholder="Ingrese el nombre" name="nombre" required>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Precio</b></label>
                                        <input type="text" v-model="create_servicio.precio"  class="form-control" placeholder="Precio" name="precio" required>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Descripción</b></label>
                                        <textarea name="descripcion" class="form-control"  v-model="create_servicio.descripcion" id="" cols="30" rows="2" placeholder="Descripción del servicio" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for=""><b>Icono</b></label><br>
                                        <a style="color:#fff;"  @click="ModalIcon" class="btn btn-primary">Seleccionar icono</a>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div v-if="this.seleccionado">
                                        <label for=""><b>Seleccionado</b></label><br>
                                        <a class="border border-success p-md-2" href="">
                                            <img class="img-fluid" :src="url+this.seleccionado" alt="">
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                  
                                </div> 

                                <button class="btn btn-outline-success float-right"> <i class="fas fa-plus"></i> Crear</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                                <h3>Subir Iconos</h3>
                                <div>
                                    <div class="form-group">
                                        <label for=""><b>Nombre</b></label>
                                        <input id="icon-name" type="text" class="form-control" placeholder="Nombre del icono" name="icono" required>
                                    </div>
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input  type="file" name="image" id="image"   class="custom-file-input" accept="image/*"  >
                                          <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" @click="updateIcon">Subir Icono</button>
                                 
                                </div>

                        </div>
                           
                            
                        </div>
                         
                    
                   
                 
    </div>
    <hr>
    <div class="table-responsive">
      <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Icono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in itemsd">
                                <td v-text="item.nombre"></td>
                                <td v-text="item.precio"> </td>
                                <td v-text="item.icono"> </td>
                              
                                <td>
                                    <a href="#" v-on:click.prevent="deleteDatosd(item.id)" class="btn btn-danger btn-sm">Borrar</a>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>

</div>

<!-- Modal -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione un icono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div v-for="icon in icons" class="col-md-3">
                <img style="max-width: 100px;" :src="url+icon.url" alt="">
                <center> <a href="" style="color: #fff;" class="btn btn-success" @click.prevent="selectIcon(icon.url)" >Seleccionar</a></center>
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    var app2 = new Vue({
    el: '#main-wrapper',
    data () {
            return{
                itemsd: [],
                icons: [],
                url: 'icons/',
                seleccionado: '',
                imagen : null,
                create_servicio : {
                     nombre : null,
                     precio : null,
                     icono  : null,
                     descripcion: null,
                },
            }   
        },
        mounted() {
            this.getVueItemsServicio();
            this.getIcons();
        },
      methods: {
             /*Servicios Adicionales*/
             getVueItemsServicio: function () {
                axios.get('/api/get/servicio').then((response) => {
                    this.itemsd = response.data;
                    console.log(this.itemsd);
                }).catch((error) => {
                    console.log(error);
                });
            },
             getIcons: function () {
                axios.get('/api/iconget').then((response) => {
                    this.icons = response.data;
                    console.log(this.icons);
                }).catch((error) => {
                    console.log(error);
                });
            },
              createServicioItem: function () {
                 var input = {
                    nombre: this.create_servicio.nombre,
                    precio: this.create_servicio.precio,
                    icono : this.seleccionado,
                    descripcion: this.create_servicio.descripcion,
                 };
                 axios.post('/api/servicio', input).then((response) =>  {
                     toastr["success"]("Servicio agregado con exito");
                    this.getVueItemsServicio();
                    this.create_servicio = {
                        nombre: null,
                        precio: null,
                        icono:  null,
                        descripcion: null,
                    }
                    this.seleccionado = '';
                });
            },
             deleteDatosd: function (id) {
                if ( confirm('¿Estas seguro que deseas borrar esto?')) { 
                    axios.delete('/api/servicio/'+id).then((response) => {
                       this.getVueItemsServicio();
                    });
                }
                
                  },
         
               updateIcon(){

                 axios.defaults.headers.common["X-CSRF-TOKEN"] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

                if( document.getElementById('icon-name').value == ''){
                    toastr["warning"]("Complete el campo nombre del icono");
                }else if(document.getElementById('image').files[0] == '' ){
                    toastr["warning"]("Seleccione un archivo");
                }else{
                     let formData = new FormData();

                formData.append('icon', document.getElementById('image').files[0]);
                formData.append('iconname', document.getElementById('icon-name').value);
                console.log(formData);

                 axios.post( 'api/icono',
                      formData,
                      {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                      }
                    ).then(function(){
                       toastr["success"]("Icono agregado con exito");
                       document.getElementById('icon-name').value = '';
                       document.getElementById('icon').value = '';
                       this.getIcons();
                       $('#IconModal').removeData();
                    })
                    .catch(function(){
                       document.getElementById('icon-name').value = '';
                       document.getElementById('icon').value = '';
                       this.getIcons();
                       $('#iconModal').removeData();
                    });
      
                }

               
            },
            ModalIcon(){
                this.getIcons();
                $("#iconModal").modal("show");
            },
            selectIcon(val){
                this.seleccionado = val;
                  $('#iconModal').modal('hide');
            }

        }
});
</script>
 
@endsection