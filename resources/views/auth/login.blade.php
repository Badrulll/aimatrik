@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/images/logo/logo-default.png') }}" alt="Logo" class="img-fluid" />
                    </a>
                </div>
                <h1 class="auth-title mt-4">Masuk GOVAIHEI</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block  shadow-lg mt-5">
                        Masuk Aplikasi
                    </button>
                </form>

                <div class="text-center mt-5 text-lg fs-4">
                    <p>
                        <a class="font-bold text-primary" href="{{ route('password.request') }}">Lupa password?</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection
