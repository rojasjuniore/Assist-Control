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

                    <?php echo Form::model($user, ['route' => ['users.cambioClave', $user->id_cliente], 'method'=>'POST', 'style'=>'width: 100%']); ?>


                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <label for="password" class="mb-0"><?php echo e(_i('Clave')); ?></label>
                            <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-6">
                            <label for="password-confirm" class="mb-0"><?php echo e(_i('Repetir Clave')); ?></label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
                            <?php if($errors->has('password-confirm')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password-confirm')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr>
                    <?php echo e(Form::submit('Guardar', ['class' => 'btn btn-outline-success float-right mr-1'])); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

