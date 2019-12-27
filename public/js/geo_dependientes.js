let pais_id = $('#pais_select').val();
let estado_id = $('#estado_select').val();
let ciudad_id = $('#ciudad_select').val();

if(pais_id) {
    const url = `/searchState/${pais_id}`;
    $.getJSON(url, data => {
        let htmlOptions = '<option value="">:: Seleccione ::</option>';
        data.forEach(item => {
            const seleccionado = estado_id;
            let select = '';
            if(seleccionado==item.id){
                select = 'selected';
            }
            htmlOptions += `<option value="${item.id}" ${select}>${item.name}</option>`;
        });

        $("#estado_id").html(htmlOptions);

        if(estado_id) {
            const url = `/searchCity/${estado_id}`;
            $.getJSON(url, data => {
                let htmlOptions = '<option value="">:: Seleccione ::</option>';
                data.forEach(item => {
                    const seleccionado = ciudad_id;
                    let select = '';
                    if(seleccionado==item.id){
                        select = 'selected';
                    }
                    htmlOptions += `<option value="${item.id}" ${select}>${item.name}</option>`;
                });

                $("#ciudad_id").html(htmlOptions);

            });
        }else{
            $("#ciudad_id").html(":: Debe escoger un Estado ::");
        }

    });
}

$('#pais_id').change(function () {

    let pais_id = $(this).val();
    if(pais_id) {
        const url = `/searchState/${pais_id}`;
        $.getJSON(url, data => {
            let htmlOptions = '<option value="">:: Seleccione ::</option>';
            data.forEach(item => {
                htmlOptions += `<option value='${item.id}'>${item.name}</option>`;
            });

            $('#estado_id').html(htmlOptions);
            $('#ciudad_id').html('<option value="">:: Debe escoger un Estado ::</option>');

        });
    }else{
        $('#estado_id').html(':: Debe escoger un Pais ::');
        $('#ciudad_id').html(':: Debe escoger un Estado ::');
    }
});

$('#estado_id').change(function () {

    let estado_id = $(this).val();
    if(estado_id) {
        const url = `/searchCity/${estado_id}`;
        $.getJSON(url, data => {
            let htmlOptions = '<option value="">:: Seleccione ::</option>';
            data.forEach(item => {
                htmlOptions += `<option value='${item.id}'>${item.name}</option>`;
            });

            $('#ciudad_id').html(htmlOptions);

        });
    }else{
        $('#ciudad_id').html(':: Debe escoger un Estado ::');
    }
});