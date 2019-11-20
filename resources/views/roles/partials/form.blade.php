<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0">{{ __('Nombre del Rol') }}</label>
        <input id="name" name="name" type="text" value="{{ @old("name", $role->name) }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="slug" class="mb-0">{{ __('Slug') }}</label>
        <input id="slug" name="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" required value="{{ @old("slug", $role->slug) }}">
        @if ($errors->has('slug'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <label for="name" class="mb-0">{{ __('Descripción') }}</label>
        <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ @old("description", $role->description) }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<h4 class="mt-4">Permiso Especial</h4>
<div class="form-group">
    <div class="col-sm-10">
        <div class="form-check">
            <label class="form-check-label">
                <input id="special" name="special" class="form-check-input" type="radio" value="all-access" {{ @old('special', $role->special) == 'all-access' ? 'checked="checked"' : '' }}>
                {{__('Acceso Total')}}
                <span class="circle">
                  <span class="check"></span>
                </span>
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input id="special" name="special" class="form-check-input" type="radio" value="no-access" {{ @old('special', $role->special) == 'no-access' ? 'checked="checked"' : '' }}>
                {{__('Ningún Acceso')}}
                <span class="circle">
                  <span class="check"></span>
                </span>
            </label>
        </div>
    </div>
</div>

<h4 class="mt-4">Lista de Permisos</h4>
<div class="form-group">
    <div class="col-sm-10">
        @foreach($permissions AS $item)
            <div class="form-check">
                <label class="form-check-label">
                    {{ Form::checkbox('permissions[]', $item->id, null, ['class' => 'form-check-input']) }}
                    {{ $item->name }} ({{$item->description ?: 'Sin descripción' }})
                    <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                </label>
            </div>
        @endforeach
    </div>
</div>