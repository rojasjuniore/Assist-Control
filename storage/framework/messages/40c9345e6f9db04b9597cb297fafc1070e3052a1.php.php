<?php $__env->startSection('body-classes',''); ?>

<?php $__env->startSection('template-css'); ?>
    <link href="<?php echo e(mix('/css/material/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(mix('/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template-custom-js'); ?>
    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('layout-content'); ?>

    <?php echo $__env->make('templates.application.includes.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('templates.material.navbarleft', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

    <div class="page-wrapper">

        <div id="contenedorweb" class="container-fluid">

            <?php echo $__env->make('templates.application.includes.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php if(!isset($sincard)): ?>
                <div class="card">
                    <div class="card-body">
            <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>

            <?php if(!isset($sincard)): ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo $__env->make('templates.application.includes.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.application.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>