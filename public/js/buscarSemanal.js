function fetchData() {

    let value = $("#weeklyDatePicker").val();
    let firstDate = moment(value, "DD-MM-YYYY").day(0).format("YYYY-MM-DD");
    let lastDate = moment(value, "DD-MM-YYYY").day(6).format("YYYY-MM-DD");

    console.log( 'firstDate', firstDate );
    console.log( 'lastDate', lastDate );

    const url = `/searchSemanal?firstDate=${firstDate}&lastDate=${lastDate}`;

    $.ajax({
        type:'GET',
        url: url,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{
            firstDate:firstDate,
            lastDate:lastDate
        },
        success:function(data){
            $('#contenido').html(data);
        }
    });
}

$(function () {

    fetchData();

    $('#weeklyDatePicker').change(fetchData);
});