@extends('layouts.auth-layout')
@section('title', 'Reset Password')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title bg-img" style="background-image: url({{url('./images/auth/bg-03.jpg')}});">
                <span class="login100-form-title-1">
                    {{ __('Reset Password') }}
                </span>
            </div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form class="login100-form" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="wrap-input100 m-b-26">
                    <label class="label-input100" for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email"
                        autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
