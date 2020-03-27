<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
                <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">

            </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success"
           href="{{ route('login') }}">Login</a>

    </div>
</nav><!-- /.navbar -->


@yield('header')

{{-- START MAIN CONTENT --}}
@yield('content')
{{-- END MAIN CONTENT --}}

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <img src="{{ asset('img/footer.png') }}" alt="">
            </div>

            <div class="col-lg-8 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="https://www.facebook.com/ximevheevhee"><i
                            class="fa fa-facebook fa-2x"></i></a>
                    <a class="social-twitter" href="https://twitter.com/lym_pedia"><i
                            class="fa fa-twitter fa-2x"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/kkkkaaaa_20"><i
                            class="fa fa-instagram fa-2x"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/divianis"><i
                            class="fa fa-dribbble fa-2x"></i></a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset('js/page.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e1ed9cc3d9ae986"></script>

</body>
</html>
