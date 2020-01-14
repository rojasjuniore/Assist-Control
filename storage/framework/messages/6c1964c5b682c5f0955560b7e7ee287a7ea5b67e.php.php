<?php $__env->startSection('jquery'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startPush('before-scripts'); ?>
    <script src="<?php echo e(mix('/js/home-one.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('nombre_modulo', 'Menu'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-one')); ?>">Inicio</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('menus.index')); ?>">Menu</a></li>
    <li class="breadcrumb-item active">Detalle</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Menu# <b><?php echo e(str_pad($menu->id, 6, '0', STR_PAD_LEFT)); ?></b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <p><strong>Nombre del Menu:</strong> <?php echo e($menu->menu); ?></p>
                <p><strong>Ruta:</strong> <?php echo e($menu->ruta); ?></p>
                <p><strong>Padre:</strong> <?php echo e($menu->padre); ?></p>
                <p><strong>Nivel:</strong> <?php echo e($menu->nivel); ?></p>

                <hr>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-outline-success float-right"><?php echo e(__('Regresar')); ?></a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.material.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>