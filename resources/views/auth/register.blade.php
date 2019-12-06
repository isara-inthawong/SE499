@extends('layouts.auth-layout')
@section('title', 'Register')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(./images/auth/bg-04.jpg);">
                <span class="login100-form-title-1">
                    {{ __('Register') }}
                </span>
            </div>
            <form class="login100-form was-validated" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="first_name">{{ __('First Name') }}</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ old('first_name') }}" placeholder="Your Firsi Name" required
                        autocomplete="first_name" autofocus>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="last_name">{{ __('Last Name') }}</label>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" placeholder="Your Last Name" required
                        autocomplete="last_name" autofocus>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="tel">{{ __('Tel') }}</label>
                    <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel"
                        value="{{ old('tel') }}" minlength="10" maxlength="10" placeholder="Your Phone Number" required
                        autocomplete="tel" autofocus>
                    @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="major">{{ __('Major') }}</label>
                    <select class="form-control" name="major" id="major" class="@error('major') is-invalid @enderror"
                        name="major" value="{{ old('major') }}" required autocomplete="major" autofocus>
                        <option selected>Your Major</option>
                        <option value="SE">Software Engineering</option>
                        <option value="CS">CS</option>
                        <option value="FS">FS</option>
                    </select>
                    @error('major')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
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

                <div class="wrap-input100 m-b-10">
                    <label for="password" class="label-input100">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Your Password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label for="password-confirm" class="label-input100c">{{ __('Confirm') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Your Password" required autocomplete="new-password">
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="flex-sb-m w-full p-b-5">
                    <div class="contact100-form-checkbox"></div>
                    <div>
                        <a href="{{ route('login') }}">
                            {{ __("Don't have an Account? Login now!") }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
