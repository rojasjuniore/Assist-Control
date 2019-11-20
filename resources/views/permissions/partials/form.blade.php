<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0">{{ __('Nombre del Permiso') }}</label>
        <input id="name" name="name" type="text" value="{{ @old("name", $permission->name) }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-sm-6">
        <label for="slug" class="mb-0">{{ __('Permiso') }}</label>
        <input id="slug" name="slug" type="text" value="{{ @old("slug", $permission->slug) }}" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('slug'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <label for="description" class="mb-0">{{ __('Descripción') }}</label>
        <textarea name="description" id="description" class="form-control" required>{{ @old("description", $permission->description) }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
        @endif
    </div>
</div>