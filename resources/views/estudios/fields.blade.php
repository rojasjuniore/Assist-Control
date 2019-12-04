<!-- Id Usuario Field -->
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('id_usuario', 'Id Usuario:') !!}--}}
{{--    {!! Form::number('id_usuario', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Tipo Field -->
<div class="form-group col-sm-12">
    <label for=""><b>Tipo</b></label>
{{--    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}--}}
    <select class="form-control" name="tipo" id="tipo">
        <option value="" disabled selected>Seleccione un Tipo</option>
        <option value="12">Animal</option>
        <option value="97">Humano</option>
    </select>
</div>


<!-- H Nombre Field -->
<div class="form-group col-sm-12">
    <label for=""><b>Nombre</b></label>
    {!! Form::text('h_nombre', null, ['class' => 'form-control']) !!}
</div>


<!-- H Apellido Field -->
<div class="form-group col-sm-12">
    <label for=""><b>Apellido</b></label>
    {!! Form::text('h_apellido', null, ['class' => 'form-control']) !!}
</div>


<!-- H Identifica Field -->
<div class="form-group col-sm-12">
    <label for=""><b>Apodo</b></label>
    {!! Form::text('h_identifica', null, ['class' => 'form-control']) !!}
</div>


<!-- H Iniciales Field -->
<div class="form-group col-sm-12">
    <label for=""><b>Iniciales</b></label>
    {!! Form::text('h_iniciales', null, ['class' => 'form-control']) !!}
</div>



{{--<!-- H Dia Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('h_dia', 'H Dia:') !!}--}}
{{--    {!! Form::number('h_dia', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- H Mes Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('h_mes', 'H Mes:') !!}--}}
{{--    {!! Form::number('h_mes', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- H Anio Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('h_anio', 'H Anio:') !!}--}}
{{--    {!! Form::number('h_anio', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- H Pais Field -->
<div class="form-group col-sm-12">
{{--    {!! Form::label('h_pais', 'H Pais:') !!}--}}
{{--    {!! Form::text('h_pais', null, ['class' => 'form-control']) !!}--}}

    <div class="form-group">
        <label for=""><b>País</b></label>
        <select class="form-control" name="h_pais" id="h_pais">
            <option value="" disabled selected>Seleccione un País</option>
{{--            <option value="12">Argentina</option>--}}
{{--            <option value="97">Colombia</option>--}}
{{--            <option value="39">Costa Rica</option>--}}
{{--            <option value="37">Chile</option>--}}
{{--            <option value="225">Venezuela</option>--}}
               <?php
                foreach ($paises as $pais) {
                    ?><option value="{{$pais->id}}">{{$pais->name}}</option><?php
                }
                ?>
        </select>
    </div>
</div>



<!-- A Especie Field -->
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_especie', 'A Especie:') !!}--}}
{{--    {!! Form::text('a_especie', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Duenio Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_duenio', 'A Duenio:') !!}--}}
{{--    {!! Form::text('a_duenio', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Animal Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_animal', 'A Animal:') !!}--}}
{{--    {!! Form::text('a_animal', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Iniciales Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_iniciales', 'A Iniciales:') !!}--}}
{{--    {!! Form::text('a_iniciales', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Dia Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_dia', 'A Dia:') !!}--}}
{{--    {!! Form::number('a_dia', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Mes Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_mes', 'A Mes:') !!}--}}
{{--    {!! Form::number('a_mes', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- A Anio Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('a_anio', 'A Anio:') !!}--}}
{{--    {!! Form::number('a_anio', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- Ip Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('ip', 'Ip:') !!}--}}
{{--    {!! Form::text('ip', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- User Agent Field -->--}}
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('user_agent', 'User Agent:') !!}--}}
{{--    {!! Form::text('user_agent', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

<input type="hidden" id="id_usuario" name="id_usuario" value="{{Auth::user()->id_cliente}}" >
<input type="hidden" id="ip" name="ip" value="127.0.0.1" >
<input type="hidden" id="user_agent" name="user_agent" value="Firefox" >

@section('scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estudios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
