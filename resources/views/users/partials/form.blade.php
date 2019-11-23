<div class="row">
    <div class="col-md-4">
        <label for="code_cliente" class="mb-0">{{ __('Code Cliente') }}</label>
        <input id="code_cliente" name="code_cliente" type="text" class="form-control {{ $errors->has('code_cliente') ? ' is-invalid' : '' }}" required autofocus value="{{ @old("code_cliente", $user->code_cliente) }}">
        @if ($errors->has('code_cliente'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('code_cliente') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-md-4">
        <label for="nombre" class="mb-0">{{ __('Nombre') }}</label>
        <input id="nombre" name="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" required value="{{ @old("nombre", $user->nombre) }}">
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-4">
        <label for="email" class="mb-0">{{ __('E-Mail') }}</label>
        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required value="{{ @old("email", $user->email) }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <label for="id_pais" class="mb-0">{{ __('Pais') }}</label>
        <select class="form-control {{ $errors->has('id_pais') ? ' is-invalid' : '' }}" name="id_pais" id="id_pais" required value="{{ @old("id_pais", $user->id_pais) }}">
            <option value="">Seleccione un Pais</option>
            @foreach($paises AS $pais)
                <option value="{{$pais->id_pais}}" @isset($user) @if($pais->id_pais==$user->id_pais) selected @endif @endisset>{{$pais->pais}}</option>
            @endforeach
        </select>
        @if ($errors->has('id_pais'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_pais') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-md-4">
        <label for="estado" class="mb-0">{{ __('Estado') }}</label>
        <select class="form-control {{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="estado">
            <option value="" selected>Seleccione un Estado</option>
        </select>
        @if ($errors->has('estado'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('estado') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-4">
        <label for="ciudad" class="mb-0">{{ __('Ciudad') }}</label>
        <select class="form-control {{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" id="ciudad">
            <option value="" selected>Seleccione una Ciudad</option>
        </select>
        @if ($errors->has('ciudad'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ciudad') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <label for="direccion" class="mb-0">{{ __('Dirección') }}</label>
        <textarea name="direccion" id="direccion" class="form-control">{{ @old("direccion", $user->direccion) }}</textarea>
        @if ($errors->has('direccion'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('direccion') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="telefono" class="mb-0">{{ __('Telefono') }}</label>
        <input id="telefono" name="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" required  value="{{ @old("telefono", $user->telefono) }}" value="{{ @old("telefono", $user->telefono) }}">
        @if ($errors->has('telefono'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="fax" class="mb-0">{{ __('Fax') }}</label>
        <input id="fax" name="fax" type="text" class="form-control" required value="{{ @old("fax", $user->fax) }}">
        @if ($errors->has('fax'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('fax') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="password" class="mb-0">{{ __('Clave') }}</label>
        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" @isset($user) required @endisset>
        <p class="small">Llene este campo solamente si desea cambiar la clave</p>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>

    @if(!isset($user))
    <div class="col-sm-6">
        <label for="password-confirm" class="mb-0">{{ __('Repetir Clave') }}</label>
        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
        @if ($errors->has('password-confirm'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password-confirm') }}</strong>
        </span>
        @endif
    </div>
    @endif
</div>

<h4 class="mt-4">Lista de Roles</h4>
<div class="form-group">
    <div class="col-sm-10">
        @foreach($roles AS $item)
            <div class="form-check">
                {{ Form::checkbox('roles[]', $item->id, null, ['id'=>$item->id]) }}
                <label class="form-check-label" for="{{$item->id}}">
                    {{ $item->name }} ({{$item->description ?: 'Sin descripcion' }})
                </label>
            </div>
        @endforeach
    </div>
</div>
