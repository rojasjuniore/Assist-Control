<?php $__env->startSection('nombre_modulo', 'Perfil del Usuario'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home-one')); ?>"><?php echo e(_i('Inicio')); ?></a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('perfil')); ?>"><?php echo e(_i('Perfil del Usuario')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(session('info')): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-success text-center"><?php echo e(session('info')); ?></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <?php if($user->avatar): ?>
                            <img src="<?php echo e($user->avatar); ?>" class="img-circle" width="150">
                        <?php else: ?>
                            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="img-circle" width="150"/>
                        <?php endif; ?>
                        <h4 class="card-title m-t-10"><?php echo e($user->nombre); ?></h4>
                        <h6 class="card-subtitle">
                            Rol:
                            <?php $__currentLoopData = $user->perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($perfil->rol->name); ?>.
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">

                    <small class="text-muted"><?php echo e(_i('Email')); ?>:</small>
                    <h6><?php echo e($user->email); ?></h6>

                    <small class="text-muted p-t-10 db"><?php echo e(_i('Telefóno')); ?>:</small>
                    <h6><?php echo e($user->telefono); ?></h6>

                    <small class="text-muted p-t-10 db"><?php echo e(_i('Fax')); ?>:</small>
                    <h6><?php echo e($user->fax); ?></h6>

                    <small class="text-muted p-t-10 db"><?php echo e(_i('Dirección')); ?>:</small>
                    <h6><?php echo e($user->direccion); ?></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(_i('Editar Datos')); ?></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('storeperfil')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b><?php echo e(_i('Nombre')); ?></b></label>
                                    <input type="text" name="nombre" value="<?php echo e($user->nombre); ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b><?php echo e(_i('Email')); ?></b></label>
                                    <input type="text" name="email" value="<?php echo e($user->email); ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pais_id" class="mb-0"><b><?php echo e(_i('Pais')); ?></b></label>
                                    <select class="form-control <?php echo e($errors->has('pais_id') ? ' is-invalid' : ''); ?>" name="pais_id" id="pais_id" required>
                                        <option value=""><?php echo e(_i('Seleccione un País')); ?></option>
                                        <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pais->id); ?>" <?php if(isset($user)): ?> <?php if($pais->id==$user->pais_id): ?> selected
                                                    <?php endif; ?> <?php endif; ?> <?php if(@old("pais_id")==$pais->id): ?> selected <?php endif; ?>><?php echo e($pais->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('pais_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('pais_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado_id" class="mb-0"><b><?php echo e(_i('Estado')); ?></b></label>
                                    <select class="form-control <?php echo e($errors->has('estado_id') ? ' is-invalid' : ''); ?>" name="estado_id" id="estado_id">
                                        <option value=""><?php echo e(_i('Seleccione un Estado')); ?></option>
                                    </select>
                                    <?php if($errors->has('estado_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('estado_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ciudad_id" class="mb-0"><b><?php echo e(_i('Ciudad')); ?></b></label>
                                    <select class="form-control <?php echo e($errors->has('ciudad_id') ? ' is-invalid' : ''); ?>" name="ciudad_id" id="ciudad_id">
                                        <option value="" selected><?php echo e(_i('Seleccione una Ciudad')); ?></option>
                                    </select>
                                    <?php if($errors->has('ciudad_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('ciudad_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b><?php echo e(_i('Dirección')); ?></b></label>
                                    <textarea name="direccion" id="direccion" class="form-control"><?php echo e(@old("direccion", $user->direccion)); ?></textarea>
                                    <?php if($errors->has('direccion')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('direccion')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono" class="mb-0"><b><?php echo e(_i('Telefono')); ?></b></label>
                                    <input id="telefono" name="telefono" type="text" class="form-control<?php echo e($errors->has('telefono') ? ' is-invalid' : ''); ?>" required
                                           value="<?php echo e(@old("telefono", $user->telefono)); ?>" value="<?php echo e(@old("telefono", $user->telefono)); ?>">
                                    <?php if($errors->has('telefono')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('telefono')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fax" class="mb-0"><b><?php echo e(_i('Fax')); ?></b></label>
                                    <input id="fax" name="fax" type="text" class="form-control" value="<?php echo e(@old("fax", $user->fax)); ?>">
                                    <?php if($errors->has('fax')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('fax')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password" class="mb-0"><b><?php echo e(_i('Clave')); ?></b></label>
                                    <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                           <?php if(!isset($user)): ?> required <?php endif; ?>>
                                    <?php if(isset($user)): ?>
                                        <p class="small"><?php echo e(_i('Llene este campo solamente si desea cambiar la clave')); ?></p>
                                    <?php endif; ?>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="pais_select" id="pais_select" value="<?php echo e($user->pais_id); ?>">
                        <input type="hidden" name="estado_select" id="estado_select" value="<?php echo e($user->estado_id); ?>">
                        <input type="hidden" name="ciudad_select" id="ciudad_select" value="<?php echo e($user->ciudad_id); ?>">

                        <button type="submit" class="btn btn-outline-success"><?php echo e(_i('Actualizar')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/geo_dependientes.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.material.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>