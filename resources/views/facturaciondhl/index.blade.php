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
                         <h3>Pagos pendientes DHL</h3>
                         <br>
                         @if($pagos == '0')
                           <center><h4>No hay pagos pendientes</h4></center>
                         @else
                          <div class="table-responsive">
                            <table class="table color-table success-table">
                                <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th># Transacción</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Estatus</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                         @foreach($pagos as $item )
                                            @if($item->id_transaccion != $transaccion)
                                            <tr>
                                                <td>{{$item->id_orden}}</td>
                                                <td>{{$item->id_transaccion}}</td>
                                                <td>{{$item->usd}} USD</td>
                                                <td>{{$item->fecha}}</td>
                                                <td><div style="font-size:16px; padding: 5px;" class="label label-table label-danger">{{$item->estatus}}</div></td>
                                                <td><a class="btn btn-success" href="{{route('checkout',$item->id_transaccion)}}">Pagar</a></td>
                                            </tr>
                                            @endif
                                            <?php $transaccion = $item->id_transaccion; ?>
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




