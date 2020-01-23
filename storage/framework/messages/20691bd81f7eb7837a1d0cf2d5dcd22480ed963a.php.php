<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon.png')); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

<?php echo $__env->yieldPushContent('before-styles'); ?>

<!-- Bootstrap Core CSS -->
    <link href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template CSS -->

    <?php $__env->startSection('template-css'); ?>
        

        
        <link href="/css/material/style.css" rel="stylesheet">

        <!-- You can change the theme colors from here -->
        <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/vendor/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="/vendor/respondjs/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('css'); ?>
    <style>
        @media (max-width: 600px) {
            .justify-content-end h2 {
                font-size: 18px;
            }

            .justify-content-end h6 {
                font-size: 12px;
            }

            #lineadetiempo h1 {
                font-size: 24px;
            }
        }

    </style>
    <?php echo $__env->yieldPushContent('after-styles'); ?>

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class=" <?php echo $__env->yieldContent('body-classes'); ?> card-no-border ">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<div id="main-wrapper">
    <?php echo $__env->yieldContent('layout-content'); ?>
</div>

<?php echo $__env->yieldPushContent('before-scripts'); ?>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php $__env->startSection('jquery'); ?>
    
    
    <script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/jquery/jquery.min.js"></script>
<?php echo $__env->yieldSection(); ?>
<!-- Bootstrap tether Core JavaScript -->
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/popper/popper.min.js"></script>
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/vendor/wrappixel/material-pro/4.2.1/material/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/vendor/wrappixel/material-pro/4.2.1/material/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/vendor/wrappixel/material-pro/4.2.1/material/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/sparkline/jquery.sparkline.min.js"></script>


<!--Custom JavaScript -->
<?php $__env->startSection('template-custom-js'); ?>
    

    
    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>
    
    
    
    
<?php echo $__env->yieldSection(); ?>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


<?php echo $__env->yieldPushContent('after-scripts'); ?>








<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(config('app.google_analytics')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '<?php echo e(config('app.google_analytics')); ?>');
</script>


<?php echo $__env->yieldContent('scripts'); ?>

<script>
    $(document).ready(function () {

        $('.popopUserProfile').click(function () {

            if ($("#popopUserProfile").hasClass("show")) {
                $('#popopUserProfile').removeClass('show');
            } else {
                $('#popopUserProfile').addClass('show');
            }
        });

        $('.NavBarUserProfile').click(function () {

            if ($("#NavBarUserProfile").hasClass("show")) {
                $('#NavBarUserProfile').removeClass('show');
            } else {
                $('#NavBarUserProfile').addClass('show');
            }
        });

        $(".BarIdioma").on("click", function () {

            if ($("#BarIdioma").hasClass("show")) {
                 $('#BarIdioma').removeClass('show');
            } else {
                $('#BarIdioma').addClass('show');
            }
        });
    });
</script>
</body>

</html>
