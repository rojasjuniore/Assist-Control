<div class="row">
    <div class="col-md-12">
        <label for="cantidad" class="mb-0">{{ __('Cantidad de Créditos') }}</label>
        <input id="cantidad" name="cantidad" type="text" value="{{ @old("cantidad") }}" class="form-control {{ $errors->has('cantidad') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('cantidad'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
        @endif
    </div>
</div>
<input type="hidden" name="cliente_id" id="cliente_id" value="{{$cliente_id}}">
