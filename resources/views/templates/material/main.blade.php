@extends('templates.application.master')

{{-- ### Attributes for Layout are added here ### --}}
{{--Possibilities:  'fix-header'  'fix-sidebar' 'boxed' 'logo-center' 'single-column' --}}
{{--You can make combinations with them--}}
@section('body-classes','')

@section('template-css')
    <link href="{{ mix('/css/material/style.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/colors/blue.css') }}" id="theme" rel="stylesheet">
@endsection

@section('template-custom-js')
    <script src="/vendor/wrappixel/material-pro/4.2.1/material/js/custom.min.js"></script>
@endsection

@section('layout-content')

    @include('templates.application.includes.topbar')

    @include('templates.material.navbarleft')
    {{--@include('templates.material.left-sidebar')--}}

    <div class="page-wrapper">

        <div id="contenedorweb" class="container-fluid">

            @include('templates.application.includes.breadcrumb')

            @if (!isset($sincard))
                <div class="card">
                    <div class="card-body">
            @endif

                        @yield('content')

            @if (!isset($sincard))
                    </div>
                </div>
            @endif

            @include('templates.application.includes.right-sidebar')

        </div>

    </div>

@endsection
