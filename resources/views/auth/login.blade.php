@extends('auth.layouts.app')

@section('title', 'Login | AIMATRIK')

@section('content')
<div class="aim-login-page">
    <div class="row g-0 min-vh-100">

        <div class="col-lg-5">
            <div class="aim-login-form-panel">
                <div class="aim-login-content">

                    <a href="{{ url('/') }}" class="aim-login-brand">
                        <img
                            src="{{ asset('assets/images/logo/logo2.png') }}"
                            alt="AIMATRIK"
                        >
                        <span class="aim-brand-divider"></span>
                        <span class="aim-brand-label">AI MATURITY & GOVERNANCE</span>
                    </a>

                    <div class="aim-login-heading">
                        <div class="aim-eyebrow">
                            <span class="aim-status-dot"></span>
                            SECURE ACCESS
                        </div>

                        <h1>
                            Selamat datang di
                            <span>AIMATRIK.</span>
                        </h1>

                        <p>
                            Masuk untuk mengakses platform evaluasi dan tata kelola
                            kecerdasan buatan.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success aim-alert" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="aim-login-form">
                        @csrf

                        <div class="aim-field-group">
                            <label for="email">Alamat email</label>

                            <div class="aim-input-wrapper">
                                <i class="bi bi-envelope" aria-hidden="true"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="@error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="nama@gmail.com"
                                    autocomplete="email"
                                    required
                                    autofocus
                                >
                            </div>

                            @error('email')
                                <div class="aim-field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="aim-field-group">
                            <div class="aim-label-row">
                                <label for="password">Kata sandi</label>
                                <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                            </div>

                            <div class="aim-input-wrapper">
                                <i class="bi bi-lock" aria-hidden="true"></i>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="@error('password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi"
                                    autocomplete="current-password"
                                    required
                                >
                                <button
                                    type="button"
                                    class="aim-password-toggle"
                                    id="togglePassword"
                                    aria-label="Tampilkan kata sandi"
                                    aria-pressed="false"
                                >
                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                </button>
                            </div>

                            @error('password')
                                <div class="aim-field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="aim-remember" for="remember">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span class="aim-custom-checkbox">
                                <i class="bi bi-check" aria-hidden="true"></i>
                            </span>
                            <span>Ingat saya</span>
                        </label>

                        <button type="submit" class="aim-submit-button">
                            <span>Login</span>
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </button>
                    </form>

                    <div class="aim-login-security">
                        <i class="bi bi-shield-check" aria-hidden="true"></i>
                        <span>Akses khusus pengguna terotorisasi</span>
                    </div>

                    <div class="aim-login-bottom">
                        <span>© {{ date('Y') }} AIMATRIK</span>
                        <span class="aim-bottom-separator"></span>
                        <span>AI Governance Framework</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-7 d-none d-lg-block">
            <aside class="aim-login-visual">
                <div class="aim-visual-top">
                    <a href="{{ url('/') }}" class="aim-visual-brand">
                    </a>

                    <span class="aim-visual-version">AI GOVERNANCE FRAMEWORK</span>
                </div>

                <div class="aim-visual-content">
                    <div class="aim-visual-label">
                        <span></span>
                        AI GOVERNANCE
                    </div>

                    <h2>
                        Membangun AI yang
                        <span>bertanggung jawab.</span>
                    </h2>

                    <p>
                        Kerangka tata kelola kecerdasan buatan yang terarah,
                        terukur, dan berkelanjutan.
                    </p>
                </div>

                <div class="aim-visual-footer">
                    <span>AIMATRIK FRAMEWORK</span>
                    <span>RESPONSIBLE AI <i class="bi bi-arrow-up-right" aria-hidden="true"></i></span>
                </div>
            </aside>
        </div>

    </div>
</div>

<style>
    :root {
        --aim-red: #ED1B2F;
        --aim-red-dark: #C91527;
        --aim-charcoal: #11161C;
        --aim-muted: #77808B;
        --aim-border: #E7E9ED;
    }

    .aim-login-page,
    .aim-login-page * {
        box-sizing: border-box;
    }

    .aim-login-page {
        min-height: 100vh;
        overflow: hidden;
        background: #fff;
        color: var(--aim-charcoal);
        font-family: "Plus Jakarta Sans", "Inter", sans-serif;
    }

    .aim-login-form-panel {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 36px clamp(24px, 5vw, 68px);
        background: #fff;
    }

    .aim-login-content {
        width: 100%;
        max-width: 390px;
        margin: auto;
    }

    .aim-login-brand {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 43px;
        color: var(--aim-charcoal);
        text-decoration: none;
    }

    .aim-login-brand img {
        display: block;
        width: 48px;
        height: 48px;
        object-fit: contain;
    }

    .aim-brand-divider {
        width: 1px;
        height: 28px;
        background: #DDE0E5;
    }

    .aim-brand-label {
        max-width: 110px;
        color: #737C87;
        font-size: 9px;
        font-weight: 750;
        line-height: 1.7;
        letter-spacing: 1px;
    }

    .aim-login-heading {
        margin-bottom: 27px;
    }

    .aim-eyebrow {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 16px;
        color: #737C87;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: 1.3px;
    }

    .aim-status-dot {
        flex: 0 0 7px;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--aim-red);
    }

    /* Force heading colors so global Bootstrap/theme rules cannot make them blue. */
    .aim-login-page .aim-login-heading h1 {
        margin: 0;
        color: var(--aim-charcoal) !important;
        font-size: clamp(29px, 2.5vw, 35px);
        font-weight: 800;
        line-height: 1.28;
        letter-spacing: -1.1px;
    }

    .aim-login-page .aim-login-heading h1 span {
        color: var(--aim-red) !important;
    }

    .aim-login-heading p {
        margin: 14px 0 0;
        color: #737C87;
        font-size: 12px;
        line-height: 1.85;
    }

    .aim-login-form {
        display: flex;
        flex-direction: column;
        gap: 17px;
    }

    .aim-field-group label {
        display: block;
        margin-bottom: 8px;
        color: #303640;
        font-size: 12px;
        font-weight: 700;
    }

    .aim-input-wrapper {
        min-height: 46px;
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 0 13px;
        border: 1px solid var(--aim-border);
        border-radius: 7px;
        background: #fff;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .aim-input-wrapper:focus-within {
        border-color: var(--aim-red);
        box-shadow: 0 0 0 3px rgba(237, 27, 47, .07);
    }

    .aim-input-wrapper > i {
        flex-shrink: 0;
        color: #929AA5;
        font-size: 15px;
        transition: color .2s ease;
    }

    .aim-input-wrapper:focus-within > i {
        color: var(--aim-red);
    }

    .aim-input-wrapper input {
        width: 100%;
        min-width: 0;
        height: 44px;
        padding: 0;
        border: 0;
        outline: 0;
        background: transparent;
        color: var(--aim-charcoal);
        font: inherit;
        font-size: 12px;
        box-shadow: none !important;
    }

    .aim-input-wrapper input::placeholder {
        color: #A8AFB8;
    }

    .aim-input-wrapper:has(input.is-invalid) {
        border-color: #DC3545;
    }

    .aim-label-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .aim-label-row a {
        margin-bottom: 8px;
        color: var(--aim-red);
        font-size: 10px;
        font-weight: 650;
        text-decoration: none;
    }

    .aim-label-row a:hover {
        color: var(--aim-red-dark);
        text-decoration: underline;
    }

    .aim-password-toggle {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px;
        border: 0;
        background: transparent;
        color: #89919C;
        font-size: 15px;
        cursor: pointer;
    }

    .aim-password-toggle:hover {
        color: var(--aim-red);
    }

    .aim-password-toggle:focus-visible {
        outline: 2px solid var(--aim-red);
        outline-offset: 2px;
        border-radius: 4px;
    }

    .aim-field-error {
        margin-top: 7px;
        color: #DC3545;
        font-size: 11px;
        line-height: 1.6;
    }

    .aim-remember {
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        gap: 9px;
        margin: -1px 0 0;
        color: #66707C;
        font-size: 11px;
        cursor: pointer;
    }

    .aim-remember input {
        position: absolute;
        width: 1px;
        height: 1px;
        overflow: hidden;
        opacity: 0;
    }

    .aim-custom-checkbox {
        width: 16px;
        height: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #D5D9DF;
        border-radius: 4px;
        background: #fff;
        color: #fff;
        transition: background .2s ease, border-color .2s ease;
    }

    .aim-custom-checkbox i {
        font-size: 11px;
        opacity: 0;
    }

    .aim-remember input:checked + .aim-custom-checkbox {
        border-color: var(--aim-red);
        background: var(--aim-red);
    }

    .aim-remember input:checked + .aim-custom-checkbox i {
        opacity: 1;
    }

    .aim-remember input:focus-visible + .aim-custom-checkbox {
        outline: 3px solid rgba(237, 27, 47, .18);
        outline-offset: 2px;
    }

    .aim-submit-button {
        width: 100%;
        min-height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        margin-top: 1px;
        padding: 9px 14px;
        border: 1px solid var(--aim-charcoal);
        border-radius: 6px;
        background: var(--aim-charcoal);
        color: #fff;
        font-family: inherit;
        font-size: 11px;
        font-weight: 750;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease;
    }

    .aim-submit-button i {
        font-size: 14px;
        transition: transform .2s ease;
    }

    .aim-submit-button:hover {
        border-color: var(--aim-red);
        background: var(--aim-red);
        color: #fff;
    }

    .aim-submit-button:hover i {
        transform: translateX(3px);
    }

    .aim-submit-button:focus-visible {
        outline: 3px solid rgba(237, 27, 47, .25);
        outline-offset: 3px;
    }

    .aim-login-security {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 22px;
        color: #8A929D;
        font-size: 10px;
    }

    .aim-login-security i {
        color: #459B73;
        font-size: 13px;
    }

    .aim-login-bottom {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 9px;
        margin-top: 32px;
        color: #9AA1AA;
        font-size: 9px;
        font-weight: 600;
    }

    .aim-bottom-separator {
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background: #C8CCD1;
    }

    .aim-alert {
        margin-bottom: 18px;
        border: 0;
        border-radius: 7px;
        font-size: 12px;
    }

    /* Simple charcoal panel */

    .aim-login-visual {
        position: relative;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        padding: 32px clamp(28px, 4vw, 55px) 24px;
        background: var(--aim-charcoal);
        color: #fff;
    }

    .aim-login-visual::after {
        position: absolute;
        top: 0;
        right: 0;
        width: 2px;
        height: 100%;
        background: var(--aim-red);
        content: "";
        opacity: .7;
    }

    .aim-visual-top,
    .aim-visual-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .aim-visual-brand {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-decoration: none;
    }

    .aim-visual-brand:hover {
        color: #fff;
    }

    .aim-brand-symbol {
        width: 30px;
        height: 30px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(237, 27, 47, .65);
        border-radius: 6px;
        color: #FF5665;
        font-size: 15px;
        font-weight: 800;
    }

    .aim-visual-version {
        color: #89929E;
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .7px;
    }

    .aim-visual-content {
        width: 100%;
        max-width: 500px;
        margin: auto 0;
        padding: 35px 0;
    }

    .aim-visual-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: #A7AFBA;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1.2px;
    }

    .aim-visual-label > span {
        width: 24px;
        height: 2px;
        flex-shrink: 0;
        background: var(--aim-red);
        transform-origin: left center;
    }

    .aim-visual-content h2 {
        max-width: 500px;
        margin: 0;
        color: #fff;
        font-size: clamp(32px, 3.2vw, 44px);
        font-weight: 800;
        line-height: 1.25;
        letter-spacing: -1.5px;
    }

    .aim-visual-content h2 span {
        color: #FF5665;
    }

    .aim-visual-content > p {
        max-width: 390px;
        margin: 16px 0 0;
        color: #A7AFBA;
        font-size: 12px;
        line-height: 1.85;
    }

    .aim-visual-footer {
        padding-top: 14px;
        border-top: 1px solid rgba(255, 255, 255, .1);
        color: #77818D;
        font-size: 8px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .aim-visual-footer i {
        margin-left: 4px;
        color: #FF5665;
    }

    @media (max-width: 991.98px) {
        .aim-login-form-panel {
            padding: 38px 25px;
        }

        .aim-login-content {
            max-width: 400px;
        }

        .aim-login-brand {
            margin-bottom: 38px;
        }
    }

    @media (max-width: 575.98px) {
        .aim-login-form-panel {
            padding: 30px 23px;
        }

        .aim-login-brand {
            margin-bottom: 34px;
        }

        .aim-login-page .aim-login-heading h1 {
            font-size: 32px;
        }

        .aim-login-bottom {
            margin-top: 27px;
        }
    }

    @media (min-width: 992px) and (max-height: 760px) {
        .aim-login-form-panel {
            padding-top: 24px;
            padding-bottom: 24px;
        }

        .aim-login-brand {
            margin-bottom: 25px;
        }

        .aim-login-heading {
            margin-bottom: 20px;
        }

        .aim-login-form {
            gap: 13px;
        }

        .aim-login-bottom {
            margin-top: 22px;
        }

        .aim-visual-content {
            padding: 24px 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .aim-login-page *,
        .aim-login-page *::before,
        .aim-login-page *::after {
            animation: none !important;
            transition-duration: .01ms !important;
            scroll-behavior: auto !important;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (passwordInput && toggleButton) {
            toggleButton.addEventListener('click', function () {
                const showPassword = passwordInput.type === 'password';

                passwordInput.type = showPassword ? 'text' : 'password';
                toggleButton.innerHTML = showPassword
                    ? '<i class="bi bi-eye-slash" aria-hidden="true"></i>'
                    : '<i class="bi bi-eye" aria-hidden="true"></i>';

                toggleButton.setAttribute(
                    'aria-label',
                    showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'
                );
                toggleButton.setAttribute('aria-pressed', String(showPassword));
            });
        }

        if (window.anime && !reduceMotion) {
            anime({
                targets: '.aim-login-content',
                opacity: [0, 1],
                translateY: [10, 0],
                duration: 550,
                easing: 'easeOutCubic'
            });

            if (window.matchMedia('(min-width: 992px)').matches) {
                anime({
                    targets: '.aim-visual-content',
                    opacity: [0, 1],
                    translateX: [12, 0],
                    duration: 650,
                    delay: 100,
                    easing: 'easeOutCubic'
                });

                anime({
                    targets: '.aim-visual-label > span',
                    scaleX: [0, 1],
                    duration: 450,
                    delay: 350,
                    easing: 'easeOutExpo'
                });
            }
        }
    });
</script>
@endsection
