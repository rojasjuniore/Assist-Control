<div class="row">
    <div class="col-md-4">
        <label for="code_cliente" class="mb-0">{{ __('Code Cliente') }}</label>
        <input id="code_cliente" name="code_cliente" type="text" class="form-control {{ $errors->has('code_cliente') ? ' is-invalid' : '' }}" required autofocus
               value="{{ @old("code_cliente", $user->code_cliente) }}">
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
        <label for="pais_id" class="mb-0">{{ __('Pais') }}</label>
        <select class="form-control {{ $errors->has('pais_id') ? ' is-invalid' : '' }}" name="pais_id" id="pais_id" required value="{{ @old("pais_id", $user->pais_id) }}">
            <option value="">Seleccione un Pais</option>
            @foreach($paises AS $pais)
                <option value="{{$pais->id}}" @isset($user) @if($pais->id==$user->pais_id) selected @endif @endisset>{{$pais->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('pais_id'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('pais_id') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-md-4">
        <label for="estado_id" class="mb-0">{{ __('Estado') }}</label>
        <select class="form-control {{ $errors->has('estado_id') ? ' is-invalid' : '' }}" name="estado_id" id="estado_id">
            <option value="">Seleccione un Estado</option>
        </select>
        @if ($errors->has('estado_id'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('estado_id') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-4">
        <label for="ciudad_id" class="mb-0">{{ __('Ciudad') }}</label>
        <select class="form-control {{ $errors->has('ciudad_id') ? ' is-invalid' : '' }}" name="ciudad_id" id="ciudad_id">
            <option value="" selected>Seleccione una Ciudad</option>
        </select>
        @if ($errors->has('ciudad_id'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ciudad_id') }}</strong>
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
        <input id="telefono" name="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" required
               value="{{ @old("telefono", $user->telefono) }}" value="{{ @old("telefono", $user->telefono) }}">
        @if ($errors->has('telefono'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="fax" class="mb-0">{{ __('Fax') }}</label>
        <input id="fax" name="fax" type="text" class="form-control" value="{{ @old("fax", $user->fax) }}">
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
        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" @if(!isset($user)) required @endif>
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

@section('scripts')
    <script>
        $(document).ready(function () {

            $("#pais_id").change(function () {

                let pais_id = $(this).val();
                if(pais_id) {
                    const url = `/searchState/${pais_id}`;
                    $.getJSON(url, data => {
                        let htmlOptions = '<option value="">:: Seleccione ::</option>';
                        data.forEach(item => {
                            htmlOptions += `<option value="${item.id}">${item.name}</option>`;
                        });

                        $("#estado_id").html(htmlOptions);
                        $("#ciudad_id").html('<option value="">:: Debe escoger un Estado ::</option>');

                    });
                }else{
                    $("#estado_id").html(":: Debe escoger un Pais ::");
                    $("#ciudad_id").html(":: Debe escoger un Estado ::");
                }
            });

            $("#estado_id").change(function () {

                let estado_id = $(this).val();
                if(estado_id) {
                    const url = `/searchCity/${estado_id}`;
                    $.getJSON(url, data => {
                        let htmlOptions = '<option value="">:: Seleccione ::</option>';
                        data.forEach(item => {
                            htmlOptions += `<option value="${item.id}">${item.name}</option>`;
                        });

                        $("#ciudad_id").html(htmlOptions);

                    });
                }else{
                    $("#ciudad_id").html(":: Debe escoger un Estado ::");
                }
            });

        });
    </script>
@endsection