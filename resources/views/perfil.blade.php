@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

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
</style>
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>


    
@endpush

@section('content')
  <h1>Perfil de usuario</h1>
  <div class="card">
    <div class="card-body">
         <form method="POST" action="{{ route('storeperfil') }}">
                @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                            <input type="text" name="nombre" value="{{$user->nombre}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Email</b></label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control" readonly>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for=""><b>País</b></label>
                                        <select v-on:change="getCiudad()" class="form-control"  name="pais" id="spais">
                                            <option <?php if ($user->pais == "12" ) echo 'selected' ; ?> value="12">Argentina</option>
                                            <option <?php if ($user->pais == "97" ) echo 'selected' ; ?>  value="97">Colombia</option>
                                            <option <?php if ($user->pais == "39" ) echo 'selected' ; ?>  value="39">Costa Rica</option>
                                            <option <?php if ($user->pais == "37" ) echo 'selected' ; ?>  value="37">Chile</option>
                                            <option <?php if ($user->pais == "225" ) echo 'selected' ; ?>  value="225">Venezuela</option>
                                        </select>
                                    </div>
                        
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="direccion"><b>Ciudad</b></label>
                                    <select class="form-control"  name="ciudad" id="">
                                            @if($user->ciudad)
                                                <option value="{{$user->ciudad}}" disabled selected>{{$user->ciudades->ciudad}}</option>
                                            @else
                                               <option value="" disabled selected>Seleccione una Ciudad</option>
                                            @endif
                                        <option v-for="ciudad in ciudades"  v-bind:value="ciudad.id_ciudad  ">@{{ ciudad.ciudad }}</option>
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Dirección</b></label>
                                <input type="text" name="direccion" value="{{$user->direccion}}" class="form-control" required>
                                </div>
                        </div>
                      
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Teléfono</b></label>
                                <input type="text" name="telefono" value="{{$user->telefono}}" class="form-control" required>
                                </div>
                        </div>  
                    </div>
                 <button type="submit" class="btn btn-outline-success" >Actualizar</button>
            </form>
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
                pais: document.getElementById('spais').value,
                 create_prealerta : {
                     nu_orden : null,
                     tienda: null,
                     descripcion : null,
                     doc: null,
                     valor: null,
                     tracking: null,
                     courier: null,
                     fecha: null,
                },
                 create_direccion : {
                     direccion : null,
                     id_cliente : null,
                     pais: null,
                     ciudad:null,
                },
            }   
        },
        mounted() {
           console.log('init');
            this.getVueItemsDireccion();
            this.getCiudad()
            
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
                this.pais = document.getElementById('spais').value;
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
                        pais: null,
                        direccion: null,
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
