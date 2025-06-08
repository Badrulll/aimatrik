<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('guest-assets/images/logo/favicon.ico') }}" type="image/gif" sizes="20x20">

    <!-- Meta Tags for SEO -->
    <meta name="description" content="GOVAIHEI App">
    <meta name="keywords" content="Layanan, Teknologi, Solusi, Digital, Landing Page">
    <meta name="author" content="GOVAIHEI App">
    <meta name="robots" content="index, follow"> <!-- Pastikan halaman diindeks oleh mesin pencari -->

    <!-- Open Graph Meta Tags (untuk sharing di media sosial) -->
    <meta property="og:title" content="{{ config('app.name') }} - @yield('title')">
    <meta property="og:description" content="GOVAIHEI App.">
    <meta property="og:image" content="{{ asset('guest-assets/images/logo/logo-only.png') }}">
    <!-- Gambar yang digunakan untuk preview di media sosial -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Cards Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }} - @yield('title')">
    <meta name="twitter:description" content="GOVAIHEI App">
    <meta name="twitter:image" content="{{ asset('guest-assets/images/logo/logo-only.png') }}">

    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('guest-assets/css/plugins.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('guest-assets/css/style.css') }}">

    @yield('customCss')
</head>


<body>

    <!-- Custom Cursor -->

    <div class="cursor d-none d-lg-block"></div>

    <!-- Custom Cursor End -->

    <!-- Preloader -->

    <div class="preloader">
        <div class="spinner-wrap">
            <div class="preloader-logo">
                <img src="{{ asset('guest-assets/images/logo/logo-only.png') }}" style="height: 4rem" alt="" class="img-fluid">
            </div>
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Preloader End -->

    <!-- back to to button start-->
    <a href="#" id="scroll-top" class="back-to-top-btn"><i class="bi bi-arrow-up"></i></a>
    <!-- back to to button end-->

    <!-- Header area -->


    <div class="site-wrapper">
        @include('guest.layouts._navbar')
        {{-- Navbar --}}

        @yield('body')
    </div>

    <!-- Jquery JS -->
    <script src="{{ asset('guest-assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('guest-assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- MixItUp JS -->
    <script src="{{ asset('guest-assets/js/jquery.mixitup.min.js') }}"></script>

    <!-- Swiper Carousel JS -->
    <script src="{{ asset('guest-assets/js/swiper-bundle.min.js') }}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{ asset('guest-assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Mean menu JS -->
    <script src="{{ asset('guest-assets/js/jquery.meanmenu.min.js') }}"></script>

    <!-- gsap JS -->
    <script src="{{ asset('guest-assets/js/gsap.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('guest-assets/js/main.js') }}"></script>

    @yield('customJs')
</body>

</html>
