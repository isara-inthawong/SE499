@extends('layouts.auth-layout')
@section('title', 'Confirm Password')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url('../images/auth/bg-03.jpg');">
                <span class="login100-form-title-1">
                    {{ __('ยืนยันรหัสผ่าน') }}
                </span>
            </div>
            {{ __(กรุณายืนยันรหัสผ่านของคุณก่อนดำเนินการต่อ.') }}
            <form class="login100-form" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="wrap-input100 m-b-18">
                    <label for="password" class="label-input100">{{ __('รหัสผ่าน') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="รหัสผ่านของคุณ" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ยืนยันรหัสผ่าน') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('ลืมรหัสผ่าน?') }}
                    </a>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
