<?php $__env->startSection('layout-content'); ?>

<div id="main-wrapper">
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(<?php echo e(asset('images/background.jpg')); ?>);">
        <div class="login-box card">
            <div class="card-body" style="overflow-x: hidden; overflow-y:auto;">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <?php echo $__env->make('templates.application.components.navbar-lang', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <form class="form-horizontal form-material" method="POST" action="<?php echo e(route('register')); ?>" onsubmit="return checkForm(this);">
                    <?php echo csrf_field(); ?>
                    <a href="javascript:void(0)" class="text-center db">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Home" style="height: 10em"/>
                    </a>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="form-group mt-4">
                        <div class="col-xs-12">
                            <input id="nombre" placeholder="Nombre y Apellido" type="text" class="form-control<?php echo e($errors->has('nombre') ? ' is-invalid' : ''); ?>" name="nombre" value="<?php echo e(old('nombre')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" placeholder="Correo Electrónico" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                        </div>
                    </div>
             
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="password" placeholder="Contraseña" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                  <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" name="terms" type="checkbox"  >
                                <label for="checkbox-signup"> Acepto los terminos y condiciones<a href="#"></a></label>
                              
                            </div>
                        </div>
                    </div> 
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">  <?php echo e(_i('Registrar')); ?></button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p class="text-center">¿Ya posees una cuenta verificada? <a href="<?php echo e(route('login')); ?>" class="text-info m-l-5"><b>Inicia sesión</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function checkForm(form)
        {
            if(!form.terms.checked) {
                alert("Por favor, acepta los terminos y condiciones");
                form.terms.focus();
                return false;
            }
            return true;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.application.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>