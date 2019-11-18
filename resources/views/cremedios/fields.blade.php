<!-- Idmatmed Field -->
<div class="form-group col-sm-12">
    {!! Form::label('idMatMed', 'Idmatmed:') !!}
    {!! Form::number('idMatMed', null, ['class' => 'form-control']) !!}
</div>


<!-- Id Cremedios Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_cremedios', 'Id Cremedios:') !!}
    {!! Form::number('id_cremedios', null, ['class' => 'form-control']) !!}
</div>


<!-- Col C Field -->
<div class="form-group col-sm-12">
    {!! Form::label('col_c', 'Col C:') !!}
    {!! Form::number('col_c', null, ['class' => 'form-control']) !!}
</div>


<!-- Col D Field -->
<div class="form-group col-sm-12">
    {!! Form::label('col_d', 'Col D:') !!}
    {!! Form::number('col_d', null, ['class' => 'form-control']) !!}
</div>


<!-- Col E Field -->
<div class="form-group col-sm-12">
    {!! Form::label('col_e', 'Col E:') !!}
    {!! Form::number('col_e', null, ['class' => 'form-control']) !!}
</div>


<!-- Pregnancia Field -->
<div class="form-group col-sm-12">
    {!! Form::label('pregnancia', 'Pregnancia:') !!}
    {!! Form::number('pregnancia', null, ['class' => 'form-control']) !!}
</div>


<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<!-- Tipoclasico Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tipoClasico', 'Tipoclasico:') !!}
    {!! Form::number('tipoClasico', null, ['class' => 'form-control']) !!}
</div>


<!-- Tipopolicresto Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tipoPolicresto', 'Tipopolicresto:') !!}
    {!! Form::number('tipoPolicresto', null, ['class' => 'form-control']) !!}
</div>


<!-- Tipoavanzado Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tipoAvanzado', 'Tipoavanzado:') !!}
    {!! Form::number('tipoAvanzado', null, ['class' => 'form-control']) !!}
</div>


<!-- Tiporemedioclave Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tipoRemedioClave', 'Tiporemedioclave:') !!}
    {!! Form::number('tipoRemedioClave', null, ['class' => 'form-control']) !!}
</div>


<!-- Puros Field -->
<div class="form-group col-sm-12">
    {!! Form::label('puros', 'Puros:') !!}
    {!! Form::number('puros', null, ['class' => 'form-control']) !!}
</div>


<!-- Secuencia Field -->
<div class="form-group col-sm-12">
    {!! Form::label('secuencia', 'Secuencia:') !!}
    {!! Form::text('secuencia', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cremedios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
