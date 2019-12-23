<!-- Tipo Field -->
<h2>Datos Personales</h2><hr>
<div class="row">
    <div class="col-sm-4"><b>Tipo de Estudio</b></div>
    <div class="col-sm-8">{!! $estudios->tipo !!}</div>
</div>
@if($estudios->tipo=='humano')
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
    <div class="col-sm-8">@if($estudios->pais){{ $estudios->pais->name }}@endif</div>
</div>

@else
    <div class="row">
        <div class="col-sm-4"><b>Especie</b></div>
        <div class="col-sm-8">{!! $estudios->a_especie !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4"><b>Nombre del Dueño</b></div>
        <div class="col-sm-8">{!! $estudios->a_duenio !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4"><b>Nombre del Animal</b></div>
        <div class="col-sm-8">{!! $estudios->a_animal !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4"><b>Iniciales</b></div>
        <div class="col-sm-8">{!! $estudios->a_iniciales !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4"><b>Fecha de Nacimiento</b></div>
        <div class="col-sm-8">{!! $estudios->a_dia !!} - {!! $estudios->a_mes !!} - {!! $estudios->a_anio !!}</div>
    </div>
@endif