<?php $__env->startSection('jquery'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startPush('before-scripts'); ?>
    <script src="<?php echo e(mix('/js/home-one.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('nombre_modulo', 'Usuarios'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-one')); ?>">Inicio</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Usuarios</a></li>
    <li class="breadcrumb-item active">Detalle</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Usuario# <b><?php echo e(str_pad($user->id, 6, '0', STR_PAD_LEFT)); ?></b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                            <p><strong>Nombre:</strong> <?php echo e($user->nombre); ?></p>
                            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                            <p><strong>Telefono:</strong> <?php echo e($user->telefono); ?></p>
                            <p><strong>Fax:</strong> <?php echo e($user->fax); ?></p>
                            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                            <p><strong>Pais:</strong> <?php echo e($user->paises->name); ?></p>
                            <p><strong>Estado:</strong> <?php echo e($user->estados->name); ?></p>
                            <p><strong>Ciudad:</strong> <?php echo e($user->ciudades->name); ?></p>
                            <p><strong>Dirección:</strong> <?php echo e($user->direccion); ?></p>

                            <h4 class="mt-4">Lista de Roles</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                                <?php echo e(Form::checkbox('roles[]', $item->id, (in_array($item->id, $selected)? true : false), ['disabled' => 'disabled', 'id'=>$item->id])); ?>

                                                <label class="form-check-label" for="<?php echo e($item->id); ?>">
                                                    <?php echo e($item->name); ?> (<?php echo e($item->description ?: 'Sin descripcion'); ?>)
                                                </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                <hr>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-outline-success float-right"><?php echo e(__('Regresar')); ?></a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.material.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>