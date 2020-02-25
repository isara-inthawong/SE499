@extends('layouts.auth-layout')
@section('title', 'Verify Your Email Address')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(./images/auth/bg-03.jpg);">
                <span class="login100-form-title-1">
                    {{ __('ตรวจสอบที่อยู่อีเมลของคุณ') }}
                </span>
            </div>

            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('ลิงก์ยืนยันใหม่ถูกส่งไปยังที่อยู่อีเมลของคุณ.') }}
            </div>
            @endif

            {{ __('ก่อนดำเนินการต่อโปรดตรวจสอบลิงก์การยืนยันของคุณทางอีเมล.') }}
            {{ __('หากคุณไม่ได้รับอีเมล') }},
            <form class="login100-form" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="btn btn-link p-0 m-0 align-baseline">{{ __('คลิกที่นี่เพื่อขออีก') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
