@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/toast-master/css/jquery.toast.css">
<link rel="stylesheet" href="{{asset('css/introjs.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
.toast {
    opacity: 1 !important;
}
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000000000000000;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #9370DB;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}
#loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #BA55D3;
    -webkit-animation: spin 3s linear infinite;
    animation: spin 3s linear infinite;
}
#loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #FF00FF;
    -webkit-animation: spin 1.5s linear infinite;
    animation: spin 1.5s linear infinite;
}
@-webkit-keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
</style>
@endsection
<?php
function cortar_palabras($texto, $largor = 5, $puntos = "...") 
{ 
   $palabras = explode(' ', $texto); 
   if (count($palabras) > $largor) 
   { 
     return implode(' ', array_slice($palabras, 0, $largor)).$puntos; 
   } else
         {
           return $texto; 
         } 
} 
function cortar_palabra($texto, $largor = 15, $puntos = "...") 
{ 
 if($texto == null){
  return 'Sin Tracking';
 }else{
    if (strlen($texto) > $largor) 
   { 
     return substr($texto, 0, 15).$puntos; 
   } else
         {
           return $texto; 
         } 
 }
   
} 
?>
@section('content')
<div v-if="preloader"  id="preloader">
  <div id="loader"></div>
</div>
@if(Auth::user()->direccion == '')
    <div class="alert alert-danger"> <i class="ti-warning"></i> Debes completar tu información de contacto para gestionar paquetes <br>
        <b><a href="{{route('perfil')}}">Completar perfil</a></b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
@else
@if($pagodhl != '0')
<div class="alert alert-danger"> <i class="ti-warning"></i> Tiene un proceso de pago de envio pendiente, por favor completalo:
    <br>
    <b><a href="{{route('facturaciondhl')}}">Pagar Ahora</a></b>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>
@endif
<button style="margin-bottom:15px;" onclick="javascript:introJs().setOptions({nextLabel:'Siguiente', prevLabel:'Anterior', doneLabel: 'No mostrar más', 'skipLabel': 'Saltar' }).start();" class="btn btn-success btn-sm">Ver guía de uso</button>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p style="max-width: 800px; margin-top: 10px; margin-bottom: 20px"><i class="far fa-calendar"></i><b> Programa tus envíos</b> una vez recibas nuestra notificación. De esta forma podrás llevar control de los cobros y el tiempo de envío de tus paquetes. </p>
                        <h4 class="card-title">Lista de paquetes a enviar</h4>
                        <h6 class="card-subtitle">Paquetes sin envio programado</h6>
                    </div>
                    <div class="col-md-3" data-step="2" data-intro="Aquí se mostrara el valor total de todos los paquetes agregados">
                        <div style="margin-bottom: 0px;" class="card card-inverse card-success">
                            <div style="-ms-flex: 1 1 auto; flex: 1 1 auto; padding: 0.75rem;" class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="card-title">USD <span v-text="totalPaquete"></span></h3>
                                        <h6 class="card-subtitle">Total declarado</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" data-step="3" data-intro="Aquí se mostrara el peso total de los paquetes agregado">
                        <div style="margin-bottom: 0px;" class="card card-inverse card-success">
                            <div style="-ms-flex: 1 1 auto; flex: 1 1 auto; padding: 0.75rem;" class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="card-title"><span v-text="pesoPaquete"></span> Lbs</h3>
                                        <h6 class="card-subtitle">Peso total</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="vtotal" type="hidden" value="{{$vtotal}}"> {{$visita->prealerta}}
                <div class="table-responsive d-none d-sm-block">
                    <table style="font-size: 13px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Código </th>
                                <th>Tracking</th>
                                <th>Descripción</th>
                                <th style="width: 30%;">Valor declarado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programar as $item)
                            <tr id="{{$item->ware_reciept}}">
                                <td><span data-toggle="modal" data-target="#verPaqueteModal" v-on:click.prevent="verPaquete({{$item}})"> <i class="fas fa-eye text-success"></i> &nbsp;</span> {{$item->ware_reciept}}</td>
                                <td data-toggle="tooltip" data-placement="bottom" title="{{$item->tracking}}">{{cortar_palabra($item->tracking)}}</td>
                                <td data-toggle="tooltip" data-placement="bottom" title="{{$item->descripcion}}">{{cortar_palabras($item->descripcion)}}</td>
                                <?php
                                $descripcion = 'Sin descripción';
                                if($item->descripcion){
                                    $descripcion = $item->descripcion;
                                }
                            ?>
                                    <td data-step="1" data-intro="Agregue el valor declarado de su envio y precione el boton (+)">

                                        <input id="{{$item->id_orden}}" type="number" class="form-control" style="width: 40%" placeholder="USD">
                                        <button style="margin-top:-3px;" v-on:click.prevent="sendPaquete({{$item}},<?php echo $item->id_orden; ?>, '<?php echo $item->ware_reciept; ?>','<?php echo $item->code_cliente; ?>')" class="btn btn-success">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive d-block d-sm-none">
                    <table style="font-size: 13px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Código </th>

                                <th>Valor declarado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programar as $item)
                            <tr id="{{$item->ware_reciept}}">
                                <td><span data-toggle="modal" data-target="#verPaqueteModal" v-on:click.prevent="verPaquete({{$item}})"> <i class="fas fa-eye text-success"></i> &nbsp;</span> {{$item->ware_reciept}}</td>
                                <td>
                                    <input id="{{$item->id_orden}}" type="number" class="form-control" style="width: 40%" placeholder="USD">
                                    <button style="margin-top:-3px;" v-on:click.prevent="sendPaquete({{$item}},<?php echo $item->id_orden; ?>, '<?php echo $item->ware_reciept; ?>','<?php echo $item->code_cliente; ?>')" class="btn btn-success">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <form id="myForm" action="#" v-on:submit.prevent="createEnvioItem()" method="post">
            @csrf
            <div class="card" data-step="4" data-intro="Listado de paquetes procesados, es posible cambiar nuevamente el valor declarado en esta lista">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="font-size: 13px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Paquetes Procesados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in paquetes">
                                    <td> <b v-text="item.ware_reciept"></b> <b>-Val:</b>
                                        <input style="width: 70px;" class="form-control input-sm" v-model="item.costo" type="number"> <a v-on:click.prevent="returnPaquete(item)" class="btn btn-danger btn-sm"><i style="color:#fff;" class="fa fa-times" aria-hidden="true"></i></a></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h4>Información adicional</h4> @if(Auth::user()->cliente_envio == 1)
            <input type="hidden" id="id_cli" name="id_cliente" value="{{Auth::user()->id_cliente}}">
            <input type="hidden" v-model="formItems.tipo_envio" value="0">
            <div class="form-group" class="form-group" data-step="6" data-intro="Aquí se mostrara el listado de sus direcciones, deberá seleccionar a la que desea enviar los paquetes">
                <label class="control-label">Dirección de envio</label>
                <select v-on:change="getZip()" class="form-control" name="" id="seldir" required>
                    <option value="" selected disabled="">Seleccione...</option>
                    @if(count($direcciones) > 0)
                            <option v-for="item in itemsd"  v-bind:value="item.id_direccion_cliente">@{{item.direccion+', '+item.paises.pais+', '+item.ciudades.ciudad}} </option>
                            @else
                            <option value="{{$direccion1}}">{{$direccion1}}</option>
                    @endif
                  

                </select>

            </div>
            <button type="button" class="btn btn-success btn-sm float-right mt-0 " data-toggle="modal" data-target="#modalDireccion">
                Agregar dirección
            </button>
            <br>
            <br>

            <div style="background:#FFCC00; border-radius: 5px; padding:15px;">
                <img class="mx-auto d-block" src="{{asset('images/envio.png')}}" style="max-width:200px;" alt="">
                <h4 style="color:#fff; margin-top:10px" class="text-center">Costo envio</h4>
                <input type="hidden" v-model="precioDHLUsd">
                <div v-if="precios">
                    <b style="color:#fff">Handling y Seguro: </b><span style="color:#fff; margin-top:10px" v-text="seguro"> </span> <span style="color:#fff;"> USD</span>
                    <br>
                    <b style="color:#fff">Cargo libras: </b><span style="color:#fff; margin-top:10px" v-text="libras"> </span> <span style="color:#fff;"> USD</span>
                    <br>
                    <b style="color:#fff">Arancel: </b><span style="color:#fff; margin-top:10px" v-text="arancel"> USD</span> <span style="color:#fff;"> USD</span>
                    <br>
                    <b style="color:#fff">Iva: </b><span style="color:#fff; margin-top:10px" v-text="iva"> USD</span> <span style="color:#fff;"> USD</span>
                    <br>
                    <hr style="color: #fff;">
                    <b style="color:#fff">Total a pagar: </b><span style="color:#fff; margin-top:10px" v-text="precioDHL"> USD</span>

                </div>
                <center>
                    <div v-if="dhlerror" style="color: #fff;">Ocurrio un error</div>
                    <img v-if="preload" width="50px;" src="https://www.voki.com/images/ajax-loader.gif" alt="">
                </center>
            </div>
            <br> @else
            <div class="form-group" data-step="5" data-intro="Debe seleccionar el tipo de envio que desea.">
                <label class="control-label">Tipo de envio</label>
                <select class="form-control" v-model="formItems.tipo_envio" name="" id="" required>
                    <option value="" selected disabled="">Seleccione...</option>
                    <option value="Envio_courier_A">Envio Courier A</option>
                    <option value="Envio_commercial_B">Envio comercial B</option>
                </select>
                <input type="hidden" id="id_cli" name="id_cliente" value="{{Auth::user()->id_cliente}}">
            </div>
            <div class="form-group" class="form-group" data-step="6" data-intro="Aquí se mostrara el listado de sus direcciones, deberá seleccionar a la que desea enviar los paquetes">
                <label class="control-label">Dirección de envio</label>
                <select class="form-control" v-model="formItems.direccion" name="" id="" required>
                    <option value="" selected disabled="">Seleccione...</option>

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

            @endif

            <div class="form-group">
                <label class="control-label">Comentarios</label>
                <textarea class="form-control" v-model="formItems.comentario" rows="4" cols="50"></textarea>
            </div>
            <button class="btn btn-success float-right btn-block text-white" id="submit-all" :disabled="bloqbtn == true" v-on:click.prevent="getVueItemsServicio()" class="form-group" data-step="7" data-intro="Finalice el proceso dando clic en este boton">Programar Envío</button>
    </div>
</div>
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div style="margin-bottom: 0px;" class="ribbon-wrapper card">
                <div class="ribbon ribbon-danger">Alerta</div>
                <br>
                <p>Si te aparecio el aviso que superaste el valor declarado de $200 dolares, es porque la suma total<span v-if="vermas == false"> ... 
                               <br>
                               <a href="#" class="btn btn-success" v-on:click.prevent="fvermas()">Ver más</a>
                              </span> <span v-if="vermas"> del valor declarado de cada uno de tus paquetes supero dicho monto.
                              Los envios que superan el valor declarado de $200 usd tiene costos de impuestos y aranceles estabecidos por la ley. Debes escoger alguna de esta dos opciones <br>
                              • Enviar hoy: quiere decir que aceptas los impuestos establecidos, y en un mismo dia podemos enviarte hasta $2.000 usd en valor declarado de tus paquetes 
                              No olvides que para que tus paquetes se envien el mismo dia debes enviar las instrucciones hasta las 11:00 am horario de Miami, si lo haces despues, tu envio se realizara el siguiente dia habil.<br>
                              • Enviar otro dia: el sistema te permite enviar tus paquetes hasta que el valor declarado sume $200 usd, los demas paquetes seran enviados el siguiente dia habil. 
                              No olvides declarar tus paquetes tal cual como los compraste para que no tengas ningun tipo de contratiempo con ADUANAS NACIONALES.</span>
                </p>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">

                                <h4>¿Cuando desea enviar?</h4>
                                <select class="form-control" v-model="formItems.fecha" name="fecha" id="">
                                    <option value="" selected disabled="">Seleccione...</option>
                                    <option value="0">Enviar Hoy</option>
                                    <option value="1">Enviar otro dia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Valores:</h4> Valor actual: <span v-text="totalPaquete"></span>
                            <br> Total declarado: <span v-text="vartotal"></span>
                        </div>
                    </div>

                </form>
                <div class="col-md-4 align-self-end">
                    <br>
                    <center>
                        <button type="button" class="btn btn-success align-self-center" data-dismiss="modal" v-on:click.prevent="vermas = false">Aceptar</button>
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endif

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="verPaqueteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="ribbon-wrapper card">
            <div class="ribbon ribbon-success">Información completa</div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <b class="float-right">Código de orden:</b>
                </div>
                <div class="col-md-7">
                    <span v-text="verpaquete.ware_reciept"></span>
                </div>
                <div class="col-md-5">
                    <b class="float-right">Tracking:</b>
                </div>
                <div class="col-md-7">
                    <span v-if="verpaquete.tracking == ''">
                                            Sin tracking
                                        </span>
                    <span v-else>
                                             <span v-text="verpaquete.tracking"></span>
                    </span>
                </div>
                <div class="col-md-5">
                    <b class="float-right">Peso:</b>
                </div>
                <div class="col-md-7">
                    <span v-text="verpaquete.peso"></span>
                </div>
                <div class="col-md-5">
                    <b class="float-right">Estatus:</b>
                </div>
                <div class="col-md-7">
                    <span v-if="verpaquete.status == 0">
                                            En bodega
                                        </span>
                    <span v-else>
                                             <span v-text="verpaquete.status"></span>
                    </span>
                </div>
                <div class="col-md-5">
                    <b class="float-right">Descripción:</b>
                </div>
                <div class="col-md-7">
                    <span v-text="verpaquete.descripcion"></span>
                </div>
            </div>
            <div class="col-md-4 align-self-end">
                <br>
                <center>
                    <button type="button" class="btn btn-danger align-self-center" data-dismiss="modal">Cerrar</button>
                </center>

            </div>

        </div>
    </div>
</div>
<div id="modal-servicios" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Servicio Adicional</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div v-if="paso1">

                    <div class="row">
                        <h2 style="padding:15px;">Agrega servicios adicionales a tus paquetes</h2>
                        <div v-for="item in itemsServ" class="col-md-6">
                            <div v-on:click.prevent="verServicio(item)" class="card card-inverse card-success">
                                <div class="card-body">
                                    <div class="">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h3 class="card-title" v-text="item.nombre"></h3>
                                                    <h6 class="card-subtitle"><b>Precio:</b> <span v-text="item.precio"></span>$</h6>
                                                </div>
                                                <div style="font-size:30px;" class="col-md-5 text-white">
                                                    <img style="max-width: 120px;" :src="'icons/'+item.icono" alt="">
                                                </div>
                                                <i v-bind:class=""></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="paso2">
                <div style="padding:15px;">
                    <h2 v-text="tituloServ"></h2>
                    <h5 v-text="descServ"></h5>
                </div>

                <div class="table-responsive">
                    <h5>Agregue el servicio a los paquetes</h5>
                    <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th><i class="fa fa-check-square" aria-hidden="true"></i></th>
                                <th>Código</th>
                                <th>Tracking</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in paquetes">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-on:change.prevent="listaids(idServ,item.ware_reciept,precioServ)" value="" v-bind:id="check+item.ware_reciept">
                                        <label class="form-check-label" v-bind:for="check+item.ware_reciept">
                                        </label>
                                    </div>
                                </td>
                                <td v-text="item.ware_reciept"></td>
                                <td v-text="item.tracking"></td>
                                <td v-text="item.descripcion"></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-success text-white" v-on:click.prevent="volverPaso1()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Volver</a>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
                <a v-on:click.prevent()="createEnvioItem()" class="btn btn-success waves-effect waves-light text-white">Confirmar envio de paquetes</a>
            </div>
        </div>
    </div>
</div>
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
                            <select v-model="pais" v-on:change="getCiudad()" class="form-control" name="pais" id="">
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
                            <select v-model="create_direccion.ciudad" class="form-control" name="ciudad" id="">
                                <option value="" disabled selected>Seleccione una Ciudad</option>
                                <option v-for="ciudad in ciudades" v-bind:value="ciudad.id_ciudad">@{{ ciudad.ciudad }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion"><b>Dirección</b></label>
                            <input type="text" v-model="create_direccion.direccion" class="form-control" placeholder="Ingrese la dirección" name="direccion" required>
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
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    
</script>
<script>    
    $(document).ready(function() {
    $('#data-table').DataTable({
        "order": [[ 2, "desc" ]],
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
<script src="{{asset('js/intro.js')}}"></script>
@if(isset($visita->prealerta))
    @if($visita->prealerta == 0)
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
    @endif
</script>
<script type="text/javascript">
  $('#myForm').on('submit', function(e) {
    var firstName = $('#firstname');
    // Check if there is an entered value
    if(!firstName.val()) {
      // Add errors highlight
      firstName.closest('.form-group').removeClass('has-success').addClass('has-error');
      // Stop submission of the form
      e.preventDefault();
    } else {
      // Remove the errors highlight
      firstName.closest('.form-group').removeClass('has-error').addClass('has-success');
    }
  });
  var page = new Vue({
  	el: '#main-wrapper',
  	data: {
        dhlerror: false,
        bloqbtn : false,
        vartotal: 0,
        vermas : false,
        paso1: true,
        paso2: false,
        preload: false,
        preloader: false,
        precios: false,
        errordhl: '',
        totpaq: '',
        tituloServ: '',
        descServ:'',
        idServ: '',
        precioServ: '',
        precioDHL: '',
        precioDHLUsd: '',
        precioDHLCop: '',
        seguro: '',
        libras: '',
        arancel: '',
        iva: '',
        zip: '',
  		items: [],
        itemsServ: [],
  		paquetes: [],
        verpaquete: [],
        idselected: [],
        itemsd: [],
        ciudades: [],
        paises: [],
        pais: '',
  		formItems: {
  			paquetes: [],
  			peso: 0,
  			total: 0,
  			tipo_envio: '',
  			comentario: '',
            direccion: '',
            fecha: 0,
            dhl: 0,
            usd: 0,
            cop: 0,
            idselected: [],
  		},
          create_direccion : {
                     direccion : null,
                     id_cliente : null,
                     pais: '',
                     ciudad:'',
                },
  	},
     mounted() {
           console.log('init');
            this.getVueItemsDireccion();
        },
    computed: {
        totalPaquete(){
            var valor = 0;
            for (var i = 0; i < this.paquetes.length; i++) {
                valor = valor + parseInt(this.paquetes[i].costo);
            }
            this.verificarMonto();
            this.totpaq = valor;
            if(this.zip != ''){
                this.getDhl();
            }
            return this.formItems.total = valor;
        },
        pesoPaquete(){
            var peso = 0;
            var valor = 0;
            for (var i = 0; i < this.paquetes.length; i++) {
                peso = peso + parseInt(this.paquetes[i].peso);
                valor = valor + parseInt(this.paquetes[i].costo);
            }
            this.verificarMonto();
            return this.formItems.peso = peso;
        }
    },
  	methods: {
  		newPaquete(data){
  			this.items = data;
  		},
        verPaquete(data){
            this.verpaquete = data;
        },
        getVueItemsDireccion: function () {
            axios.get('/api/get/'+$('#id_cli').val()+'/direcciones').then((response) => {
                this.itemsd = response.data;
                console.log(this.itemsd);
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
                 this.getVueItemsDireccion();
            },
        getCiudad: function () {
            axios.get('/api/get/'+this.pais +'/ciudades').then((response) => {
                this.ciudades = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        listaids(id,data,precio){
                if(!this.idselected.includes(id+';'+data+';'+precio)){
                this.idselected.push(id+';'+data+';'+precio);
                console.log(this.idselected);
                }else{
                var indicedata =  this.idselected.indexOf(id+';'+data+';'+precio); 
                this.idselected.splice(indicedata, 1);
                console.log(this.idselected);
                }
            },
        verServicio: function(item){
                this.paso1 = false;
                this.paso2 = true;
                this.tituloServ = item.nombre;
                this.idServ = item.id;     
                this.precioServ = item.precio;    
                this.descServ = item.descripcion;
        },
        volverPaso1: function(){
            this.paso2 = false;
            this.paso1 = true;
        },
  		sendPaquete(data, id, fila, code){
  			var valor = document.getElementById(id).value;
              if(valor > 0){
                $('#'+fila).hide();
                data.costo = valor;
                this.paquetes.push(data);
                this.formItems.paquetes.push({id:fila, costo: valor, code: code});
                console.log(this.formItems.paquetes);
                this.calcPeso();
                toastr["success"]("Orden agregada con exito.");
              }else{
                toastr["warning"]("Ingrese un valor valido.");
              }
  		},
          returnPaquete(data){
            var i =  this.paquetes.indexOf(data);
            if (i !== -1) {
                    document.getElementById(data.id_orden).value = 'USD';
                    data.costo = 0;
                    $('#'+data.ware_reciept).show();
                    console.log("wareeee",data.ware_reciept);
                    this.paquetes.splice(i,1);
                    this.calcPeso();
                    toastr["warning"]("Paquete removido con exito.");
                }
  		},
        verificarMonto(){
            this.vartotal = parseInt(vtotal=(document.getElementById('vtotal').value));
            if( this.formItems.total > 0){
                if(parseInt(this.formItems.total + this.vartotal) >= 200){
                $('#modalConfirm').modal('show');
                } 
            }
           
        },
        noMostrar(){
            axios.get('/api/visitap/{{Auth::user()->code_cliente}}').then((response) =>  {
                 introJs().exit();
            });
        },
  		calcPeso(){
  			var peso = 0;
  			var valor = 0;
  			for (var i = 0; i < this.paquetes.length; i++) {
  				peso = peso + parseInt(this.paquetes[i].peso);
  				valor = valor + parseInt(this.paquetes[i].costo);
  			}
  			this.formItems.peso = peso;
  			this.formItems.total = valor;
            this.verificarMonto();
  			console.log(peso);
  		},
        fvermas(){
            this.vermas = true;
        },
  		createEnvioItem() {
            let me = this;
            this.preloader = true;
            var input = {
                paquetes: this.formItems.paquetes,
                valor: this.formItems.valor,
                tipo_envio: this.formItems.tipo_envio,
                comentario :this.formItems.comentario,
                descripcion: this.formItems.descripcion, 
                direccion: this.formItems.direccion,
                fecha: this.formItems.fecha,
                idselected: this.idselected,
                usd: this.precioDHLUsd,
                cop: this.precioDHLCop,
                dhl: this.formItems.dhl,
            };
            if(this.paquetes.length){
                axios.post('/api/orden', input).then((response) =>  {
                this.create_direccion = {
                  	paquetes: [],
		  			peso: '',
		  			total: '',
		  			tipo_envio: '',
		  			comentario: '',
                    direccion: '',
                    usd: '',
                    cop: '',
                    dhl: 0,
                    fecha: 0,
                    idselected: [],
                };
                if(this.precioDHL == ''){
                    toastr["success"]("Paquetes programados exitosamente.");
                setTimeout(function(){ 
                    window.location.href='/ordenes';
                 }, 800);
                }else{
                    window.location.href='/facturaciondhl';
                }
                
            });
            }else{
                toastr["warning"]("Debe agregar al menos 1 paquete a la lista.");
            }
        },
        getVueItemsServicio: function () {
            if(this.paquetes.length){
                 axios.get('/api/get/servicio').then((response) => {
                    this.itemsServ = response.data;
                    
                    console.log(this.itemsServ);
                }).catch((error) => {
                    console.log(error);
                });
                $('#modal-servicios').modal('show');
            }else{
                toastr["warning"]("Debe agregar al menos 1 paquete a la lista y completar la información de envio.");
            }
        },
        getDhl: function (){
            var ids = '';
            for (var i = 0; i < this.paquetes.length; i++) {
                  ids += (this.paquetes[i].ware_reciept)+',';
            }
            this.formItems.dhl = 1;
            axios.get('api/get/dhl/'+this.zip+'/'+ids+'/'+this.totpaq).then((response) => {
                this.preload = false;
                this.precios = true;
                this.precioDHL = response.data['precio']+ ' USD';
                this.seguro = response.data['seguro'].toFixed(2);
                this.libras = response.data['libras'].toFixed(2);
                this.arancel = response.data['arancel'].toFixed(2);
                this.iva = response.data['iva'].toFixed(2);
                this.precioDHLUsd = response.data['precio'].toFixed(2); 
                this.bloqbtn = false;
                console.log(response.data);
                }).catch((error) => {
                    console.log(error);
                    this.errordhl = "Ocurrio un error";
                    this.preload = false;
                    this.bloqbtn = true;
                    this.dhlerror = true;
                }); 
        },
        getZip: function(){
            if(this.paquetes.length){
                   result = document.getElementById('seldir').value;
            this.preload = true;
            this.bloqbtn = true;
            var esid = isNaN(result);
            if(esid == true){
                axios.get('/api/get/'+result+'/'+$('#id_cli').val()+'/direccion').then((response) => {
                this.zip = response.data;
                console.log(this.zip);
                this.getDhl();
                this.getDhlCop();
                }).catch((error) => {
                    console.log(error);
                }); 
            }else{
                axios.get('/api/get/'+result+'/'+$('#id_cli').val()+'/direccion').then((response) => {
                this.formItems.direccion = (response.data.direccion)+', '+(response.data.ciudades.ciudad)+', '+(response.data.paises.pais);
                this.zip = response.data.ciudades.zip;
                
                console.log(this.zip);
                this.getDhl();
                this.getDhlCop();
                }).catch((error) => {
                    console.log(error);
                }); 
            }   
            }else{
                toastr["warning"]("Debe agregar al menos 1 paquete a la lista para calcular el costo de envio.");
                this.bloqbtn = false;
                $('#seldir option').prop('selected', function() {
                return this.defaultSelected;
            });
            }
            
        },
      }
  })
</script>
@endsection
