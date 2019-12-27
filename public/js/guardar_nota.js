$(document).on('click', '.btnGuardarNota', function (event) {

    let remedio_id = $(this).data('remedioid');
    let estudio_id = $('#estudio_id').val();
    let nota = $(`#nota${remedio_id}`).val();

    $(`#msg${remedio_id}`).html('');

    $.ajax({
        type:'POST',
        url:'/guardarNota',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{
            estudio_id:estudio_id,
            remedio_id:remedio_id,
            nota:nota
        },
        success:function(respuesta){

            $(`#msg${remedio_id}`).html('<i class="fas fa-check-circle fa-2x text-success"></i>');

        }
    });
});