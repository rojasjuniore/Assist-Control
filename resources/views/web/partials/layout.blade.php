<!DOCTYPE html>

<html>

<head>

    <!-- Meta-Information -->

    <title>{{ env('APP_NAME') }}</title>

    <meta charset="utf-8">

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Vendor: Bootstrap 4 Stylesheets  -->

    <link rel="stylesheet" href="{{ asset('/css/web/bootstrap.min.css') }}" type="text/css">



    <!-- Our Website CSS Styles -->

    <link rel="stylesheet" href="{{ asset('/css/web/icons.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('/css/web/owl.carousel.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('/css/web/main.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('/css/web/color.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('/css/web/responsive.css') }}" type="text/css">

</head>

<body>

    <main>

        <header class="stck">

            <div class="container">

                <div class="mnu-sc">

                    @include('web.partials.navbar')

                </div>

            </div>

        </header><!-- Header -->

        <div class="rpnsv-hdr">

            @include('web.partials.responsive-header')

        </div>

        <!-- Responsive Header -->

        <section id="home">

            @include('web.partials.home')

        </section>

        <section id="services">

            @include('web.partials.services')

        </section>

        <section>

            @include('web.partials.accordion')

        </section>

        <section id="about">

            @include('web.partials.about')

        </section>



        <section id="contact">

            @include('web.partials.contact')

        </section> 

        <footer>

            @include('web.partials.footer')

        </footer>

    </main>



    <!-- Vendor: Javascripts -->

    <script src="{{ asset('js/web/jquery.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/web/bootstrap.min.js') }}" type="text/javascript"></script>



    <!-- Our Website Javascripts -->

    <script src="{{ asset('js/web/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/web/jquery.counterup.js') }}"></script>

    {{-- <script src="{{ asset('js/web/waypoints.min.js') }}"></script> --}}

    <script src="{{ asset('js/web/scroll-up-bar.min.js') }}"></script>

    <script src="{{ asset('js/web/jquery.poptrox.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4XGd9qpQIEkbfL6QpR6qk2jQ9S9_5Uww"></script>

    <script src="{{ asset('js/web/main.js') }}"></script>

</body>

</html>