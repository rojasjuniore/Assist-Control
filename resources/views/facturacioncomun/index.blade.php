@extends('templates.material.main')
@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection
<?php $transaccion = ''; ?>
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

        <div class="col-lg-12">
                  
                <div class="card">  
                    <div class="card-body">
                         <h3>Pagos pendientes de facturas</h3>
                         <br>
                         @if($facturaOrdenes == '0')
                           <center><h4>No hay pagos pendientes</h4></center>
                         @else
                          <div class="table-responsive">
                            <table class="table color-table success-table">
                                <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Ordenes</th>
                                        <th>Pagar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($facturaOrdenes as $item )
                                        <tr>
                                            <td>{{$item->codigo}}</td>
                                            <td>
                                                <?php
                                                    $details = \App\Http\Controllers\HomeController::getDetailFactura($item->id_factura_orden);
                                                    if(isset($details)){
                                                        foreach ($details as $order){
                                                            if(isset($order)){
                                                                echo $order['ware_reciept']." / ".$order['descripcion']."<br>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a target="_blank" href="https://efectylogistic.com/logistico/facturaOrden/{{$item->id_factura_orden}}"> Pagar</a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                         @endif
                         
                       
                    </div>
                </div>
            </div>
</div>

@endsection

@section('js')
<script>
    
</script>
@endsection




