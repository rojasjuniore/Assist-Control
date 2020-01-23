<div class="row">
    <div class="col-md-6">
        <label for="menu" class="mb-0">{{ _i('Nombre del Menu') }}</label>
        <input id="menu" name="menu" type="text" value="{{ @old("menu", $menu->menu) }}" class="form-control {{ $errors->has('menu') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('menu'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('menu') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="padre" class="mb-0">{{ _i('Padre') }}</label>
        {{ Form::select('padre', ['0' => 'Sin Padre'] + $menus, null, ['required', 'class' => 'form-control', 'placeholder' => _i(':: Seleccione ::')])}}
        @if ($errors->has('padre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('padre') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <label for="ruta" class="mb-0">{{ _i('Nombre de la Ruta') }} <small>({{_i('La ruta debe existir en el archivo routes.web')}})</small></label>
        <input id="ruta" name="ruta" type="text" value="{{ @old("ruta", $menu->ruta) }}" class="form-control {{ $errors->has('ruta') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('ruta'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ruta') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="nivel" class="mb-0">{{ _i('Nivel') }}</label>
        <input id="nivel" name="nivel" type="text" class="form-control{{ $errors->has('nivel') ? ' is-invalid' : '' }}" required value="{{ @old("nivel", $menu->nivel) }}">
        @if ($errors->has('nivel'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nivel') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <label for="icono" class="mb-0">{{ _i('Icono') }}</label>
        <small>Ej: fas fa-pills - (<a href="https://fontawesome.com/" target="_blank">{{ _i('Más Iconos') }}</a>)</small>
        <input id="icono" name="icono" type="text" value="{{ @old("icono", $menu->icono) }}" class="form-control {{ $errors->has('icono') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('icono'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('icono') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
    </div>
</div>