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
         <form action="" v-on:submit.prevent="createPromocionItem()">
                    <div class="row">
                		 <div  class="col-md-6">
                		 		<div class="form-group">
	                                <label for=""><b>Nombre</b></label>
	                                <input type="text" v-model="create_promocion.nombre"  class="form-control" placeholder="Ingrese el nombre de la promoción" name="nombre" required>
	                            </div>
                		 		<div class="form-group">
                		 		   <label for=""><b>Descripción</b></label>
	                               <textarea  v-model="create_promocion.descripcion"  name="descripcion" class="form-control" id="" cols="30" rows="3" placeholder="Descripción de la promoción"></textarea>
	                            </div>
                    	  </div>
                    	  	 <div style="border-left: 2px solid #ddd;" class="col-md-6">
									<span style="font-size:16px; font-weight: bolder; margin-bottom: 10px;"><b>Variaciones</b></span>
                    	  	 	<div style="margin-top: 8px;"  v-for="field in fields">
                    	  	 		<div class="row">
                    	  	 		<div class="col-md-6">
                    	  	 			<div class="form-group">
                    	  	 				<input v-model="field.precio" class="form-control" placeholder="Ingrese el precio">
                    	  	 			</div>
                    	  	 			
                    	  	 		</div>
                    	  	 		<div class="col-md-6">
                    	  	 			<div class="form-group">
                    	  	 				  <input v-model="field.peso" class="form-control" placeholder="Ingrese el peso">
                    	  	 			</div>
                    	  	 			
                    	  	 		</div>
								    </div>
								  
								  </div>
								  <button class="btn btn-primary" @click.prevent="AddField">
								    Añadir más
								  </button>
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
                        <th scope="col">Promoción</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in itemsd">
                            <td> <span v-text="item.nombre"></span></td>
                            <td> <span v-text="item.descripcion"></span></td>
                            <td>
                                <a href="#" v-on:click.prevent="deleteDatosd(item.id)" class="btn btn-danger btn-sm">Borrar</a>
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
                 create_promocion : {
                     nombre : null,
                     descripcion : null,
                     fields: '',
                },
                fields: [{ precio: '',peso: '' }],
            }   
        },
        mounted() {
           console.log('init');
           this.getVueItemsPromocion();
        },
      methods: {
        greet: function (event) {
         
          alert('Hello');
           },
             /*Direcciones*/
             getVueItemsPromocion: function () {
                axios.get('/api/get/promociones').then((response) => {
                    this.itemsd = response.data;
                    console.log(this.itemsd);
                }).catch((error) => {
                    console.log(error);
                });
            },
              createPromocionItem: function () {
                 var input = {
                    nombre: this.create_promocion.nombre,
                    descripcion: this.create_promocion.descripcion,
                    fields: this.fields,
     
                 };
                 axios.post('/api/promociones', input).then((response) =>  {
                    this.getVueItemsPromocion();
                    this.create_promocion = {
                        nombre: null,
                        descripcion: null,
                        fields: '',
                    }
                    this.fields = [{ precio: '',peso: '' }];
                    this.getVueItemsPromocion();
                });
            },
             deleteDatosd: function (id) {
                if ( confirm('¿Estas seguro que deseas borrar esto?')) { 
                    axios.delete('/api/promociones/'+id).then((response) => {
                       this.getVueItemsPromocion();
                    });
                }
                
                  },
             AddField: function () {
		      	this.fields.push({ precio: '',peso: '' });
		    }
        }
});
</script>
 
@endsection
