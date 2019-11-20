<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0">{{ __('Nombre') }}</label>
        <input id="name" name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
</div>

<h4 class="mt-4">Lista de Roles</h4>
<div class="form-group">
    <div class="col-sm-10">
        @foreach($roles AS $item)
            <div class="form-check">
                <label class="form-check-label">
                    {{ Form::checkbox('roles[]', $item->id, null, ['class' => 'form-check-input']) }}
                    {{ $item->name }} ({{$item->description ?: 'Sin descripcion' }})
                    <span class="form-check-sign">
                          <span class="check"></span>
                    </span>
                </label>
            </div>
        @endforeach
    </div>
</div>
