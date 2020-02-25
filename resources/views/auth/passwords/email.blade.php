@extends('layouts.auth-layout')
@section('title', 'Reset Password')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(../images/auth/bg-03.jpg);">
                <span class="login100-form-title-1">
                    {{ __('รีเซ็ตรหัสผ่าน') }}
                </span>
            </div>
            <form class="login100-form" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="wrap-input100 m-b-26">
                    <label class="label-input100" for="email">{{ __('อีเมล') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="อีเมลของคุณ" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ส่งลิงค์รีเซ็ตรหัสผ่าน') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection