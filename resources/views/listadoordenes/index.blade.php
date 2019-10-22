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

<div class="card">
    <div class="card-body">
            <table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead >
                        <tr>
                            <th># Guia</th>
                            <th>Fecha</th>
                            <th>Tracking</th>
                            <th>Peso</th>
                            <th>Nombre Cliente</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                </table>
    </div>
  
</div>
  
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
        "serverSide" : true,
        "ajax" : "{{ ('api/orders') }}",
        "columns":[
            {data: 'ware_reciept'},
            {data: 'fecha'},
            {data: 'tracking'},
            {data: 'peso'},
            {data: 'nombre_cliente'},
            {data: 'costo'},

        ],
        "order": [[ 1, "desc" ]],
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


 
@endsection