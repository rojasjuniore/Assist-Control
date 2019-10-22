const url = 'http://carterista.test/api/';
// const url = 'http://giftcard.carterista.com/api/';
export { url };

require('./bootstrap');
// require('./sidebarmenu');
require('./custom');
require('./ajax/giftcards');
require('./ajax/transfers');
require('./ajax/users');
require('./ajax/accounts');
require('./ajax/orders');

$('#dataTable').DataTable({
    // ordering: false,
    language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
    select: {
        style: require('datatables.net-bs4')
    },
    "columnDefs": [
        {"type": "date", "targets": 5}
    ]
});