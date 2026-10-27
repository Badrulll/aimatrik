<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIMATRIK - @yield('title', 'AI Maturity & Governance Assessment')</title>
    <link rel="icon" href="{{  asset('assets/images/logo/logo2.png') }}" type="image/png">

    <!-- SEO -->
    <meta name="description" content="AIMATRIK - AI Maturity & Governance Assessment">
    <meta name="keywords" content="AIMATRIK, AI Maturity, AI Governance, Artificial Intelligence, Higher Education">
    <meta name="author" content="AIMATRIK">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="AIMATRIK - AI Maturity & Governance Assessment">
    <meta property="og:description" content="AI Maturity & Governance Assessment">
    <meta property="og:image" content="{{  asset('assets/images/logo/logo2.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="AIMATRIK - AI Maturity & Governance Assessment">
    <meta name="twitter:description" content="AI Maturity & Governance Assessment">
    <meta name="twitter:image" content="{{  asset('assets/images/logo/logo2.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('guest-assets/css/plugins.css') }}">

    @yield('customCss')

    <style>
        /* =========================================================
           AIMATRIK DESIGN SYSTEM
        ========================================================= */

        :root {
            --aim-red: #ed1b2f;
            --aim-red-light: #ff3145;
            --aim-red-dark: #bd1020;

            --aim-black: #101419;
            --aim-charcoal: #171c22;
            --aim-charcoal-2: #20262d;
            --aim-gray: #68717d;

            --aim-white: #ffffff;
            --aim-off-white: #f6f7f9;
            --aim-border: rgba(255, 255, 255, 0.10);

            --aim-shadow:
                0 30px 80px rgba(0, 0, 0, 0.16);

            --aim-radius: 22px;

            --aim-transition:
                cubic-bezier(.22, 1, .36, 1);
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            margin: 0;
            padding: 0;

            background:
                radial-gradient(circle at 10% 10%,
                    rgba(237, 27, 47, 0.05),
                    transparent 25%),
                var(--aim-off-white);

            color: var(--aim-black);

            font-family: 'Inter', sans-serif;

            overflow-x: hidden;
        }

        body.aim-loading {
            overflow: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.035em;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
        }


        /* =========================================================
           GLOBAL AIMATRIK BACKGROUND
        ========================================================= */

        .aimatirik-bg {
            position: fixed;

            inset: 0;

            pointer-events: none;

            overflow: hidden;

            z-index: -5;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, 0.92),
                    rgba(245, 247, 249, 0.96));
        }

        .aim-bg-grid {
            position: absolute;

            inset: 0;

            opacity: 0.20;

            background-image:
                linear-gradient(rgba(16, 20, 25, 0.045) 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    rgba(16, 20, 25, 0.045) 1px,
                    transparent 1px);

            background-size: 70px 70px;

            mask-image:
                linear-gradient(to bottom,
                    black,
                    transparent 80%);
        }

        .aim-bg-glow {
            position: absolute;

            width: 550px;
            height: 550px;

            border-radius: 50%;

            filter: blur(100px);

            opacity: 0.10;

            background: var(--aim-red);

            top: -300px;
            right: -180px;
        }

        .aim-bg-glow-two {
            position: absolute;

            width: 450px;
            height: 450px;

            border-radius: 50%;

            filter: blur(100px);

            opacity: 0.06;

            background: #1d2935;

            bottom: -200px;
            left: -150px;
        }


        /* =========================================================
           LOADING SCREEN
        ========================================================= */

        .aim-loader {
            position: fixed;

            inset: 0;

            z-index: 99999;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                radial-gradient(circle at center,
                    #252c34 0%,
                    #11151a 45%,
                    #090c10 100%);

            overflow: hidden;
        }

        .aim-loader::before {
            content: '';

            position: absolute;

            width: 80vw;
            height: 80vw;

            max-width: 900px;
            max-height: 900px;

            border: 1px solid rgba(237, 27, 47, 0.14);

            border-radius: 50%;
        }

        .aim-loader::after {
            content: '';

            position: absolute;

            width: 55vw;
            height: 55vw;

            max-width: 650px;
            max-height: 650px;

            border: 1px solid rgba(255, 255, 255, 0.05);

            border-radius: 50%;
        }

        .aim-loader-inner {
            position: relative;

            z-index: 2;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;
        }

        .aim-loader-logo-wrap {
            position: relative;

            width: 180px;
            height: 130px;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .aim-loader-logo {
            width: 180px;

            max-height: 130px;

            object-fit: contain;

            opacity: 0;

            transform: scale(0.65);
        }

        .aim-loader-orbit {
            position: absolute;

            width: 210px;
            height: 95px;

            border: 1px solid rgba(237, 27, 47, 0.45);

            border-radius: 50%;

            transform: rotate(-17deg);

            opacity: 0;
        }

        .aim-loader-orbit::before {
            content: '';

            position: absolute;

            width: 8px;
            height: 8px;

            top: 4px;
            right: 25px;

            border-radius: 50%;

            background: var(--aim-red);

            box-shadow:
                0 0 15px rgba(237, 27, 47, 0.8),
                0 0 30px rgba(237, 27, 47, 0.45);
        }

        .aim-loader-name {
            margin-top: 25px;

            color: white;

            font-family: 'Space Grotesk', sans-serif;

            font-size: 1.6rem;

            font-weight: 700;

            letter-spacing: 0.24em;

            opacity: 0;
        }

        .aim-loader-subtitle {
            margin-top: 7px;

            color: rgba(255, 255, 255, 0.55);

            font-size: 0.65rem;

            font-weight: 500;

            letter-spacing: 0.28em;

            text-transform: uppercase;

            opacity: 0;
        }

        .aim-loader-progress {
            position: relative;

            width: 180px;
            height: 2px;

            margin-top: 35px;

            overflow: hidden;

            background: rgba(255, 255, 255, 0.10);

            opacity: 0;
        }

        .aim-loader-progress-bar {
            width: 0;
            height: 100%;

            background:
                linear-gradient(90deg,
                    var(--aim-red-dark),
                    var(--aim-red-light));

            box-shadow:
                0 0 12px rgba(237, 27, 47, 0.8);
        }


        /* =========================================================
           SITE WRAPPER
        ========================================================= */

        .site-wrapper {
            position: relative;

            min-height: 100vh;

            opacity: 0;
        }


        /* =========================================================
           AIMATRIK NAVBAR
        ========================================================= */

        .aim-navbar {
            position: fixed;

            top: 0;
            left: 0;
            right: 0;

            z-index: 1000;

            padding: 18px 0;

            transition:
                padding 0.45s var(--aim-transition),
                background 0.45s var(--aim-transition),
                box-shadow 0.45s var(--aim-transition),
                transform 0.45s var(--aim-transition);
        }

        .aim-navbar.scrolled {
            padding: 10px 0;

            background:
                rgba(16, 20, 25, 0.86);

            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            box-shadow:
                0 15px 50px rgba(0, 0, 0, 0.15);
        }

        .aim-navbar-inner {
            min-height: 68px;

            padding: 8px 12px 8px 18px;

            border:
                1px solid rgba(16, 20, 25, 0.07);

            border-radius: 18px;

            background:
                rgba(255, 255, 255, 0.88);

            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            box-shadow:
                0 12px 40px rgba(16, 20, 25, 0.07);

            transition:
                background 0.45s var(--aim-transition),
                border 0.45s var(--aim-transition);
        }

        .aim-navbar.scrolled .aim-navbar-inner {
            background:
                rgba(255, 255, 255, 0.08);

            border-color:
                rgba(255, 255, 255, 0.10);

            box-shadow: none;
        }

        .aim-brand {
            display: inline-flex;

            align-items: center;

            position: relative;

            z-index: 2;
        }

        .aim-brand img {
            width: 150px;

            height: 58px;

            object-fit: contain;

            transition:
                transform 0.5s var(--aim-transition);
        }

        .aim-brand:hover img {
            transform: scale(1.035);
        }

        .aim-nav {
            display: flex;

            align-items: center;

            gap: 4px;

            margin: 0;

            padding: 0;

            list-style: none;
        }

        .aim-nav-link {
            position: relative;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 42px;

            padding: 0 13px;

            color: #59616b;

            font-size: 0.79rem;

            font-weight: 600;

            white-space: nowrap;

            transition:
                color 0.3s ease,
                transform 0.3s var(--aim-transition);
        }

        .aim-navbar.scrolled .aim-nav-link {
            color: rgba(255, 255, 255, 0.70);
        }

        .aim-nav-link::after {
            content: '';

            position: absolute;

            left: 50%;
            bottom: 2px;

            width: 0;
            height: 2px;

            border-radius: 10px;

            background: var(--aim-red);

            transform:
                translateX(-50%);

            transition:
                width 0.35s var(--aim-transition);
        }

        .aim-nav-link:hover {
            color: var(--aim-red);

            transform: translateY(-1px);
        }

        .aim-nav-link:hover::after,
        .aim-nav-link.active::after {
            width: 20px;
        }

        .aim-nav-link.active {
            color: var(--aim-red);
        }

        .aim-login {
            position: relative;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 42px;

            padding: 0 21px;

            border-radius: 12px;

            color: white !important;

            background:
                linear-gradient(135deg,
                    var(--aim-red-light),
                    var(--aim-red-dark));

            font-size: 0.78rem;

            font-weight: 700;

            overflow: hidden;

            box-shadow:
                0 8px 24px rgba(237, 27, 47, 0.22);

            transition:
                transform 0.35s var(--aim-transition),
                box-shadow 0.35s var(--aim-transition);
        }

        .aim-login::before {
            content: '';

            position: absolute;

            inset: 0;

            background:
                linear-gradient(110deg,
                    transparent 20%,
                    rgba(255, 255, 255, 0.32),
                    transparent 80%);

            transform: translateX(-120%);
        }

        .aim-login:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 12px 30px rgba(237, 27, 47, 0.35);
        }

        .aim-login:hover::before {
            animation:
                aimButtonShine 0.8s ease;
        }

        @keyframes aimButtonShine {
            to {
                transform: translateX(120%);
            }
        }

        .aim-mobile-toggle {
            width: 44px;
            height: 44px;

            border: 0;

            border-radius: 12px;

            color: var(--aim-black);

            background:
                rgba(16, 20, 25, 0.06);

            display: inline-flex;

            align-items: center;
            justify-content: center;

            font-size: 1.25rem;
        }

        .aim-navbar.scrolled .aim-mobile-toggle {
            color: white;

            background:
                rgba(255, 255, 255, 0.10);
        }


        /* =========================================================
           GENERIC REVEAL
        ========================================================= */

        .aim-reveal {
            opacity: 0;

            transform:
                translateY(50px);
        }

        .aim-reveal-left {
            opacity: 0;

            transform:
                translateX(-60px);
        }

        .aim-reveal-right {
            opacity: 0;

            transform:
                translateX(60px);
        }

        .aim-scale-reveal {
            opacity: 0;

            transform:
                scale(0.92);
        }


        /* =========================================================
           BACK TO TOP
        ========================================================= */

        #scroll-top {
            position: fixed;

            right: 25px;
            bottom: 25px;

            z-index: 990;

            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            color: white;

            background:
                var(--aim-charcoal);

            border:
                1px solid rgba(255, 255, 255, 0.10);

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.18);

            opacity: 0;
            visibility: hidden;

            transform:
                translateY(20px) scale(0.8);

            transition:
                opacity 0.35s ease,
                visibility 0.35s ease,
                transform 0.35s var(--aim-transition);
        }

        #scroll-top.show {
            opacity: 1;
            visibility: visible;

            transform:
                translateY(0) scale(1);
        }

        #scroll-top:hover {
            color: white;

            background:
                var(--aim-red);

            transform:
                translateY(-4px) scale(1.04);
        }


        /* =========================================================
           OLD THEME OVERRIDE
        ========================================================= */

        .text_color_white {
            color: #ffffff !important;
        }

        .text_color_light_white {
            color: rgba(255, 255, 255, 0.72) !important;
        }

        .bg_color_black {
            background-color: var(--aim-black) !important;
        }

        .common-btn {
            font-family: 'Inter', sans-serif;
        }


        /* =========================================================
           SELECTION
        ========================================================= */

        ::selection {
            color: white;

            background:
                var(--aim-red);
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 991.98px) {

            .aim-navbar {
                padding: 10px 0;
            }

            .aim-navbar-inner {
                min-height: 62px;
            }

            .aim-brand img {
                width: 135px;
                height: 52px;
            }

            .aim-mobile-menu {
                position: absolute;

                top: calc(100% + 10px);

                left: 12px;
                right: 12px;

                padding: 15px;

                border-radius: 18px;

                background:
                    rgba(20, 25, 31, 0.97);

                backdrop-filter: blur(20px);

                box-shadow:
                    0 25px 60px rgba(0, 0, 0, 0.25);

                display: none;
            }

            .aim-mobile-menu.show {
                display: block;
            }

            .aim-nav {
                flex-direction: column;

                align-items: stretch;

                gap: 2px;
            }

            .aim-nav-link {
                justify-content: flex-start;

                min-height: 48px;

                padding: 0 14px;

                color:
                    rgba(255, 255, 255, 0.78);
            }

            .aim-nav-link::after {
                left: 14px;

                transform: none;
            }

            .aim-login {
                width: 100%;

                margin-top: 8px;
            }

            .aim-loader-logo-wrap {
                width: 150px;
                height: 110px;
            }

            .aim-loader-logo {
                width: 150px;
            }

            .aim-loader-orbit {
                width: 175px;
            }
        }

        @media (max-width: 575.98px) {

            .aim-navbar-inner {
                padding-left: 12px;
                padding-right: 8px;
            }

            .aim-brand img {
                width: 120px;
                height: 48px;
            }

            #scroll-top {
                right: 16px;
                bottom: 16px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>


<body class="aim-loading">

    <!-- =========================================================
         AIMATRIK GLOBAL BACKGROUND
    ========================================================== -->

    <div class="aimatirik-bg">
        <div class="aim-bg-grid"></div>
        <div class="aim-bg-glow"></div>
        <div class="aim-bg-glow-two"></div>
    </div>


    <!-- =========================================================
         AIMATRIK LOADING SCREEN
    ========================================================== -->

    <div class="aim-loader" id="aimLoader">

        <div class="aim-loader-inner">

            <div class="aim-loader-logo-wrap">

                <div class="aim-loader-orbit"></div>

                <img src="{{ asset('assets/images/logo/logo2.png') }}" class="aim-loader-logo"
                    alt="AIMATRIK">

            </div>

            <div class="aim-loader-name">
                AIMATRIK
            </div>

            <div class="aim-loader-subtitle">
                AI Maturity & Governance Assessment
            </div>

            <div class="aim-loader-progress">
                <div class="aim-loader-progress-bar"></div>
            </div>

        </div>

    </div>


    <!-- =========================================================
         CUSTOM CURSOR
    ========================================================== -->

    <div class="cursor d-none d-lg-block"></div>


    <!-- =========================================================
         MAIN WEBSITE
    ========================================================== -->

    <div class="site-wrapper" id="aimSite">

        @include('guest.layouts._navbar')

        @yield('body')

    </div>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <!-- jQuery -->
    <script src="{{ asset('guest-assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Existing Plugins -->
    <script src="{{ asset('guest-assets/js/jquery.mixitup.min.js') }}"></script>

    <script src="{{ asset('guest-assets/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('guest-assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('guest-assets/js/jquery.meanmenu.min.js') }}"></script>

    <!-- Anime.js -->
    <script src="https://cdn.jsdelivr.net/npm/animejs/dist/bundles/anime.umd.min.js"></script>


    <!-- =========================================================
         AIMATRIK ANIMATION ENGINE
    ========================================================== -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const {
                animate,
                createTimeline,
                stagger
            } = anime;


            const loader = document.getElementById('aimLoader');
            const site = document.getElementById('aimSite');

            const loaderLogo =
                document.querySelector('.aim-loader-logo');

            const loaderOrbit =
                document.querySelector('.aim-loader-orbit');

            const loaderName =
                document.querySelector('.aim-loader-name');

            const loaderSubtitle =
                document.querySelector('.aim-loader-subtitle');

            const loaderProgress =
                document.querySelector('.aim-loader-progress');

            const loaderProgressBar =
                document.querySelector('.aim-loader-progress-bar');


            /* =====================================================
               LOADER TIMELINE
            ===================================================== */

            const loaderTimeline = createTimeline({

                defaults: {
                    ease: 'out(4)'
                },

                autoplay: true

            });


            loaderTimeline

                .add(loaderOrbit, {

                    opacity: [0, 1],

                    scale: [0.65, 1],

                    rotate: [-30, 330],

                    duration: 1200

                })

                .add(loaderLogo, {

                    opacity: [0, 1],

                    scale: [0.65, 1],

                    duration: 900

                }, '-=750')

                .add(loaderName, {

                    opacity: [0, 1],

                    translateY: [18, 0],

                    duration: 650

                }, '-=350')

                .add(loaderSubtitle, {

                    opacity: [0, 1],

                    translateY: [10, 0],

                    duration: 550

                }, '-=350')

                .add(loaderProgress, {

                    opacity: [0, 1],

                    duration: 400

                }, '-=250')

                .add(loaderProgressBar, {

                    width: ['0%', '100%'],

                    duration: 1200,

                    ease: 'inOut(3)'

                });


            /* =====================================================
               LOADER EXIT
            ===================================================== */

            setTimeout(function() {

                animate(loader, {

                    opacity: [1, 0],

                    scale: [1, 1.025],

                    duration: 850,

                    ease: 'inOut(3)',

                    onComplete: function() {

                        loader.style.display = 'none';

                        document.body.classList.remove(
                            'aim-loading'
                        );

                        animate(site, {

                            opacity: [0, 1],

                            translateY: [20, 0],

                            duration: 900,

                            ease: 'out(4)'

                        });

                        initializeAIMATRIK();

                    }

                });

            }, 3300);


            /* =====================================================
               MAIN INITIALIZATION
            ===================================================== */

            function initializeAIMATRIK() {

                initializeNavbar();

                initializeScrollAnimations();

                initializeBackToTop();

                initializeCursor();

                initializeMagneticButtons();

                initializeFloatingBackground();

            }


            /* =====================================================
               NAVBAR
            ===================================================== */

            function initializeNavbar() {

                const navbar =
                    document.querySelector('.aim-navbar');

                if (!navbar) return;


                function updateNavbar() {

                    if (window.scrollY > 50) {

                        navbar.classList.add('scrolled');

                    } else {

                        navbar.classList.remove('scrolled');

                    }

                }


                updateNavbar();

                window.addEventListener(
                    'scroll',
                    updateNavbar, {
                        passive: true
                    }
                );


                const links =
                    document.querySelectorAll(
                        '.aim-nav-link'
                    );


                links.forEach(function(link) {

                    link.addEventListener(
                        'click',
                        function() {

                            links.forEach(function(item) {

                                item.classList.remove(
                                    'active'
                                );

                            });

                            this.classList.add(
                                'active'
                            );

                        }
                    );

                });


                const sections =
                    document.querySelectorAll(
                        'section[id]'
                    );


                if ('IntersectionObserver' in window) {

                    const observer =
                        new IntersectionObserver(

                            function(entries) {

                                entries.forEach(function(entry) {

                                    if (entry.isIntersecting) {

                                        const id =
                                            entry.target.id;

                                        links.forEach(
                                            function(link) {

                                                const href =
                                                    link.getAttribute(
                                                        'href'
                                                    );

                                                if (href === '#' + id) {

                                                    links.forEach(
                                                        function(item) {
                                                            item.classList.remove(
                                                                'active'
                                                            );
                                                        }
                                                    );

                                                    link.classList.add(
                                                        'active'
                                                    );
                                                }

                                            }
                                        );

                                    }

                                });

                            },

                            {
                                rootMargin: '-35% 0px -55% 0px'
                            }

                        );


                    sections.forEach(function(section) {

                        observer.observe(section);

                    });

                }

            }


            /* =====================================================
               SCROLL REVEAL
            ===================================================== */

            function initializeScrollAnimations() {

                const revealElements =
                    document.querySelectorAll(
                        '.aim-reveal, .aim-reveal-left, .aim-reveal-right, .aim-scale-reveal'
                    );


                if (!revealElements.length) return;


                if (!('IntersectionObserver' in window)) {

                    revealElements.forEach(function(element) {

                        element.style.opacity = '1';

                        element.style.transform =
                            'none';

                    });

                    return;

                }


                const observer =
                    new IntersectionObserver(

                        function(entries) {

                            entries.forEach(function(entry) {

                                if (!entry.isIntersecting) return;


                                const element =
                                    entry.target;


                                let translateX = 0;
                                let translateY = 50;
                                let scale = 1;


                                if (
                                    element.classList.contains(
                                        'aim-reveal-left'
                                    )
                                ) {

                                    translateX = -60;
                                    translateY = 0;

                                }


                                if (
                                    element.classList.contains(
                                        'aim-reveal-right'
                                    )
                                ) {

                                    translateX = 60;
                                    translateY = 0;

                                }


                                if (
                                    element.classList.contains(
                                        'aim-scale-reveal'
                                    )
                                ) {

                                    translateY = 0;
                                    scale = 0.92;

                                }


                                animate(element, {

                                    opacity: [0, 1],

                                    translateX: [
                                        translateX,
                                        0
                                    ],

                                    translateY: [
                                        translateY,
                                        0
                                    ],

                                    scale: [
                                        scale,
                                        1
                                    ],

                                    duration: 1000,

                                    ease: 'out(4)'

                                });


                                observer.unobserve(
                                    element
                                );

                            });

                        },

                        {
                            threshold: 0.12
                        }

                    );


                revealElements.forEach(function(element) {

                    observer.observe(element);

                });

            }


            /* =====================================================
               BACK TO TOP
            ===================================================== */

            function initializeBackToTop() {

                const button =
                    document.getElementById(
                        'scroll-top'
                    );

                if (!button) return;


                window.addEventListener(
                    'scroll',
                    function() {

                        if (window.scrollY > 500) {

                            button.classList.add(
                                'show'
                            );

                        } else {

                            button.classList.remove(
                                'show'
                            );

                        }

                    }, {
                        passive: true
                    }
                );


                button.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();


                        animate(
                            document.documentElement, {

                                scrollTop: 0,

                                duration: 1000,

                                ease: 'out(4)'

                            }
                        );

                    }
                );

            }


            /* =====================================================
               CUSTOM CURSOR
            ===================================================== */

            function initializeCursor() {

                const cursor =
                    document.querySelector('.cursor');

                if (!cursor) return;

                if (window.innerWidth < 992) return;


                document.addEventListener(
                    'mousemove',
                    function(event) {

                        animate(cursor, {

                            left: event.clientX,

                            top: event.clientY,

                            duration: 180,

                            ease: 'out(3)'

                        });

                    }
                );


                const interactive =
                    document.querySelectorAll(
                        'a, button, .aim-card, .aim-nav-link'
                    );


                interactive.forEach(function(element) {

                    element.addEventListener(
                        'mouseenter',
                        function() {

                            animate(cursor, {

                                scale: 1.7,

                                duration: 250,

                                ease: 'out(4)'

                            });

                        }
                    );


                    element.addEventListener(
                        'mouseleave',
                        function() {

                            animate(cursor, {

                                scale: 1,

                                duration: 250,

                                ease: 'out(4)'

                            });

                        }
                    );

                });

            }


            /* =====================================================
               MAGNETIC BUTTONS
            ===================================================== */

            function initializeMagneticButtons() {

                const buttons =
                    document.querySelectorAll(
                        '.aim-login'
                    );


                buttons.forEach(function(button) {

                    button.addEventListener(
                        'mousemove',
                        function(event) {

                            const rect =
                                button.getBoundingClientRect();

                            const x =
                                event.clientX -
                                rect.left -
                                rect.width / 2;

                            const y =
                                event.clientY -
                                rect.top -
                                rect.height / 2;


                            animate(button, {

                                translateX: x * 0.12,

                                translateY: y * 0.12,

                                duration: 350,

                                ease: 'out(4)'

                            });

                        }
                    );


                    button.addEventListener(
                        'mouseleave',
                        function() {

                            animate(button, {

                                translateX: 0,

                                translateY: 0,

                                duration: 500,

                                ease: 'out(4)'

                            });

                        }
                    );

                });

            }


            /* =====================================================
               FLOATING BACKGROUND
            ===================================================== */

            function initializeFloatingBackground() {

                const glowOne =
                    document.querySelector(
                        '.aim-bg-glow'
                    );

                const glowTwo =
                    document.querySelector(
                        '.aim-bg-glow-two'
                    );


                if (glowOne) {

                    animate(glowOne, {

                        translateX: [
                            -30,
                            40,
                            -30
                        ],

                        translateY: [
                            20,
                            -25,
                            20
                        ],

                        scale: [
                            1,
                            1.12,
                            1
                        ],

                        duration: 9000,

                        ease: 'inOut(2)',

                        loop: true

                    });

                }


                if (glowTwo) {

                    animate(glowTwo, {

                        translateX: [
                            20,
                            -30,
                            20
                        ],

                        translateY: [
                            -10,
                            30,
                            -10
                        ],

                        scale: [
                            1,
                            1.08,
                            1
                        ],

                        duration: 11000,

                        ease: 'inOut(2)',

                        loop: true

                    });

                }

            }

        });
    </script>


    <!-- Existing Main JS -->
    {{-- 
        Dibiarkan untuk kompatibilitas dengan komponen lama.
        Setelah semua section selesai diredesign,
        script lama bisa kita audit dan bersihkan.
    --}}

    <script src="{{ asset('guest-assets/js/main.js') }}"></script>


    @yield('customJs')

</body>

</html>
