
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
    .stripe-button-el span{
        background: #26c6da !important;
        border: 1px solid #26c6da !important;
        box-shadow: 0 2px 2px 0 rgba(40, 190, 189, 0.14), 0 3px 1px -2px rgba(40, 190, 189, 0.2), 0 1px 5px 0 rgba(40, 190, 189, 0.12) !important;
        transition: 0.2s ease-in !important;
        display: inline-block;
        font-weight: 400;
    }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
       <center><b> <h2> Servicios Disponibles </h2></b> </center> 





      <div class="row">
    @foreach($promo as $value)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">{{ $value->nombre }}</h4>
                <p class="card-text">{{ $value->descripcion }}</p>
                 @foreach($promovar as $valuevar)
                    @if($value->id == $valuevar->id_promocion)
                    <a href="#" onclick="amount = {{ $valuevar->precio }}; promo = {{ $valuevar->id }};  event.preventDefault(); " class="btn btn-secondary btn-block">{{ $valuevar->peso }} Lbs - {{ $valuevar->precio }} Uds </a>
             
                    @endif
                @endforeach
                
              </div>
            </div>

            <span></span>
            <span></span>
           
        </div>
    @endforeach
     </div>
        <div class="row align-items-center">
            
        <div class="col-md-4 align-self-center">
            <h1></h1>
            <center>
            <img src="{{asset('images/paypal.png')}}" alt="" width="70%">
                <form method="POST" id="paypalForm" action="{{ route('create-payment-promo') }}">
                    <input type="hidden" id="ppromoId" name="ppromoId" />
                    <input type="hidden" id="pMonto" name="pMonto" />
                    <input type="hidden" id="paymentID" name="paymentID" />
                 @csrf
                 <div style="text-align: center;" id='paypal-button-container'></div>
                </form>
            </center>
        </div>
        <div class="col-md-4">
            <center>
                <img src="{{asset('images/epayco.png')}}" width="70%" alt="">
                <button class="btn btn-success" id="epayco-button">Pagar con epayco</button>
            </center>
        </div>
        <div class="col-md-4">
            <center>
                <img src="{{asset('images/stripelogo.png')}}" width="70%" alt="">
             <form style="margin-top:20px;" onsubmit="event.preventDefault();" id="stripeForm" action="/pagostripepromo/2000" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="stripeToken" name="stripeToken" />
                    <input type="hidden" id="stripeEmail" name="stripeEmail" />
                    <input type="hidden" id="promoId" name="promoId" />
                    <input type="hidden" id="sMonto" name="sMonto" />
                    <button type="submit" class="btn btn-success" id="stripe-button">Pagar con stripe</button>
            </form>
            </center>
        </div>
    </div>
            
            
    </div>
</div>


@endsection
@section('js')
<script src="https://checkout.stripe.com/checkout.js"></script>
   <script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>
   <script src="https://www.paypalobjects.com/api/checkout.js"></script>
   <script>
    var amount = 0;
    var promo = 0;
        $('#stripe-button').click(function(){
            if(amount == 0){
                alert('Debe seleccionar una promoción antes de continuar');
                event.preventDefault();
            }else{
                var token = function (res){
                    var $id = $('<input type="hidden" name="stripeToken" />').val(res.id);
                    var $email = $('<input type="hidden" name="stripeEmail" />').val(res.email);
                    var form =  document.getElementById('stripeForm');
                    document.getElementById('stripeToken').value = res.id;
                    document.getElementById('stripeEmail').value = res.email;
                    document.getElementById('promoId').value = promo;
                    document.getElementById('sMonto').value = amount;
                    document.getElementById('stripeForm').submit();

                };
                StripeCheckout.open({
                    key: '{{ env('STRIPE_KEY') }}',
                    amount: amount*100,
                    name: 'Pagar con Stripe',
                    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                    description: 'Pago DHL',
                    panelLabel: 'Pagar con stripe',
                    token: token,
                });
                return false;

            }
        
        })
       $('#paypal-button').click(function(){
        if(amount == 0){
                alert('Debe seleccionar una promoción antes de continuar');
                event.preventDefault();
            }else{
                alert(promo);
        document.getElementById('paypalamount').value = amount;
        }
        });
       $('#epayco-button').click(function(){
        if(amount == 0){
                alert('Debe seleccionar una promoción antes de continuar');
                event.preventDefault();
            }else{

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
            amount: amount,
            tax_base: "0",
            tax: "0",
            country: "co",
            lang: "en",
  
            //Onpage="false" - Standard="true"
            external: "false",
  
  
            //Atributos opcionales
            extra1: promo,
            extra2: "extra2",
            extra3: "extra3",
            confirmation: "{{ URL::to('/checkoutfinishpromo') }}",
            response: "{{ URL::to('/checkoutfinishpromo') }}",
  
            //Atributos cliente
            name_billing: "Andres Perez",
            address_billing: "Carrera 19 numero 14 91",
            type_doc_billing: "cc",
            mobilephone_billing: "3050000000",
            number_doc_billing: "100000000"
            }

        handler.open(data);
            }

        });
       paypal.Button.render({

    env: 'sandbox', // sandbox | production
    style: {
        layout: 'vertical', // horizontal | vertical
        size: 'medium', // medium | large | responsive
        shape: 'rect', // pill | rect
        color: 'gold' // gold | blue | silver | black
    },
    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
        sandbox: 'Acko2Gyfx5_dPvzI4rHemgFZpB9UC2uORUsF7bxKiX8PVAkCZIdD0q5vfyppNA4vTHCg2KeK4bvohzzc',
        // production: 'AaC7SZCul-svBA6JAz2LlULyN4xKNc_kNYL8QYRdDVJ_TPBE1NLXldpInpIHb5hVMENM2Sv16_E4a4fo',
    },

    // Show the buyer a 'Pay Now' button in the checkout flow
    commit: true,

    // payment() is called when the button is clicked
    payment: function(data, actions) {

        // Make a call to the REST api to create the payment
        return actions.payment.create({
            payment: {
                transactions: [{
                    amount: {
                        total: amount,
                        currency: 'USD'
                    }
                }]
            }
        });
    },

    // onAuthorize() is called when the buyer approves the payment
    onAuthorize: function(data, actions) {

        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {

                    document.getElementById('ppromoId').value = promo;
                    document.getElementById('pMonto').value = amount;
                    document.getElementById('paymentID').value = data.paymentID;
                    document.getElementById('paypalForm').submit();
                    // console.log(data);
        });
    }

}, '#paypal-button-container');
       
   </script>
@endsection





