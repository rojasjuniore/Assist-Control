@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.css">

@endsection

    <table class="table table-bordered table-hover" id="asistencias-table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Asistente</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->created_at->format('d/m/Y') }}</td>
                <td>{{ $asistencia->created_at->format('H:i') }}</td>
                <td>{{ $asistencia->usuarios->nombre }}</td>
                <td>{{ $asistencia->usuarios->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#asistencias-table').DataTable({
                "order": [[0, "desc"]],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Ver _MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "_START_ al _END_ de  _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": ">>",
                        "sNext": ">",
                        "sPrevious": "<"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "pageLength": 10,
                "bDestroy": true
            });
        });
    </script>

@endsection
