<?php
    function estatus($est){
        switch ($est) {
            case 0:
                return 'En bodega';
                break;
            case 1:
                return 'Procesando';
                break;
            case 10:
                return 'Paquete listo para el envio';
                break;
            case 11:
                return 'Entregado a la aerolinea';
                break;
            case 12:
                return 'Pais destino';
                break;
            case 13:
                return 'Proceso de Aduanas';
                break;
            case 14:
                return 'Liberacion de Aduanas';
                break;
            case 15:
                return 'Procesando para entrega local';
                break;
            case 16:
                return 'Entregado transportadora local';
                break;
            default:
                return 'Por definir';
                break;
        }
    }
?>

@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.css">
<!-- Timeline CSS -->
<link href="{{asset('/vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
<style> 
table.dataTable thead .sorting:after {
    content: "\F0DC";
    margin-left: 10px;
    font-family: "Font Awesome 5 Free" !important;
    font-weight: 900;
    cursor: pointer;
    color: rgba(255, 255, 255, 1);
}

table{
  color: #000;
}

.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #26c6da;
    border-color: #26c6da;
}

.events li a{
    top: -35px;
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
<div id="page">
    <div class="card">
   <div class="card-body">
       <a href="{{route('programar-envios')}}"><button class="btn btn-outline-success"> <i class="fas fa-plus"></i> Programar Envío</button></a>
      <table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
           <thead >
               <tr>
                   <th></th>
                   <th>Código</th>
                   <th>Tracking</th>
                   <th>Fecha</th>
                   <th>Peso</th>
                   <th>Estatus</th>
                   <th>Factura</th>
                   <th>Historial</th>
               </tr>
           </thead>
           <tbody>
               @foreach($ordenes as $orden)
                   <tr @if( ($orden->estatus_manifiesto == 0 && $orden->status == 0) ||  ($orden->estatus_manifiesto == null && $orden->status == 0)) style='background: #fff;  font-weight: 500;' @endif>
                     <td>
                       @if(($orden->estatus_manifiesto == 0 && $orden->status == 0) ||  ($orden->estatus_manifiesto == null && $orden->status == 0))
                       <div class="form-check">
                         <input class="form-check-input" type="checkbox" v-on:change.prevent="listaids({{$orden->id_orden}})"  value="" id="check{{$orden->ware_reciept}}">
                         <label class="form-check-label" for="check{{$orden->ware_reciept}}">
                         </label>
                       </div>
                       @endif
                     </td>
                       <td>{{$orden->ware_reciept}}</td>
                       <td>{{$orden->tracking}}</td>
                       <td>{{$orden->fecha}}</td>
                       <td>{{$orden->peso}}</td>
                       <td><a href="{{url('/ordenes/mostrar/'.$orden->ware_reciept)}}">
                        @if($orden->estatus_manifiesto == null)
                           @if($orden->status == '1' && $orden->instrucciones == '2')
                               Procesando
                           @elseif($orden->instrucciones == '7')
                               Instrucciones recibidas
                            @elseif($orden->instrucciones == '0' && $orden->status == '0')
                              En bodega
                           @endif

                        @else
                        {{estatus($orden->estatus_manifiesto)}}
                        @endif
                        
                      </a></td>
                       <td>@if($orden->doc == 0)
                        No Disponible 
                        @else
                         {{$orden->doc}} 
                       @endif</td>
                       <td><a href="{{url('/ordenes/mostrar/'.$orden->ware_reciept)}}">
                          <i class="fas fa-eye text-success"></i></a>
                         </td>

                   </tr>
               @endforeach
           </tbody>
       
       </table>
   </div>
</div>


<div v-if="mostrarp" style="top: 10%; position: fixed; z-index: 100000;" class="card card-inverse card-primary" >
 <div class="card-body">
    <form action="{!!route('programar-envios')!!}" method="get">
     <input name="seleccionados" v-model="this.idselected" type="hidden">
   <p class="card-text" style="color: #fff;"> <b><span v-text="cant"></span> Paquetes seleccionados </b></p>
   <button class="btn btn-success" type="submit">Procesar Paquetes</a>
   </form>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="verHistorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document" >
       <form id="myForm" action="#"  v-on:submit.prevent="createDireccionItem()" method="post">
           @csrf
           <div class="modal-content">
               <div class="modal-body">
                   <ul>
                       <li v-for="historial in historiales">
                        <span v-text="historial.estatus"></span><br>
                        <span v-text="historial.fecha_orden"></span><br>
                       </li>
                   </ul>

                   <section class="cd-horizontal-timeline loaded">
                       <div class="timeline">
                           <div class="events-wrapper">
                               <div class="events" style="width: 1800px;">
                                   <ol>
                                       <li v-for="historial in historiales"><a href="#0" :data-date="historial.fecha" class=""><span v-text="historial.fecha"></span></a></li>
                                       <li><a href="#0" data-date="15/11/2018" class=""><span v-text="'15/11/2018'"></span></a></li>
                                   </ol>
                                   
                                   <span class="filling-line" aria-hidden="true" style="transform: scaleX(0.083559);"></span>
                               </div>
                               <!-- .events -->
                           </div>
                           <!-- .events-wrapper -->
                           <ul class="cd-timeline-navigation">
                               <li><a href="#0" class="prev inactive">Prev</a></li>
                               <li><a href="#0" class="next">Next</a></li>
                           </ul>
                           <!-- .cd-timeline-navigation -->
                       </div>
                       <!-- .timeline -->
                       <div class="events-content" style="height: 286px;">
                           <ol>
                               <li class="selected" data-date="16/01/2014">
                                   Fecha 1
                               </li>
                               <li data-date="28/02/2014" class="">
                                  Fecha 2
                               </li>
                               <li data-date="20/04/2014" class="">
                                  Fecha 3
                               </li>
                               <li data-date="20/05/2014" class="">
                                  Fecha 4
                               </li>
                               <li data-date="09/07/2014">
                                 Fecha 5
                               </li>
                           </ol>
                       </div>
                       <!-- .events-content -->
                   </section>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
               </div>
           </div>
       </form>
   </div>
</div>
</div>

@endif
 


@endsection
@section('js')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>



<script>    
    $(document).ready(function() {
    $('#data-table').DataTable({
        "order": [[ 3, "desc" ]],
        "language":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Ver _MENU_",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "_START_ al _END_ de  _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     ">>",
                "sNext":     ">",
                "sPrevious": "<"
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

<script type="text/javascript">
  var page = new Vue({
  	el: '#main-wrapper',
  	data: {
      cant : 0,
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
        mostrarp(){
            if (this.cant < 1) {
               return false; 
            }else{
              return true;
            }
        },
    },
  	methods: {
      listaids(data){
        if(!this.idselected.includes(data)){
          this.idselected.push(data);
          this.cant = this.idselected.length;
        }else{
          var indicedata =  this.idselected.indexOf(data); 
          this.idselected.splice(indicedata, 1);
          this.cant = this.cant -1;
        }
      },
      getHistorial: function (id) {
                axios.get('/api/get/'+id+'/historial').then((response) => {
                    this.historiales = response.data;
                    
                }).catch((error) => {
                    console.log(error);
                });
            },
  	}
  })
</script>


@endsection