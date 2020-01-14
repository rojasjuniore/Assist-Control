<?php $__env->startSection('template-custom-js'); ?>

    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('layout-content'); ?>
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(/vendor/wrappixel/material-pro/4.2.1/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">

                Not available in demo mode.

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.application.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>