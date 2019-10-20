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

<div class="content">

    @if(Auth::user()->customer_stripe)

    <h4>Ya tienes tus pagos automaticos configurados.</h4>

    <form action="/cobro" method="POST">

        {{ csrf_field() }}

        <br>

        <button type="submit" class="btn btn-success">Cobrar</button>

    </form>

    @else

    <h3>Configuración pago automatico</h3>

    {{-- <h6>Realizaremos un cobro de 0,50$ en tu tarjeta con el objetivo de guardar <br> tu información para los cobros automaticos, este monto sera descontado de tu próxima factura.</h6> --}}
     <p style="max-width: 800px; margin-top: 10px; margin-bottom: 20px"><i class="fa fa-credit-card"></i><b> Ten presente</b> qué con el objetivo de guardar tu información para futuros cobros automáticos, recibirás en tu próxima factura un cobro de 0.05$ por el proceso</p>
     
    <form action="/pago" method="POST">

    <form action="/pago" method="POST">

        {{ csrf_field() }}

        <script

            src="https://checkout.stripe.com/checkout.js" class="stripe-button"

            data-key="{{ config('services.stripe.key') }}"

            data-amount="0.50"

            data-name="Compra"

            data-description="configuración de pago"

            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"

            data-locale="auto">

        </script>

    </form>

    @endif



    @if($historial)

        <h3>Historial de Facturación</h3>

        <div class="col-lg-6">

                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table color-table success-table">

                                <thead>

                                    <tr>

                                        <th>Monto</th>

                                        <th>Metodo</th>

                                        <th>Fecha</th>

                                        <th>Descripción</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    

                                        @foreach($historial as $item )

                                        <tr>

                                            <td>{{$item->monto}}$</td>

                                            <td>{{$item->metodo}}</td>

                                            <td>{{$item->fecha}}</td>

                                            <td>{{$item->descripcion}}</td>

                                        </tr>

                                        @endforeach

                                     

                                   

                                 

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

       

    @endif





  

</div>



@endsection



@section('js')

<script>

    

</script>

@endsection









