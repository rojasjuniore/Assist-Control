function fetchData() {
    const mes = $('#selectMes').val();
    const ano = $('#selectAno').val();
    const url = `/searchMensual?mes=${mes}&ano=${ano}`;

    $.ajax({
        type:'GET',
        url: url,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{
            mes:mes,
            ano:ano
        },
        success:function(data){
            $('#contenido').html(data);
        }
    });
}

$(function () {
    fetchData();

    $('#selectMes').change(fetchData);
    $('#selectAno').change(fetchData);
});