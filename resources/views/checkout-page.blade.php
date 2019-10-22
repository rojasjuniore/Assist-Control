<?php
 $amount = intval($pagodhl->usd);
 $amount = $amount*100;
 $fecha = date("d-m-Y", strtotime($pagodhl->fecha));
?>

@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<style>
    .divmontop{
       padding: 5px;
       border: solid 1px #eee;
    }
    .montop{
        font-size: 17px;
    }
</style>
@endsection

@section('content')
<input type="hidden" name="amountcop"  value="{{$pagodhl->usd}}" id="amountcop">
<div class="card">
    <div class="card-body">
       <div class="row">
            <div class="col-md-4 divmontop">
                <p><b>Resumen de pago</b></p><hr>
                <p class="montop"><b>Monto a pagar:</b> {{$pagodhl->usd}} USD</p>
                <p class="montop"><b>Concepto:</b> Envio de paquetes via DHL</p>
                <p class="montop"><b>Fecha:</b> {{$fecha}}</p>
            </div>
             <div class="col-md-8 ">
                <p><b>Guias</b></p><hr>
                    <table class="table" style="font-size: 14px;">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Código</th>
                          <th>Tracking</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $peso = 0 ?>
                        @foreach($guias as $orden)
                        <tr>
                          <td>{{$orden->ware_reciept}}</td>
                          <td>{{$orden->tracking}}</td>
                          <td>{{$orden->descripcion}}</td>
                           <?php $peso = $peso + $orden->peso ?>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
             
                  
            </div>
        </div>
            <br>

         @foreach($promo as $prom) 
            @if( $prom->promocions->peso <= $peso )
               <div>

                <h5>Pagar con promociones, tus promociones disponibles para este pago:</h5> 
                  @foreach($promo as $prom) 
                    <div class="col-md-4">
                      <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title text-center">{{ $prom->promocions->promocion->nombre }}</h4>
                          <p class="card-text">Libras: {{ $prom->promocions->peso}}<br>Costo:{{ $prom->promocions->precio }}</p>
                          <form action="{{ route('pagoenviopromo') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="promo" value="{{ $prom->id }}">
                            <input type="hidden" value="{{$pagodhl->usd}}"  name="monto">
                            <input name="transaccion" type="hidden" value="{{session('transaccion')}}">
                            <button class="btn btn-success"> Pagar ahora</button>
                          </form>
                        </div>
                      </div>

                      <span></span>
                      <span></span>
                     
                  </div>
                  
                    @endforeach
              </div>
              @break
            @endif
                      
          @endforeach
       
        <div class="row align-items-center">
        <div class="col-md-4 align-self-center">
            <center>
            <img src="{{asset('images/paypal.png')}}" alt="" width="70%">
                @if (session('error') || session('success'))
                <p class="{{ session('error') ? 'error':'success' }}">
                 {{ session('error') ?? session('success') }}
                </p>
                @endif
                <form method="POST" action="{{ route('create-payment') }}">
                 @csrf
                 <div class="m-2">
                 <input type="hidden" value="{{$pagodhl->usd}}" name="amount" placeholder="Amount">
                  @if ($errors->has('amount'))
                  <span class="error"> {{ $errors->first('amount') }} </span>
                  @endif
                 </div>
                 <form action=""></form>
                 <button type="submit" class="btn btn-success" > Pagar con paypal</button>
                </form>
            </center>
        </div>
        <div class="col-md-4">
            <center>
                <img src="{{asset('images/epayco.png')}}" width="70%" alt="">
                <button class="btn btn-success" onclick="handler.open(data)">Pagar con epayco</button>
            </center>
        </div>
        <div class="col-md-4">
                <img src="{{asset('images/stripelogo.png')}}" width="70%" alt="">
             <form style="margin-top:20px;" action="/pagostripe/{{$amount}}" method="POST">
                    {{ csrf_field() }}
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ config('services.stripe.key') }}"
                        data-amount="{{$amount}}"
                        data-name="Pagar con Stripe"
                        data-description="pago DHL"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                    </script>
                </form>
        </div>
    </div>
            
            
    </div>
</div>


     
   
<script src="https://js.stripe.com/v3/"></script>
   <script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>
   <script>
        var handler = ePayco.checkout.configure({
                    key: '45b960805ced5c27ce34b1600b4b9f54',
                    test: true
                })
                
                var data={
            //Parametros compra (obligatorio)
            name: "Envio Paquete EfectyLogistics",
            description: "Pago de paquete",
            invoice: "1234",
            currency: "usd",
            amount: document.getElementById('amountcop').value,
            tax_base: "0",
            tax: "0",
            country: "co",
            lang: "es",
  
            //Onpage="false" - Standard="true"
            external: "false",
  
  
            //Atributos opcionales
            extra1: "extra1",
            extra2: "extra2",
            extra3: "extra3",

            confirmation: "{{ URL::to('/checkoutfinishe') }}",
            response: "{{ URL::to('/checkoutfinishe') }}",
  
            //Atributos cliente
            name_billing: "Andres Perez",
            address_billing: "Carrera 19 numero 14 91",
            type_doc_billing: "cc",
            mobilephone_billing: "3050000000",
            number_doc_billing: "100000000"
            }
   </script>
   
@endsection





