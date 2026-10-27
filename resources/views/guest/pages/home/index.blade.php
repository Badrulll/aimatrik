@extends('guest.layouts.app')

@section('title', 'Home')

@section('customCss')

    <style>
        /* =========================================================
           AIMATRIK HOME PAGE (OPTIMIZED)
        ========================================================= */

        .aim-home {
            position: relative;
            overflow: hidden;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .aim-hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 150px 0 100px;
            overflow: hidden;
            background:
                radial-gradient(circle at 75% 45%,
                    rgba(237, 27, 47, 0.14),
                    transparent 28%),
                radial-gradient(circle at 20% 80%,
                    rgba(20, 25, 31, 0.08),
                    transparent 30%),
                #f7f8fa;
        }

        /* Grid: tanpa mask-image (berat), diganti overlay gradient */
        .aim-hero-grid {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.45;
            background-image:
                linear-gradient(rgba(20, 25, 31, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(20, 25, 31, 0.035) 1px, transparent 1px);
            background-size: 80px 80px;
        }

        .aim-hero-grid::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(247, 248, 250, 0) 0%,
                    rgba(247, 248, 250, 0) 10%,
                    #f7f8fa 95%);
        }


        /* =========================================================
           HERO DECORATION
        ========================================================= */

        .aim-hero-decoration {
            position: absolute;
            pointer-events: none;
            border-radius: 50%;
        }

        .aim-hero-orbit-one {
            width: 620px;
            height: 250px;
            right: -100px;
            top: 50%;
            border: 1px solid rgba(237, 27, 47, 0.15);
            transform: translateY(-50%) rotate(-18deg);
        }

        .aim-hero-orbit-two {
            width: 470px;
            height: 180px;
            right: -30px;
            top: 50%;
            border: 1px solid rgba(20, 25, 31, 0.08);
            transform: translateY(-50%) rotate(-18deg);
        }

        .aim-hero-orbit-three {
            width: 800px;
            height: 320px;
            right: -190px;
            top: 50%;
            border: 1px solid rgba(237, 27, 47, 0.06);
            transform: translateY(-50%) rotate(-18deg);
        }

        .aim-hero-orbit-dot {
            position: absolute;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: var(--aim-red);
            box-shadow:
                0 0 0 5px rgba(237, 27, 47, 0.08),
                0 0 18px rgba(237, 27, 47, 0.4);
            animation: aimDotFloat 3.5s ease-in-out infinite;
        }

        .aim-dot-one {
            right: 25%;
            top: 25%;
        }

        .aim-dot-two {
            right: 10%;
            bottom: 25%;
            width: 7px;
            height: 7px;
            background: var(--aim-black);
            box-shadow: 0 0 0 5px rgba(16, 20, 25, 0.05);
            animation-duration: 4.2s;
        }

        .aim-dot-three {
            right: 42%;
            bottom: 16%;
            width: 5px;
            height: 5px;
            animation-duration: 4.9s;
        }


        /* =========================================================
           HERO CONTENT
           (tanpa opacity:0 pada judul -> LCP langsung terbaca)
        ========================================================= */

        .aim-hero-content {
            position: relative;
            z-index: 5;
        }

        .aim-hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            padding: 8px 13px;
            border: 1px solid rgba(237, 27, 47, 0.18);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.92);
            color: var(--aim-red);
            font-size: 0.70rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            animation: aimFadeUp 0.65s cubic-bezier(.22, 1, .36, 1) both;
        }

        .aim-hero-kicker::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--aim-red);
            box-shadow: 0 0 0 5px rgba(237, 27, 47, 0.08);
        }

        .aim-hero-title {
            margin: 0;
            max-width: 780px;
            color: var(--aim-black);
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(3rem, 6vw, 6.4rem);
            line-height: 0.94;
            font-weight: 700;
            letter-spacing: -0.065em;
            /* hanya transform, TIDAK ada opacity 0 */
            animation: aimTitleIn 0.9s cubic-bezier(.22, 1, .36, 1) both;
        }

        .aim-hero-title .aim-highlight {
            position: relative;
            display: inline-block;
            color: var(--aim-red);
        }

        .aim-hero-title .aim-highlight::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 100%;
            height: 5px;
            border-radius: 20px;
            background: linear-gradient(90deg, var(--aim-red), transparent);
            transform: scaleX(0);
            transform-origin: left;
            animation: aimUnderline 1.1s cubic-bezier(.22, 1, .36, 1) 0.9s forwards;
        }

        .aim-hero-description {
            max-width: 620px;
            margin-top: 30px;
            margin-bottom: 0;
            color: #68717d;
            font-size: clamp(0.95rem, 1.4vw, 1.08rem);
            line-height: 1.85;
            animation: aimFadeUp 0.7s cubic-bezier(.22, 1, .36, 1) 0.35s both;
        }

        .aim-hero-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 38px;
            animation: aimFadeUp 0.6s cubic-bezier(.22, 1, .36, 1) 0.55s both;
        }

        .aim-hero-scroll {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #68717d;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .aim-scroll-line {
            width: 42px;
            height: 1px;
            background: var(--aim-red);
        }


        /* =========================================================
           HERO VISUAL
        ========================================================= */

        .aim-hero-visual {
            position: relative;
            min-height: 650px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 4;
            animation: aimVisualIn 1s cubic-bezier(.22, 1, .36, 1) 0.2s both;
        }

        .aim-logo-stage {
            position: relative;
            width: min(580px, 100%);
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.7s cubic-bezier(.22, 1, .36, 1);
            will-change: transform;
        }

        .aim-logo-halo {
            position: absolute;
            width: 75%;
            height: 75%;
            border-radius: 50%;
            background: radial-gradient(circle,
                    rgba(237, 27, 47, 0.13),
                    rgba(237, 27, 47, 0.025) 45%,
                    transparent 70%);
            animation: aimHalo 4.5s ease-in-out infinite;
        }

        .aim-logo-ring {
            position: absolute;
            width: 76%;
            height: 76%;
            border: 1px solid rgba(237, 27, 47, 0.14);
            border-radius: 50%;
            animation: aimRingIn 0.9s cubic-bezier(.22, 1, .36, 1) 0.4s both;
        }

        .aim-logo-ring-two {
            width: 88%;
            height: 88%;
            border-color: rgba(20, 25, 31, 0.08);
            animation-delay: 0.3s;
        }

        .aim-logo-ring-three {
            width: 100%;
            height: 100%;
            border-color: rgba(237, 27, 47, 0.05);
            animation-delay: 0.5s;
        }

        .aim-logo {
            position: relative;
            z-index: 5;
            width: 82%;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 18px 28px rgba(16, 20, 25, 0.14));
            will-change: transform;
            animation:
                aimLogoIn 0.9s cubic-bezier(.22, 1, .36, 1) both,
                aimLogoFloat 5s ease-in-out 1s infinite;
        }

        .aim-logo-orbit {
            position: absolute;
            z-index: 6;
            width: 82%;
            height: 28%;
            border: 2px solid rgba(237, 27, 47, 0.65);
            border-radius: 50%;
            transform: rotate(-20deg);
            animation: aimOrbitSpin 9s linear infinite;
        }

        .aim-logo-orbit::before {
            content: '';
            position: absolute;
            top: -5px;
            right: 17%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--aim-red);
            box-shadow:
                0 0 0 6px rgba(237, 27, 47, 0.08),
                0 0 20px rgba(237, 27, 47, 0.45);
        }

        .aim-floating-card {
            position: absolute;
            z-index: 10;
            padding: 13px 16px;
            border: 1px solid rgba(16, 20, 25, 0.07);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 14px 30px rgba(16, 20, 25, 0.09);
            will-change: transform;
            animation:
                aimCardIn 0.65s cubic-bezier(.22, 1, .36, 1) 0.9s both,
                aimCardFloat 4s ease-in-out 1.6s infinite;
        }

        .aim-floating-card small {
            display: block;
            margin-bottom: 3px;
            color: #89919b;
            font-size: 0.60rem;
            font-weight: 700;
            letter-spacing: 0.10em;
            text-transform: uppercase;
        }

        .aim-floating-card strong {
            color: var(--aim-black);
            font-size: 0.78rem;
            font-weight: 800;
        }

        .aim-card-one {
            top: 18%;
            left: 5%;
        }

        .aim-card-two {
            right: 2%;
            bottom: 21%;
            animation-delay: 1.05s, 2.1s;
            animation-duration: 0.65s, 4.5s;
        }

        .aim-card-three {
            left: 8%;
            bottom: 12%;
            animation-delay: 1.2s, 2.6s;
            animation-duration: 0.65s, 5s;
        }


        /* =========================================================
           KEYFRAMES
        ========================================================= */

        @keyframes aimFadeUp {
            from {
                opacity: 0;
                transform: translate3d(0, 22px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes aimTitleIn {
            from {
                transform: translate3d(0, 40px, 0);
            }

            to {
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes aimUnderline {
            to {
                transform: scaleX(1);
            }
        }

        @keyframes aimVisualIn {
            from {
                opacity: 0;
                transform: translate3d(60px, 0, 0) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0) scale(1);
            }
        }

        @keyframes aimRingIn {
            from {
                opacity: 0;
                transform: scale(0.85);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes aimLogoIn {
            from {
                opacity: 0;
                transform: scale(0.8) rotate(-3deg);
            }

            to {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes aimLogoFloat {

            0%,
            100% {
                transform: translate3d(0, -8px, 0) rotate(-0.8deg);
            }

            50% {
                transform: translate3d(0, 8px, 0) rotate(0.8deg);
            }
        }

        @keyframes aimHalo {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.65;
            }

            50% {
                transform: scale(1.08);
                opacity: 1;
            }
        }

        @keyframes aimOrbitSpin {
            from {
                transform: rotate(-20deg);
            }

            to {
                transform: rotate(340deg);
            }
        }

        @keyframes aimCardIn {
            from {
                opacity: 0;
                transform: translate3d(0, 25px, 0) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0) scale(1);
            }
        }

        @keyframes aimCardFloat {

            0%,
            100% {
                transform: translate3d(0, -8px, 0);
            }

            50% {
                transform: translate3d(0, 8px, 0);
            }
        }

        @keyframes aimDotFloat {

            0%,
            100% {
                transform: translate3d(5px, -10px, 0) scale(0.85);
            }

            50% {
                transform: translate3d(-5px, 10px, 0) scale(1.15);
            }
        }


        /* Hentikan semua animasi hero saat tidak terlihat */
        .aim-hero.is-paused *,
        .aim-hero.is-paused *::before,
        .aim-hero.is-paused *::after {
            animation-play-state: paused !important;
        }


        /* =========================================================
           SECTION DIVIDER
        ========================================================= */

        .aim-section-line {
            position: relative;
            width: 100%;
            height: 1px;
            overflow: hidden;
            background: rgba(16, 20, 25, 0.07);
        }

        .aim-section-line::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20%;
            height: 100%;
            background: var(--aim-red);
            transform: translateX(-100%);
        }

        .aim-section-line.is-active::after {
            transform: translateX(500%);
            transition: transform 1.4s cubic-bezier(.22, 1, .36, 1);
        }


        /* =========================================================
           LEGACY CONTENT COMPATIBILITY
        ========================================================= */

        .blog-img {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
            border-radius: 18px;
        }

        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s var(--aim-transition);
        }

        .blog-img:hover img {
            transform: scale(1.06);
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 991.98px) {

            .aim-hero {
                min-height: auto;
                padding-top: 150px;
                padding-bottom: 80px;
            }

            .aim-hero-content {
                text-align: center;
            }

            .aim-hero-kicker {
                margin-left: auto;
                margin-right: auto;
            }

            .aim-hero-title {
                font-size: clamp(2.8rem, 10vw, 4.8rem);
            }

            .aim-hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .aim-hero-actions {
                justify-content: center;
            }

            .aim-hero-visual {
                min-height: 520px;
                margin-top: 35px;
            }

            .aim-logo-stage {
                width: min(520px, 92vw);
            }

            .aim-card-one {
                left: 0;
            }

            .aim-card-two {
                right: 0;
            }

            /* Matikan dekorasi paling berat di layar kecil */
            .aim-hero-orbit-three,
            .aim-hero-grid {
                display: none;
            }

            .aim-hero-orbit-dot {
                animation: none;
            }
        }

        @media (max-width: 575.98px) {

            .aim-hero {
                padding-top: 130px;
            }

            .aim-hero-title {
                font-size: clamp(2.55rem, 14vw, 4rem);
                line-height: 0.98;
            }

            .aim-hero-description {
                font-size: 0.88rem;
                line-height: 1.7;
            }

            .aim-hero-visual {
                min-height: 410px;
            }

            .aim-logo-stage {
                width: 100%;
            }

            .aim-floating-card {
                padding: 10px 12px;
                /* di HP: hanya animasi masuk, tanpa float terus-menerus */
                animation: aimCardIn 0.65s cubic-bezier(.22, 1, .36, 1) 0.9s both;
            }

            .aim-floating-card small {
                font-size: 0.52rem;
            }

            .aim-floating-card strong {
                font-size: 0.68rem;
            }

            .aim-card-one {
                top: 12%;
            }

            .aim-card-two {
                bottom: 18%;
            }

            .aim-card-three {
                bottom: 5%;
            }
        }


        /* Hormati pengaturan "reduce motion" */
        @media (prefers-reduced-motion: reduce) {

            .aim-hero *,
            .aim-hero *::before,
            .aim-hero *::after {
                animation: none !important;
                transition: none !important;
            }

            .aim-hero-title .aim-highlight::after {
                transform: scaleX(1);
            }
        }
    </style>

@endsection


@section('customJs')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =========================================================
               SAMAKAN TINGGI SERVICE BOX (setelah semua aset termuat)
            ========================================================= */
            if (window.jQuery) {
                window.addEventListener('load', function() {
                    let maxHeight = 0;
                    const $boxes = $('.service-box-dynamic');

                    $boxes.each(function() {
                        const height = $(this).outerHeight();
                        if (height > maxHeight) {
                            maxHeight = height;
                        }
                    });

                    if (maxHeight > 0) {
                        $boxes.outerHeight(maxHeight);
                    }
                });
            }


            /* =========================================================
               HERO: pause animasi saat di luar layar
            ========================================================= */
            const hero = document.querySelector('.aim-hero');
            const heroStage = document.querySelector('.aim-logo-stage');

            if (hero && 'IntersectionObserver' in window) {
                const heroObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        hero.classList.toggle('is-paused', !entry.isIntersecting);
                    });
                }, {
                    threshold: 0
                });

                heroObserver.observe(hero);
            }


            /* =========================================================
               HERO MOUSE PARALLAX (ringan: rAF + CSS transition)
            ========================================================= */
            if (hero && heroStage && window.innerWidth >= 992 &&
                !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {

                let ticking = false;
                let targetX = 0;
                let targetY = 0;

                hero.addEventListener('mousemove', function(event) {
                    const rect = hero.getBoundingClientRect();

                    targetX = ((event.clientX - rect.left) / rect.width - 0.5) * 16;
                    targetY = ((event.clientY - rect.top) / rect.height - 0.5) * 12;

                    if (!ticking) {
                        ticking = true;
                        requestAnimationFrame(function() {
                            heroStage.style.transform =
                                'translate3d(' + targetX + 'px,' + targetY + 'px,0)';
                            ticking = false;
                        });
                    }
                }, {
                    passive: true
                });

                hero.addEventListener('mouseleave', function() {
                    heroStage.style.transform = 'translate3d(0,0,0)';
                });
            }


            /* =========================================================
               SECTION LINE REVEAL (pakai class, bukan inject <style>)
            ========================================================= */
            const sectionLines = document.querySelectorAll('.aim-section-line');

            if ('IntersectionObserver' in window) {
                const lineObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add('is-active');
                        lineObserver.unobserve(entry.target);
                    });
                }, {
                    threshold: 0.5
                });

                sectionLines.forEach(function(line) {
                    lineObserver.observe(line);
                });
            } else {
                sectionLines.forEach(function(line) {
                    line.classList.add('is-active');
                });
            }


            /* =========================================================
               ANIME.JS: hanya untuk section Visi & Struktur
               (dijalankan saat section terlihat)
            ========================================================= */
            if (typeof anime === 'undefined' || !('IntersectionObserver' in window)) {
                return;
            }

            const {
                animate,
                createTimeline,
                stagger
            } = anime;


            /* ---------------------------------------------------------
               VISION SECTION
            --------------------------------------------------------- */
            const visionSection = document.querySelector('.aim-vision-section');

            if (visionSection) {

                const visionLabel = visionSection.querySelector('.aim-vision-label');
                const visionTitle = visionSection.querySelector('.aim-vision-title');
                const visionCaption = visionSection.querySelector('.aim-vision-caption');
                const visionCard = visionSection.querySelector('.aim-vision-card');

                const visionObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        const visionTimeline = createTimeline({
                            defaults: {
                                ease: 'out(4)'
                            }
                        });

                        visionTimeline
                            .add(visionLabel, {
                                opacity: [0, 1],
                                translateY: [25, 0],
                                duration: 600
                            })
                            .add(visionTitle, {
                                opacity: [0, 1],
                                translateY: [45, 0],
                                duration: 850
                            }, '-=300')
                            .add(visionCaption, {
                                opacity: [0, 1],
                                translateY: [20, 0],
                                duration: 600
                            }, '-=500')
                            .add(visionCard, {
                                opacity: [0, 1],
                                translateX: [70, 0],
                                scale: [.96, 1],
                                duration: 1000,
                                ease: 'out(4)'
                            }, '-=600');

                        visionObserver.unobserve(visionSection);
                    });
                }, {
                    threshold: .2
                });

                visionObserver.observe(visionSection);
            }


            /* ---------------------------------------------------------
               STRUCTURE SECTION
            --------------------------------------------------------- */
            const structureSection = document.querySelector('.aim-structure-section');

            if (structureSection) {

                const structureHeading = structureSection.querySelector('.aim-structure-heading');
                const frameworkVisual = structureSection.querySelector('.aim-framework-visual');
                const frameworkLine = structureSection.querySelector('.aim-framework-line');
                const frameworkNodes = structureSection.querySelectorAll('.aim-framework-node');
                const frameworkLabels = structureSection.querySelectorAll('.aim-framework-label');

                const structureObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        const structureTimeline = createTimeline({
                            defaults: {
                                ease: 'out(4)'
                            }
                        });

                        structureTimeline
                            .add(structureHeading, {
                                opacity: [0, 1],
                                translateY: [45, 0],
                                duration: 800
                            })
                            .add(frameworkVisual, {
                                opacity: [0, 1],
                                translateY: [50, 0],
                                duration: 800
                            }, '-=500')
                            .add(frameworkLine, {
                                scaleX: [0, 1],
                                duration: 1200,
                                ease: 'inOut(3)'
                            }, '-=500')
                            .add(frameworkNodes, {
                                opacity: [0, 1],
                                scale: [.4, 1],
                                duration: 700,
                                delay: stagger(160)
                            }, '-=700')
                            .add(frameworkLabels, {
                                opacity: [0, 1],
                                translateY: [15, 0],
                                duration: 500,
                                delay: stagger(100)
                            }, '-=450');

                        /* Node breathing */
                        frameworkNodes.forEach(function(node, index) {
                            animate(node, {
                                scale: [1, 1.06, 1],
                                duration: 2800 + (index * 450),
                                ease: 'inOut(2)',
                                loop: true
                            });
                        });

                        structureObserver.unobserve(structureSection);
                    });
                }, {
                    threshold: .2
                });

                structureObserver.observe(structureSection);
            }

        });
    </script>

@endsection


@section('body')

    <div class="aim-home">

        {{-- =====================================================
         AIMATRIK HERO
    ====================================================== --}}

        <section class="aim-hero" id="home">

            <div class="aim-hero-grid"></div>


            <!-- Decorative orbit -->

            <div class="aim-hero-decoration aim-hero-orbit-one">
            </div>

            <div class="aim-hero-decoration aim-hero-orbit-two">
            </div>

            <div class="aim-hero-decoration aim-hero-orbit-three">
            </div>


            <div class="aim-hero-orbit-dot aim-dot-one">
            </div>

            <div class="aim-hero-orbit-dot aim-dot-two">
            </div>

            <div class="aim-hero-orbit-dot aim-dot-three">
            </div>


            <div class="container position-relative">

                <div class="row align-items-center">


                    <div class="col-lg-6">

                        <div class="aim-hero-content">

                            {{-- <div class="aim-hero-kicker">

                                AIMATRIK

                            </div> --}}


                            <h1 class="aim-hero-title">

                                AI
                                <span class="aim-highlight">
                                    MATURITY & GOVERNANCE
                                </span>
                               ASSESSMENT

                            </h1>


                            <p class="aim-hero-description">

                                Model Tata Kelola Kecerdasan Buatan (AI)
                                di Pendidikan Tinggi Berbasis CMMI

                            </p>


                            <div class="aim-hero-actions">

                                <a href="#visi" class="aim-login">
                                    Explore AIMATRIK
                                </a>


                                <a href="#struktur" class="aim-hero-scroll">

                                    <span class="aim-scroll-line"></span>

                                    Explore Model

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                             HERO VISUAL
                        ================================================== -->

                    <div class="col-lg-6">

                        <div class="aim-hero-visual">

                            <div class="aim-logo-stage">

                                <div class="aim-logo-halo">
                                </div>


                                <div class="aim-logo-ring aim-logo-ring-two">
                                </div>


                                <div class="aim-logo-ring">
                                </div>


                                <div class="aim-logo-ring aim-logo-ring-three">
                                </div>


                                <img src="{{ asset('assets/images/logo/logo2.png') }}"
                                    alt="AIMATRIK - AI Maturity & Governance Assessment" class="aim-logo"
                                    fetchpriority="high" decoding="async">
{{-- 
                                <div class="aim-logo-orbit"> --}}
                                </div>


                                <div class="aim-floating-card aim-card-one">

                                    <small>
                                        Assessment
                                    </small>

                                    <strong>
                                        AI Maturity
                                    </strong>

                                </div>


                                <div class="aim-floating-card aim-card-two">

                                    <small>
                                        Framework
                                    </small>

                                    <strong>
                                        AI Governance
                                    </strong>

                                </div>


                                <div class="aim-floating-card aim-card-three">

                                    <small>
                                        Foundation
                                    </small>

                                    <strong>
                                        CMMI Based
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <div class="aim-section-line"></div>

        @include('guest.pages.home._visi_section')

        @include('guest.pages.home._about_section')

        @include('guest.pages.home._main_section')

    </div>

@endsection