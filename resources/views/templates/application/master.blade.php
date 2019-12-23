<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    {{--<link rel="icon" type="image/png" sizes="16x16" href="/vendor/wrappixel/material-pro/4.2.1/assets/images/favicon.png">--}}
    <title>Homeopatía</title>

    @stack('before-styles')

<!-- Bootstrap Core CSS -->
    <link href="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template CSS -->

    @section('template-css')
        {{--Defaults to Material and Blue--}}

        {{-- ### Choose only the one you want ### --}}
        <link href="/css/material/style.css" rel="stylesheet">
        {{--<link href="/css/dark/style.css" rel="stylesheet">--}}
        {{--<link href="/css/minisidebar/style.css" rel="stylesheet">--}}
        {{--<link href="/css/horizontal/style.css" rel="stylesheet">--}}
        {{--<link href="/css/material-rtl/style.css" rel="stylesheet">--}}

    <!-- You can change the theme colors from here -->
        <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
    @show

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/vendor/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="/vendor/respondjs/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
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
    @stack('after-styles')

    @yield('styles')
</head>

<body class=" @yield('body-classes') card-no-border ">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<div id="main-wrapper">
    @yield('layout-content')
</div>

@stack('before-scripts')

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@section('jquery')
    {{--    If not using jQuery from NPM and webpack build, don't override this section,    --}}
    {{--    or user @parent inside when you do it, to include this jquery script            --}}
    <script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/jquery/jquery.min.js"></script>
@show
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
@section('template-custom-js')
    {{--Defaults to Material --}}

    {{-- ### Choose only the one you want ### --}}
    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>
    {{--<script src="/vendor/wrappixel/material-pro/4.2.1/dark/js/custom.min.js"></script>--}}
    {{--<script src="/vendor/wrappixel/material-pro/4.2.1/minisidebar/js/custom.min.js"></script>--}}
    {{--<script src="/vendor/wrappixel/material-pro/4.2.1/horizontal/js/custom.min.js"></script>--}}
    {{--<script src="/vendor/wrappixel/material-pro/4.2.1/material-rtl/js/custom.min.js"></script>--}}
@show
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="/vendor/wrappixel/material-pro/4.2.1/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


@stack('after-scripts')

{{--ATTENTION:--}}
{{----}}
{{----}}
{{----}}

{{--This code is only for the live running demo, without the proper config key, it **DOES NOT** track anything--}}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.google_analytics') }}"></script>
@yield('js')
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '{{ config('app.google_analytics') }}');
</script>
{{-- <script>
        function orientacionLinea(x) {
           var element = document.getElementById("contenedorweb");
          if (x.matches) {
           element.classList = '';
          } else {
           element.classList = 'container-fluid';
          }
        }
        var x = window.matchMedia("(max-width: 900px)")
        orientacionLinea(x)
        x.addListener(orientacionLinea)
</script> --}}

{{----}}
{{----}}
{{----}}

@yield('scripts')

<script>
    $('.popopUserProfile').click(function () {

        if($("#popopUserProfile").hasClass("show")){
            $('#popopUserProfile').removeClass('show');
        }else{
            $('#popopUserProfile').addClass('show');
        }
    });
    $('.NavBarUserProfile').click(function () {

        if($("#NavBarUserProfile").hasClass("show")){
            $('#NavBarUserProfile').removeClass('show');
        }else{
            $('#NavBarUserProfile').addClass('show');
        }
    });
</script>
</body>

</html>
