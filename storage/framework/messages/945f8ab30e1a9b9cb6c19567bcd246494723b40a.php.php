<div class="row">
    <div class="col-md-6">
        <label for="menu" class="mb-0"><?php echo e(_i('Nombre del Menu')); ?></label>
        <input id="menu" name="menu" type="text" value="<?php echo e(@old("menu", $menu->menu)); ?>" class="form-control <?php echo e($errors->has('menu') ? ' is-invalid' : ''); ?>" required autofocus>
        <?php if($errors->has('menu')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('menu')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="padre" class="mb-0"><?php echo e(_i('Padre')); ?></label>
        <?php echo e(Form::select('padre', ['0' => 'Sin Padre'] + $menus, null, ['required', 'class' => 'form-control', 'placeholder' => _i(':: Seleccione ::')])); ?>

        <?php if($errors->has('padre')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('padre')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <label for="ruta" class="mb-0"><?php echo e(_i('Nombre de la Ruta')); ?> <small>(<?php echo e(_i('La ruta debe existir en el archivo routes.web')); ?>)</small></label>
        <input id="ruta" name="ruta" type="text" value="<?php echo e(@old("ruta", $menu->ruta)); ?>" class="form-control <?php echo e($errors->has('ruta') ? ' is-invalid' : ''); ?>" required>
        <?php if($errors->has('ruta')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('ruta')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <label for="nivel" class="mb-0"><?php echo e(_i('Nivel')); ?></label>
        <input id="nivel" name="nivel" type="text" class="form-control<?php echo e($errors->has('nivel') ? ' is-invalid' : ''); ?>" required value="<?php echo e(@old("nivel", $menu->nivel)); ?>">
        <?php if($errors->has('nivel')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('nivel')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <label for="icono" class="mb-0"><?php echo e(_i('Icono')); ?></label>
        <small>Ej: fas fa-pills - (<a href="https://fontawesome.com/" target="_blank"><?php echo e(_i('Más Iconos')); ?></a>)</small>
        <input id="icono" name="icono" type="text" value="<?php echo e(@old("icono", $menu->icono)); ?>" class="form-control <?php echo e($errors->has('icono') ? ' is-invalid' : ''); ?>" required>
        <?php if($errors->has('icono')): ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('icono')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-6">
    </div>
</div>