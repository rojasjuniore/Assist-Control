<div class="row">
    <div class="col-md-6">
        <label for="nombre" class="mb-0"><?php echo e(_i('Nombre')); ?></label>
        <input id="nombre" name="nombre" type="text" class="form-control <?php echo e($errors->has('nombre') ? ' is-invalid' : ''); ?>" required value="<?php echo e(@old("nombre", $user->nombre)); ?>">
        <?php if($errors->has('nombre')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('nombre')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="email" class="mb-0"><?php echo e(_i('E-Mail')); ?></label>
        <input id="email" name="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required value="<?php echo e(@old("email", $user->email)); ?>">
        <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <label for="pais_id" class="mb-0"><?php echo e(_i('Pais')); ?></label>
        <select class="form-control <?php echo e($errors->has('pais_id') ? ' is-invalid' : ''); ?>" name="pais_id" id="pais_id" required>
            <option value="">Seleccione un Pais</option>
            <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($pais->id); ?>" <?php if(isset($user)): ?> <?php if($pais->id==$user->pais_id): ?> selected <?php endif; ?> <?php endif; ?> <?php if(@old("pais_id")==$pais->id): ?> selected <?php endif; ?>><?php echo e($pais->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('pais_id')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('pais_id')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <label for="estado_id" class="mb-0"><?php echo e(_i('Estado')); ?></label>
        <select class="form-control <?php echo e($errors->has('estado_id') ? ' is-invalid' : ''); ?>" name="estado_id" id="estado_id">
            <option value="">Seleccione un Estado</option>
        </select>
        <?php if($errors->has('estado_id')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('estado_id')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <label for="ciudad_id" class="mb-0"><?php echo e(_i('Ciudad')); ?></label>
        <select class="form-control <?php echo e($errors->has('ciudad_id') ? ' is-invalid' : ''); ?>" name="ciudad_id" id="ciudad_id">
            <option value="" selected>Seleccione una Ciudad</option>
        </select>
        <?php if($errors->has('ciudad_id')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('ciudad_id')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <label for="direccion" class="mb-0"><?php echo e(_i('Dirección')); ?></label>
        <textarea name="direccion" id="direccion" class="form-control"><?php echo e(@old("direccion", $user->direccion)); ?></textarea>
        <?php if($errors->has('direccion')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('direccion')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="telefono" class="mb-0"><?php echo e(_i('Telefono')); ?></label>
        <input id="telefono" name="telefono" type="text" class="form-control<?php echo e($errors->has('telefono') ? ' is-invalid' : ''); ?>" required
               value="<?php echo e(@old("telefono", $user->telefono)); ?>" value="<?php echo e(@old("telefono", $user->telefono)); ?>">
        <?php if($errors->has('telefono')): ?>
            <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('telefono')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="fax" class="mb-0"><?php echo e(_i('Fax')); ?></label>
        <input id="fax" name="fax" type="text" class="form-control" value="<?php echo e(@old("fax", $user->fax)); ?>">
        <?php if($errors->has('fax')): ?>
            <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('fax')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="password" class="mb-0"><?php echo e(_i('Clave')); ?></label>
        <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" <?php if(!isset($user)): ?> required <?php endif; ?>>
        <?php if(isset($user)): ?>
            <p class="small">Llene este campo solamente si desea cambiar la clave</p>
        <?php endif; ?>
        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('password')); ?></strong>
        </span>
        <?php endif; ?>
    </div>

    <?php if(!isset($user)): ?>
        <div class="col-sm-6">
            <label for="password-confirm" class="mb-0"><?php echo e(_i('Repetir Clave')); ?></label>
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
            <?php if($errors->has('password-confirm')): ?>
                <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('password-confirm')); ?></strong>
        </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<h4 class="mt-4">Lista de Roles</h4>
<div class="form-group">
    <div class="col-sm-10">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <?php echo e(Form::checkbox('roles[]', $item->id, null, ['id'=>$item->id])); ?>

                <label class="form-check-label" for="<?php echo e($item->id); ?>">
                    <?php echo e($item->name); ?> (<?php echo e($item->description ?: 'Sin descripcion'); ?>)
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php if(isset($user)): ?>
<input type="hidden" name="pais_select" id="pais_select" value="<?php echo e($user->pais_id); ?>">
<input type="hidden" name="estado_select" id="estado_select" value="<?php echo e($user->estado_id); ?>">
<input type="hidden" name="ciudad_select" id="ciudad_select" value="<?php echo e($user->ciudad_id); ?>">
<?php endif; ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/geo_dependientes.js')); ?>"></script>
<?php $__env->stopSection(); ?>