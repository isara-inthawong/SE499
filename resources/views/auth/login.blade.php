@extends('layouts.auth-layout')
@section('title', 'Login')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(./images/auth/bg-01.jpg);">
                {{-- <div class="login100-form-title" style="background-image: url(./images/auth/bg-02.jpg);"> --}}
                {{-- <div class="login100-form-title" style="background-image: url(./images/auth/bg-03.jpg);"> --}}
                {{-- <div class="login100-form-title" style="background-image: url(./images/auth/bg-04.jpg);"> --}}
                <span class="login100-form-title-1">
                    {{ __('Login') }}
                </span>
            </div>

            <form class="login100-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 m-b-26">
                    <label class="label-input100" for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-18">
                    <label for="password" class="label-input100">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Your Password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <label class="" for="remember">
                            <input class="" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox"></div>
                    <div>
                        <a href="{{ route('register') }}">
                            {{ __("New user? Create new account!") }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
