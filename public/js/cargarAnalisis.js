function cargarAnalisis (orden, filtro1, filtro2, filtro3, filtro4, filtro5) {

    let remedios = $('#remedios').val();
    let data = $('#data').val();
    let predominante = $('#predominante').val();

    $.ajax({
        type:'POST',
        url:'/calcularAnalisis',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{
            remedios:remedios,
            data:data,
            predominante:predominante,
            orden: orden,
            filtro1: filtro1,
            filtro2: filtro2,
            filtro3: filtro3,
            filtro4: filtro4,
            filtro5: filtro5
        },
        success:function(filas){

            $('#cuadro tbody').html(filas);

            if ( $.fn.dataTable.isDataTable( '#cuadro' ) ) {
                $('#cuadro').DataTable();
            }else{
                $('#cuadro').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "order": false,
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
            }
        }
    });

}