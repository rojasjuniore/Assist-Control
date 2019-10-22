<?php
    class Coordinadora {
        public $loginInfo;
        public $apikey;
        public $clave;
        public $url = "http://sandbox.coordinadora.com/ags/1.5/server.php?wsdl";
        public $p;
        public $values;

        // Métodos get para obtener los valores de las variables
        public function loginInfo_get(){
            return $this->loginInfo;
        }

        public function apiKey_get() {
            return $this->apikey;
        }

        public function clave_get() {
            return $this->clave;
        }

        public function getData(){
            return $this->values;
        }


        // Métodos set para darle valor a las variables
        public function find_set($_remision, $_nit, $_div, $_referencia, $_imagen, $_anexo){
            $p=new stdClass();
            $p->codigo_remision= $_remision;
            $p->nit= $_nit;
            $p->div= $_div;
            $p->referencia= $_referencia;
            $p->imagen= $_imagen;
            $p->anexo=$_anexo;
            $p->apikey=$this->apikey;
            $p->clave=$this->clave;
            $p->LoginInfo = $this->loginInfo;
            $this->p = $p;
        }

        public function apiKey_set($_apikey){
            $this->apikey = $_apikey;
        }

        public function clave_set($_clave){
            $this->clave = $_clave;
        }

        public function loginInfo_set($_userName, $_passWord){
            $this->loginInfo = ['userName'=> $_userName, 'passWord' => $_passWord];
        }

        public function setData($_data){
            $this->values = $_data;
        }

        // Método para obtener los datos solicitados segun los parametros enviados
        // Una funcion de callback solo para tener un nombre bonito
        public function find($_remision, $_nit, $_div, $_referencia, $_imagen, $_anexo){
            $this->find_set($_remision, $_nit, $_div, $_referencia, $_imagen, $_anexo);
        }

        // Ejecuta la funcion principal con el servidor y captura la respuesta segun sea el resultado
        public function execute(){
            try {        
                $options = array( 
                    'soap_version'=>SOAP_1_1, 
                    'exceptions'=>true, 
                    'trace'=>1, 
                    'cache_wsdl'=>WSDL_CACHE_NONE 
                );
                $client = new \SoapClient($this->url,$options);
                $response = $client->Seguimiento_detallado(['p' => $this->p]);
                return ($this->setData($response));
            } catch (Exception $e) { 
                return $this->setData($e->getMessage()); 
            }
        }
        
    }


    $coord = new Coordinadora;
    $coord->apiKey_set('f0be993a-eebc-11e8-8eb2-f2801f1b9fd1');
    $coord->clave_set('1q7!7?|0Tk225Zb');
    $coord->loginInfo_set('eflogistic.ws', 'cfb84c9cc651a9d8f9aeb07a54ded051f0760a842ee6a03690420be4203f1f4d');
    // Variable que capturará todos los resultados
    $result = array();
    $errors = array();
    // Variable que obtiene los valores enviados
    $guias = $orden->ultima_milla;

 
        $coord->find($guias,'','','','','');
        $coord->execute();
        if (isset($coord->getData()->Seguimiento_detalladoResult)) {
            $result[] = $coord->getData()->Seguimiento_detalladoResult;
        }else{
            $errors[] = $coord->getData();
        }

        function sumasdiasemana($fecha,$dias)
         {
            $datestart= strtotime($fecha);
            $datesuma = 15 * 86400;
            $diasemana = date('N',$datestart);
            $totaldias = $diasemana+$dias;
            $findesemana = intval( $totaldias/5) *2 ; 
            $diasabado = $totaldias % 5 ; 
            if ($diasabado==6) $findesemana++;
            if ($diasabado==0) $findesemana=$findesemana-2;
         
            $total = (($dias+$findesemana) * 86400)+$datestart ; 
            return $fechafinal = date('d-m-Y', $total);
         }

         function fechaCastellano ($fecha) {
         $fecha = substr($fecha, 0, 10);
         $numeroDia = date('d', strtotime($fecha));
         $dia = date('l', strtotime($fecha));
         $mes = date('F', strtotime($fecha));
         $anio = date('Y', strtotime($fecha));
         $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
         $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
         $nombredia = str_replace($dias_EN, $dias_ES, $dia);
         $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
         $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
         return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
         }
         function fechaCastellano1 ($fecha) {
         $fecha = substr($fecha, 0, 10);
         $numeroDia = date('d', strtotime($fecha));
         $dia = date('l', strtotime($fecha));
         $mes = date('F', strtotime($fecha));
         $anio = date('Y', strtotime($fecha));
         $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
         $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
         $nombredia = str_replace($dias_EN, $dias_ES, $dia);
         $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
         $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
         return $nombredia;
         }
         $resp = '';
         function retraso($status,$historial){
            $resp = '';
            foreach($historial as $item){
                if($item->estatus == $status){
                  $fechaestatus = sumasdiasemana(date("Y-d-m", strtotime($item->fecha_orden)),2);
                  $fechaactual = date("Y-m-d");
                  if($fechaactual > $fechaestatus){
                     if($status == 13 ){
                     $resp = "No te preocupes, estamos teniendo un inconveniente con tu paquete en aduana , fecha de llegada: ";
                     }else{
                        $resp = "No te preocupes, estamos teniendo un inconveniente con tu paquete en la aerolinea , fecha de llegada: "; 
                     }
                  }
                  break;
                }
               
            }
            return $resp;

         }
 $errorenguia = false;

?>

 @if(Auth::user()->cliente_envio == 1)
 @if(strlen($orden->ware_reciept) == '10')
 <?php
$data = '<?xml version="1.0" encoding="UTF-8"?>
<req:KnownTrackingRequest xmlns:req="http://www.dhl.com" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:schemaLocation="http://www.dhl.com
TrackingRequestKnown.xsd">
<Request>
<ServiceHeader>
<MessageTime>2002-06-25T11:28:56-08:00</MessageTime>
<MessageReference>1234567890123456789012345678</MessageReference>
            <SiteID>v62_feJ93XJ4mD</SiteID>
            <Password>PDtnrS6xyG</Password>
</ServiceHeader>
</Request>
<LanguageCode>es</LanguageCode>
<AWBNumber>'.$orden->ware_reciept.'</AWBNumber>
<LevelOfDetails>ALL_CHECK_POINTS</LevelOfDetails>
<PiecesEnabled>S</PiecesEnabled> 
</req:KnownTrackingRequest>';

$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, "https://xmlpi-ea.dhl.com/XMLShippingServlet");
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));

$tuData = curl_exec($tuCurl);
curl_close($tuCurl);
$simple = $tuData;
$xml = simplexml_load_string($tuData);
json_encode($xml);
?>
 @else
  <?php  $errorenguia = true; ?>
 @endif

@endif
@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
@push('before-scripts')
<script src="{{ mix('/js/home-one.js') }}"></script>
@endpush
@section('css')
<link href="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
<link href="{{asset('progress/styles/progress-tracker.css')}}" rel="stylesheet">
@endsection
@section('content')
<style>
   .events li a{
   top: -35px;
   }
   .progress-step.is-complete::after {
   z-index: 5px;
   background-color: #3C9C94;
   }
   .fa-check{
      font-size:12px;
      margin-top:3px;
   }
   .progress-step.is-complete .progress-marker {
    background-color: #3C9C94;
   }  
</style>
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="container">
              @if($errorenguia == true)
              <div class="alert alert-danger"> <i class="ti-warning"></i> Lo sentimos numero de guía invalido para rastreo DHL</div>
              @endif
              @if(Auth::user()->cliente_envio == 1 && $errorenguia == false)
              <h3>Historial de paquete DHL</h3>
              <table class="table">
                <thead style="background:#2f3d4a; color: #fff;">
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($xml->AWBInfo->ShipmentInfo->ShipmentEvent as $value)
                   <tr>
                    <th scope="row">{{$value->Date}}</th>
                    <td>{{$value->Time}}</td>
                    <td>{{$value->ServiceEvent->Description}} {{$value->Signatory}}</td>
                  </tr>
                  @endforeach
                 
               
                </tbody>
              </table>
              <br>
              @else
               @foreach($historial as $item)
                  <?php
                  $primerestatus = date("Y-m-d", strtotime($item->fecha_orden));
                     ?>
                  @break
               @endforeach
               @if($historial)
               <?php
               $sumarDias=4;
               $entre1 = sumasdiasemana($primerestatus,$sumarDias);
               $estimado= fechaCastellano1($entre1);
               ?>
               <h2 style="color:#3C9C94;">Llegando el {{$estimado}}</h1>
               @endif
               @if($orden->estatus_manifiesto == 11 || $orden->estatus_manifiesto == 13 )
                  @if(retraso($orden->estatus_manifiesto,$historial))
                  <?php $fechaextendida = sumasdiasemana($primerestatus,2); ?>
                     <div class="alert alert-success">  <?php echo retraso($orden->estatus_manifiesto,$historial).fechaCastellano($fechaextendida); ?>  
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                     </div>
                  @endif
               @endif
               <ul id="lineadetiempo" class="progress-tracker progress-tracker--text progress-tracker--center">
                  @if(count($historial) != 0) 
                     @foreach($historial as $item)
                        @if($item->estatus == 11)
                              <li class="progress-step is-complete ">
                                 <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                 <span class="progress-text">
                                    <h4 class="progress-title">
                                       Entregado a la aerolinea
                                    </h4>
                                    {{$item->fecha}}                               
                                 </span>
                              </li>
                              @break
                           @else
                           <?php $key = array_search(11, array_column($historial, 'estatus')); ?>
                           @if($key  == '' )
                           @if($orden->estatus_manifiesto >= 11)
                              <li class="progress-step is-complete ">
                                    <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                          Entregado a la aerolinea
                                       </h4>
                                       Completado                                
                                    </span>
                                 </li>
                              @else
                              <li class="progress-step">
                                    <span class="progress-marker"></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                          Entregado a la aerolinea
                                       </h4>
                                       Pendiente                               
                                    </span>
                                 </li>
                              @endif
                              @break
                           @endif
                        @endif
                     @endforeach
                     @foreach($historial as $item)
                        @if($item->estatus == 12)
                           <li class="progress-step is-complete ">
                              <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                              <span class="progress-text">
                                 <h4 class="progress-title">
                                       Pais destino
                                 </h4>
                                 {{$item->fecha}}                               
                              </span>
                           </li>
                           @break
                        @else
                        <?php $key = array_search(12, array_column($historial, 'estatus')); ?>
                           @if($key == '')
                           @if($orden->estatus_manifiesto >= 12)
                              <li class="progress-step is-complete ">
                                    <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                             Pais destino
                                       </h4>
                                       Completado                              
                                    </span>
                              </li>
                           @else
                              <li class="progress-step">
                                    <span class="progress-marker"></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                             Pais destino
                                       </h4>
                                       Pendiente                             
                                    </span>
                               </li>
                           @endif
                       
                           @break
                           @endif
                        @endif
                     @endforeach 
                     @foreach($historial as $item)
                        @if($item->estatus == 13)
                           <li class="progress-step is-complete ">
                              <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                              <span class="progress-text">
                                 <h4 class="progress-title">
                                       Proceso de Aduanas
                                 </h4>
                                 {{$item->fecha}}                                  
                              </span>
                           </li>
                           @break
                        @else
                        <?php $key = array_search(13, array_column($historial, 'estatus')); ?>
                           @if($key == '' )
                              @if($orden->estatus_manifiesto >= 13)
                                 <li class="progress-step is-complete ">
                                    <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                             Proceso de Aduanas
                                       </h4>
                                       Completado                              
                                    </span>
                                 </li>
                              @else
                              <li class="progress-step">
                                    <span class="progress-marker"></span>
                                    <span class="progress-text">
                                       <h4 class="progress-title">
                                             Proceso de Aduanas
                                       </h4>
                                       Pendiente                             
                                    </span>
                                 </li>
                           @endif
                      
                              @break
                           @endif
                        @endif
                     @endforeach
                     @foreach($historial as $item)
                        @if($item->estatus == 14)
                              <li class="progress-step is-complete ">
                                 <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                 <span class="progress-text">
                                    <h4 class="progress-title">
                                       Liberacion de Aduanas
                                    </h4>
                                    {{$item->fecha}}                                 
                                 </span>
                              </li>
                              @break
                           @else
                           <?php $key = array_search(14, array_column($historial, 'estatus')); ?>
                              @if($key == '' )
                                 @if($orden->estatus_manifiesto >= 14)
                                 <li class="progress-step is-complete ">
                                       <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                       <span class="progress-text">
                                          <h4 class="progress-title">
                                             Liberacion de Aduanas
                                          </h4>
                                          Completado                              
                                       </span>
                                    </li>
                                 @else
                                 <li class="progress-step">
                                       <span class="progress-marker"></span>
                                       <span class="progress-text">
                                          <h4 class="progress-title">
                                             Liberacion de Aduanas
                                          </h4>
                                          Pendiente                             
                                       </span>
                                    </li>
                                 @endif
                             
                                 @break
                              @endif
                           @endif
                     @endforeach
                     @foreach($historial as $item)
                        @if($item->estatus == 15)
                              <li class="progress-step is-complete ">
                                 <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                 <span class="progress-text">
                                    <h4 class="progress-title">
                                       Procesando para entrega local
                                    </h4>
                                    {{$item->fecha}}                                
                                 </span>
                              </li>
                              @break
                           @else
                           <?php $key = array_search(15, array_column($historial, 'estatus')); ?>
                              @if($key == '' )
                                    @if($orden->estatus_manifiesto >= 15)
                                    <li class="progress-step is-complete ">
                                          <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                                          <span class="progress-text">
                                             <h4 class="progress-title">
                                                Procesando para entrega local
                                             </h4>
                                             Completado                                
                                          </span>
                                       </li>
                                    @else
                                    <li class="progress-step">
                                          <span class="progress-marker"></span>
                                          <span class="progress-text">
                                             <h4 class="progress-title">
                                                Procesando para entrega local
                                             </h4>
                                             Pendiente                                
                                          </span>
                                       </li>
                                    @endif
                                 @break
                              @endif
                           @endif
                     @endforeach
                  @elseif(count($historial) == 0 && $orden->status == 16 )
                  <li class="progress-step  is-complete">
                     <span class="progress-marker is"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Entregado a la aerolinea</h4>
                        Completado
                     </span>
                  </li>
                  <li class="progress-step  is-complete">
                     <span class="progress-marker is"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Pais destino</h4>
                        Completado
                     </span>
                  </li>
                  <li class="progress-step  is-complete">
                     <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Proceso de Aduanas</h4>
                        Completado
                     </span>
                  </li>
                  <li class="progress-step  is-complete">
                     <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Liberacion de Aduanas</h4>
                        Completado
                     </span>
                  </li>
                  <li class="progress-step  is-complete">
                     <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Procesando para entrega local</h4>
                        Completado
                     </span>
                  </li>
                  @else
                  <center>
                     <h1 style="color:#ddd;"> No hay Historial disponible</h1>
                  </center>
                  @endif
                  @if($orden->ultima_milla)
                  <li class="progress-step  is-complete">
                     <span class="progress-marker"><i class="fa fa-check" aria-hidden="true"></i></span>
                     <span class="progress-text">
                        <h4 class="progress-title">Entregado transportadora local</h4>
                        Completado
                     </span>
                  </li>
                  @endif
               </ul>
              @endif
            
              

               
               <div class="row">
                     <div class="col-md-6"> 
                           <div class="card card-outline-inverse">
                                 <div class="card-header">
                                     <h4 class="m-b-0 text-white">Información del paquete</h4></div>
                                 <div class="card-body">
                                       <ul style="color:#000;" class="list-group">
                                               <li class="list-group-item">
                                                  <i><b>Código de orden:</b></i>
                                                  <br>
                                                  {{$orden->ware_reciept}}
                                               </li>
                                               @if($historial)
                                               <li class="list-group-item">
                                                <i><b>Fechas estimada de llegada</b></i> <br>
                                                @foreach($historial as $item)
                                                   <?php
                                                   $primerestatus = date("Y-d-m", strtotime($item->fecha));
                                                      ?>
                                                   @break
                                                @endforeach
                                                <?php
                                                   $sumarDias=4;
                                                   $entre1 = sumasdiasemana($primerestatus,$sumarDias);
                                                   $estimado= fechaCastellano($entre1);
                                                   echo '<b style="font-weight: 500;color: #2ca484;">'.$estimado.'</b>';
                                                ?>
                                                </li>
                                               @endif
                                               <li class="list-group-item">
                                                  <i><b>Fecha ingreso</b></i>
                                                  <br>
                                                  {{$orden->fecha}}
                                               </li>
                                                 
                                               
                                               <li class="list-group-item">
                                                  <i><b>Tracking</b></i>
                                                  <br>
                                                  {{$orden->tracking}}
                                               </li>
                                               <li class="list-group-item">
                                                  <i><b>Peso</b></i>
                                                  <br>
                                                  {{$orden->peso}}
                                               </li>
                                               <li class="list-group-item">
                                                  <i><b>Descripción</b></i>
                                                  <br>
                                                  {{$orden->descripcion}}
                                               </li>
                                            </ul>
                                   </div>
                        </div>
                      </div>
                      @if(Auth::user()->cliente_envio == 1 && $errorenguia == false)
                      <div class="col-md-6"> 
                           <div class="card card-outline-inverse">
                                 <div class="card-header">
                                     <h4 class="m-b-0 text-white">Información de Envio DHL</h4></div>
                                 <div class="card-body">
                                       <ul style="color:#000;" class="list-group">
                                               <li class="list-group-item">
                                                  <i><b>Area de Origen:</b></i>
                                                  <br>
                                                  {{$xml->AWBInfo->ShipmentInfo->OriginServiceArea->Description}}
                                               </li>
                                               <li class="list-group-item">
                                                <i><b>Area destino</b></i> <br>
                                                  {{$xml->AWBInfo->ShipmentInfo->DestinationServiceArea->Description}}
                                                </li>
                                               <li class="list-group-item">
                                                  <i><b>Fecha de envio</b></i>
                                                  <br>
                                                  {{$xml->AWBInfo->ShipmentInfo->ShipmentDate}}
                                               </li>
                                            </ul>
                                   </div>
                        </div>
                      </div>
                      @endif
                      @if($orden->ultima_milla)
                  <div class="col-md-6"> 
                     <div class="card card-outline-inverse">
                           <div class="card-header">
                               <h4 class="m-b-0 text-white">Detalles de entrega local</h4></div>
                           <div class="card-body">
                        @if(strlen($orden->ultima_milla) == '11')
                        @if(isset($result))
                           @for ($i=0; $i < count($result); $i++) 
                                 <ul style="color:#000;" class="list-group">
                                    
                                       @for ($j=0; $j < count($result[$i]->estados->item); $j++) 
                                 
                                       <li class="list-group-item">
                                          <i><?php echo $result[$i]->estados->item[$j]->fecha_texto ?> a las <?php echo $result[$i]->estados->item[$j]->hora_ap ?></i>
                                          <br>
                                          <?php echo $result[$i]->estados->item[$j]->descripcion ?>
                                       </li>
                                    @endfor
                              </ul>
                           @endfor
                        @else
                        <h3>  No se encontró ningun resultado </h3>
                        @endif
         
                           @elseif(strlen($orden->ultima_milla) == '9')
                           <a href="http://solex.blulogistics.net/solex/Home/GuiaRastreo?Numero=<?php echo $orden->ultima_milla;  ?>" class="btn btn-success" target="_blank"> Rastrear Guia Local </a>
   
                         @else
                        <h3>{{$orden->ultima_milla}}</h3>
                        @endif
                        
                      </div>
                      @endif
                  </div>
                </div>
             
               </div>

          
         </div>
      </div>
   </div>
</div>

          


 
@endsection
@section('js')
<script src="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/horizontal-timeline/js/horizontal-timeline.js')}}"></script>
<script>
   function orientacionLinea(x) {
      var element = document.getElementById("lineadetiempo");
     if (x.matches) { 
      element.classList = 'progress-tracker progress-tracker--text progress-tracker--center progress-tracker--vertical';
     } else {
      element.classList = 'progress-tracker progress-tracker--text progress-tracker--center ';
     }
   }
   var x = window.matchMedia("(max-width: 900px)")
   orientacionLinea(x)
   x.addListener(orientacionLinea)
   </script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('vendor/wrappixel/material-pro/4.2.1/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection