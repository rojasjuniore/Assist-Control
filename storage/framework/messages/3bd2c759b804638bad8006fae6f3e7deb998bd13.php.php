<?php $__env->startSection('jquery'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startPush('before-scripts'); ?>
    <script src="<?php echo e(mix('/js/home-one.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('nombre_modulo', _i('Permisos')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-one')); ?>"><?php echo e(_i('Inicio')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('permissions.index')); ?>"><?php echo e(_i('Permisos')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(_i('Detalle')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            <?php echo e(_i('Permiso')); ?># <b><?php echo e(str_pad($permission->id, 6, '0', STR_PAD_LEFT)); ?></b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="card-body">
                    <p><strong><?php echo e(_i('Nombre del Permiso')); ?>:</strong> <?php echo e($permission->name); ?></p>
                    <p><strong><?php echo e(_i('Permiso')); ?>:</strong> <?php echo e($permission->slug); ?></p>
                    <p><strong><?php echo e(_i('Descripción')); ?>:</strong> <?php echo e($permission->description); ?></p>
                    <hr>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-outline-success float-right"><?php echo e(_i('Regresar')); ?></a>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.material.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>