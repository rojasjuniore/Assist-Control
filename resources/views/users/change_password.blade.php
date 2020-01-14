    <section class="content-header">
        <h1>
            Cambio de Contraseña
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <p>Su clave ha sido cambiada por el administrador del sistema, le recomendamos cambie dicha contraseña en virtud de mantener la seguridad de los datos.</p>

                    {!! Form::model($user, ['route' => ['users.cambioClave', $user->id_cliente], 'method'=>'POST', 'style'=>'width: 100%']) !!}

                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <label for="password" class="mb-0">{{ _i('Clave') }}</label>
                            <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-sm-6">
                            <label for="password-confirm" class="mb-0">{{ _i('Repetir Clave') }}</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
                            @if ($errors->has('password-confirm'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr>
                    {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success float-right mr-1'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

