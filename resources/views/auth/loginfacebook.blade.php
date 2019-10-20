<?php
session(['promo' => 'si']);
?>

@extends('templates.application.master')

@section('template-custom-js')

    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>

    <script>
        $(function () {
            $("#back-to-login").click(function () {
                $("#loginform").slideDown()
                $("#recoverform").fadeOut()
            })
        })
    </script>

@endsection

@section('layout-content')
<section id="wrapper">
    <div class="login-register" style="background-image:url(/vendor/wrappixel/material-pro/4.2.1/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                    <h3 class="box-title m-b-20 text-center">Ingresa con Facebook o Google para continuar</h3>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a  class="btn btn-gl btn-facebook" href="https://app.efectylogistic.com/login/facebook"  data-toggle="tooltip" title="Ingreso con Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                                <a style="color:#fff;" href="https://app.efectylogistic.com/login/google"  class="btn btn-gl btn-googleplus" data-toggle="tooltip" title="Ingreso with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

@endsection
