<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0"><?php echo e(_i('Nombre del Rol')); ?></label>
        <input id="name" name="name" type="text" value="<?php echo e(@old("name", $role->name)); ?>" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" required autofocus>
        <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="slug" class="mb-0"><?php echo e(_i('Slug')); ?></label>
        <input id="slug" name="slug" type="text" class="form-control<?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" required value="<?php echo e(@old("slug", $role->slug)); ?>">
        <?php if($errors->has('slug')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('slug')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <label for="name" class="mb-0"><?php echo e(_i('Descripción')); ?></label>
        <textarea id="description" name="description" class="form-control <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"><?php echo e(@old("description", $role->description)); ?></textarea>
        <?php if($errors->has('description')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('description')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>

<h4 class="mt-4">Permiso Especial</h4>
<div class="form-group">
    <div class="col-sm-10">
        <input name="special" type="radio" class="with-gap" id="all-access" value="all-access" <?php echo e(@old('special', $role->special) == 'all-access' ? 'checked="checked"' : ''); ?>>
        <label for="all-access">Acceso Total</label>

        <input name="special" type="radio" class="with-gap" id="no-access" value="no-access" <?php echo e(@old('special', $role->special) == 'no-access' ? 'checked="checked"' : ''); ?>>
        <label for="no-access">Ningún Acceso</label>

    </div>
</div>

<h4 class="mt-4">Lista de Permisos</h4>
<div class="form-group">
    <div class="col-sm-10">
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <?php echo e(Form::checkbox('permissions[]', $item->id, null, ['id'=>$item->id])); ?>

                <label class="form-check-label" for="<?php echo e($item->id); ?>">
                    <?php echo e($item->name); ?> (<?php echo e($item->description ?: 'Sin descripción'); ?>)
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>