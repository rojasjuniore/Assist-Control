<div class="row">
    <div class="col-md-6">
        <label for="name" class="mb-0"><?php echo e(_i('Nombre del Permiso')); ?></label>
        <input id="name" name="name" type="text" value="<?php echo e(@old("name", $permission->name)); ?>" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" required autofocus>
        <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="slug" class="mb-0"><?php echo e(_i('Ruta')); ?> <small>Ej: remedios.edit</small></label>
        <input id="slug" name="slug" type="text" value="<?php echo e(@old("slug", $permission->slug)); ?>" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" required>
        <?php if($errors->has('slug')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('slug')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <label for="description" class="mb-0"><?php echo e(_i('Descripción')); ?></label>
        <textarea name="description" id="description" class="form-control" required><?php echo e(@old("description", $permission->description)); ?></textarea>
        <?php if($errors->has('description')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('description')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
</div>