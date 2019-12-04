
<!-- Tipo Field -->
<h2>Datos Personales</h2><hr>
<div class="row">
    <div class="col-sm-4"><b>Tipo de Estudio</b></div>
    <div class="col-sm-8">{!! $estudios->tipo !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Nombre</b></div>
    <div class="col-sm-8">{!! $estudios->h_nombre !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Apellido</b></div>
    <div class="col-sm-8">{!! $estudios->h_apellido !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Apodo</b></div>
    <div class="col-sm-8">{!! $estudios->h_identifica !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Iniciales</b></div>
    <div class="col-sm-8">{!! $estudios->h_iniciales !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Fecha de Nacimiento</b></div>
    <div class="col-sm-8">{!! $estudios->h_dia !!} - {!! $estudios->h_mes !!} - {!! $estudios->h_anio !!}</div>
</div>
<div class="row">
    <div class="col-sm-4"><b>Pais de Nacimiento</b></div>
    <div class="col-sm-8">{!! $estudios->pais->name !!}</div>
</div>

