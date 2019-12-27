$(document).ready(function () {

    let varOrden='1';
    let filtro1=1;
    let filtro2=1;
    let filtro3=1;
    let filtro4=1;
    let filtro5=1;

    $('#btnOrden1').click(function () {
        if(varOrden != '1'){
            varOrden = '1';
            $(this).blur();
            $('#btnOrden1').removeClass('btn-outline-success');
            $('#btnOrden1').addClass('btn-success');
            $('#btnOrden2').removeClass('btn-success');
            $('#btnOrden2').addClass('btn-outline-success');
            $('#btnOrden3').removeClass('btn-success');
            $('#btnOrden3').addClass('btn-outline-success');
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });
    $('#btnOrden2').click(function () {
        if(varOrden != '2'){
            varOrden = '2';
            $(this).blur();
            $('#btnOrden2').removeClass('btn-outline-success');
            $('#btnOrden2').addClass('btn-success');
            $('#btnOrden1').removeClass('btn-success');
            $('#btnOrden1').addClass('btn-outline-success');
            $('#btnOrden3').removeClass('btn-success');
            $('#btnOrden3').addClass('btn-outline-success');
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });
    $('#btnOrden3').click(function () {
        if(varOrden != '3'){
            varOrden = '3';
            $(this).blur();
            $('#btnOrden3').removeClass('btn-outline-success');
            $('#btnOrden3').addClass('btn-success');
            $('#btnOrden1').removeClass('btn-success');
            $('#btnOrden1').addClass('btn-outline-success');
            $('#btnOrden2').removeClass('btn-success');
            $('#btnOrden2').addClass('btn-outline-success');
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });

    $('#btnRMS1').click(function () {
        if(filtro1==1) {
            $(this).blur();
            $(this).removeClass('btn-success');
            $(this).addClass('btn-outline-success');
            filtro1 = 0;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }else {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-success');
            filtro1 = 1;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });
    $('#btnImpregnancia1').click(function () {
        if(filtro2==1) {
            $(this).blur();
            $(this).removeClass('btn-success');
            $(this).addClass('btn-outline-success');
            filtro2 = 0;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }else {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-success');
            filtro2 = 1;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });

    $('#btnSecuencia1').click(function () {
        if(filtro3==1) {
            $(this).blur();
            $(this).removeClass('btn-success');
            $(this).addClass('btn-outline-success');
            filtro3 = 0;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }else {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-success');
            filtro3 = 1;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });

    $('#btnConsonante1').click(function () {
        if(filtro4==1) {
            $(this).blur();
            $(this).removeClass('btn-success');
            $(this).addClass('btn-outline-success');
            filtro4 = 0;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }else {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-success');
            filtro4 = 1;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });

    $('#btnClave1').click(function () {
        if(filtro5==1) {
            $(this).blur();
            $(this).removeClass('btn-success');
            $(this).addClass('btn-outline-success');
            filtro5 = 0;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }else {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-success');
            filtro5 = 1;
            cargarAnalisis(varOrden,filtro1,filtro2,filtro3,filtro4,filtro5);
        }
    });

});