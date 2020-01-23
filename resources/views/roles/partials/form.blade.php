<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0">{{ _i('Nombre del Rol') }}</label>
        <input id="name" name="name" type="text" value="{{ @old("name", $role->name) }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="slug" class="mb-0">{{ _i('Slug') }}</label>
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
        <label for="name" class="mb-0">{{ _i('Descripción') }}</label>
        <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ @old("description", $role->description) }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<h4 class="mt-4">{{ _i('Permiso Especial') }}</h4>
<div class="form-group">
    <div class="col-sm-10">
        <input name="special" type="radio" class="with-gap" id="all-access" value="all-access" {{ @old('special', $role->special) == 'all-access' ? 'checked="checked"' : '' }}>
        <label for="all-access">{{ _i('Acceso Total') }}</label>

        <input name="special" type="radio" class="with-gap" id="no-access" value="no-access" {{ @old('special', $role->special) == 'no-access' ? 'checked="checked"' : '' }}>
        <label for="no-access">{{ _i('Ningún Acceso') }}</label>

    </div>
</div>

<h4 class="mt-4">{{ _i('Lista de Permisos') }}</h4>
<div class="form-group">
    <div class="col-sm-10">
        @foreach($permissions AS $item)
            <div class="form-check">
                {{ Form::checkbox('permissions[]', $item->id, null, ['id'=>$item->id]) }}
                <label class="form-check-label" for="{{$item->id}}">
                    {{ $item->name }} ({{$item->description ?: _i('Sin descripción') }})
                </label>
            </div>
        @endforeach
    </div>
</div>