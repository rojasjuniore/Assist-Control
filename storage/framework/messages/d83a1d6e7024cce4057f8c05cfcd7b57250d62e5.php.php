<?php $__env->startSection('jquery'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startPush('before-scripts'); ?>
    <script src="<?php echo e(mix('/js/home-one.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('nombre_modulo', _i('Roles')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-one')); ?>"><?php echo e(_i('Inicio')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>"><?php echo e(_i('Roles')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(_i('Crear')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            <?php echo e(_i('Nuevo Rol')); ?>

        </h1>
    </section>
    <div class="content">
        <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if(session('info')): ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success text-center"><?php echo e(session('info')); ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <?php echo Form::open(['route' => 'roles.store', 'style'=>'width: 100%']); ?>

                    <?php echo $__env->make('roles.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <hr>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-outline-secondary float-right"><?php echo e(_i('Regresar')); ?></a>
                    <?php echo e(Form::submit(_i('Guardar'), ['class' => 'btn btn-outline-success float-right mr-1'])); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.material.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>