<?php $__env->startSection('template-custom-js'); ?>

    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>

    <script>
        $(function () {
            $("#back-to-login").click(function () {
                $("#loginform").slideDown()
                $("#recoverform").fadeOut()
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('layout-content'); ?>

    <div id="main-wrapper">
        <section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo e(asset('images/background.jpg')); ?>);">
            <div class="login-box card">
                <div class="card-body" style="overflow-x: hidden; overflow-y:auto;">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <?php echo $__env->make('templates.application.components.navbar-lang', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="<?php echo e(route('login.post')); ?>">
                        <?php echo csrf_field(); ?>
                        <a href="javascript:void(0)" class="text-center db">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Home" style="height: 10em"/>
                            <br/>
                        </a>

                        <div class="form-group m-t-40">
                            <?php if(Session::has('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(Session::get('error')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(Session::has('status')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('status')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="email" type="email" placeholder="<?php echo e(_i('Email')); ?>" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password" placeholder="<?php echo e(_i('Contraseña')); ?>" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> <?php echo e(_i('Ingresar')); ?></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                
                                <a href="javascript:void(0)" id="to-recover" class="text-dark">
                                    <i class="fa fa-lock m-r-5"></i>
                                    <?php echo e(_i('¿Olvidaste tu contraseña?')); ?>

                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="<?php echo e(route('login.facebook')); ?>" class="btn btn-facebook waves-effect btn-circle waves-light" data-toggle="tooltip" title="<?php echo e(_i('Ingresar con Facebook')); ?>">
                                        <i aria-hidden="true" class="fab fa-facebook"></i>
                                    </a>
                                    <a href="<?php echo e(route('login.google')); ?>" class="btn btn-googleplus waves-effect btn-circle waves-light" data-toggle="tooltip" title="<?php echo e(_i('Ingresar con Google')); ?>">
                                        <i aria-hidden="true" class="fab fa-google-plus"></i>
                                    </a>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div class="col-sm-12">
                            <p class="text-center"><?php echo e(_i('¿No tienes una cuenta?')); ?> <a href="<?php echo e(route('register')); ?>" class="text-primary m-l-5"><b></br><?php echo e(_i('Registrate ahora')); ?></b></a></p>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3><?php echo e(_i('Recuperar Contraseña')); ?></h3>
                                <p class="text-muted"><?php echo e(_i('Ingresa tu correo y te enviaremos las instrucciones')); ?></p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="emailRecover" type="email" placeholder="<?php echo e(_i('Email')); ?>" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit"> <?php echo e(_i('Enviar enlace')); ?></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" id="back-to-login" class="text-dark pull-right">
                                    <i class="fa fa-backward m-r-5"></i>
                                    <?php echo e(_i('Volver al inicio')); ?>

                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.application.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>