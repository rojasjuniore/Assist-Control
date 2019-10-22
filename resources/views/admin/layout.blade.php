<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <div class="header">
            @include('admin.partials.navbar')
        </div>
        @include('admin.partials.sidebar')

        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    @yield('title')
                </div>
                <div class="d-flex">
                    @yield('rate')
                </div>
                <div class="col-md-7 align-self-center">
                    @yield('breadcrumb')
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                © Todo los derechos reservados
                <a href="#">Giftcard reembolsable</a>
            </footer>
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
