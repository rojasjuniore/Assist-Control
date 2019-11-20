<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0">{{ __('Nombre') }}</label>
        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="email" class="mb-0">{{ __('E-Mail') }}</label>
        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="password" class="mb-0">{{ __('Clave') }}</label>
        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="password-confirm" class="mb-0">{{ __('Repetir Clave') }}</label>
        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
        @if ($errors->has('password-confirm'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password-confirm') }}</strong>
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
