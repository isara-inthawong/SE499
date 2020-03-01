@extends('layouts.auth-layout')
@section('title', 'Register')
@section('content')
<style>
    .selecct_color {
        color: #dbdbdb;
    }
</style>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(./images/auth/bg-04.jpg);">
                <span class="login100-form-title-1">
                    {{ __('สมัครสมาชิก') }}
                </span>
            </div>
            <form class="login100-form was-validated" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="student_id">{{ __('รหัสนักศึกษา') }}</label>
                    <input id="student_id" type="number"
                        class="student_id form-control @error('student_id') is-invalid @enderror" name="student_id"
                        value="{{ old('student_id') }}" minlength="10" maxlength="10" placeholder="รหัสนักศึกษาของคุณ"
                        required autocomplete="student_id" autofocus>
                    @error('student_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="first_name">{{ __('ชื่อ') }}</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ old('first_name') }}" placeholder="ชื่อของคุณ" required
                        autocomplete="first_name" autofocus>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="last_name">{{ __('นามสกุล') }}</label>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" placeholder="นามสกุลของคุณ" required
                        autocomplete="last_name" autofocus>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10" style="display:inline-block;">
                    <label class="label-input100">{{ __('เพศ') }}</label>
                    <div>
                        <label for="gender1">
                            <input type="radio" class="@error('tel') is-invalid @enderror" name="gender" id="gender1"
                                value="ชาย" required> ชาย
                        </label>
                        <label for="gender2">
                            <input type="radio" class="@error('tel') is-invalid @enderror" name="gender" id="gender2"
                                value="หญิง"> หญิง
                        </label>
                    </div>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="tel">{{ __('เบอร์โทรศัพท์') }}</label>
                    <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel"
                        value="{{ old('tel') }}" minlength="10" maxlength="10" placeholder="เบอร์โทรศัพท์ของคุณ"
                        required autocomplete="tel" autofocus>
                    @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="major">{{ __('สาขาวิชา') }}</label>
                    <select class="form-control" name="major" id="major" class="@error('major') is-invalid @enderror"
                        name="major" value="{{ old('major') }}" required autocomplete="major" autofocus>
                        {{ (request()->is('admin/activity/create')||request()->is('admin/activity')) ? 'active' : '' }}
                        <option selected class="selecct_color" value="">สาขาวิชาของคุณ</option>
                        <option value="1">วิศวกรรมซอฟต์แวร์</option>
                        <option value="2">วิทยาการคอมพิวเตอร์</option>
                        <option value="3">วิทยาศาสตร์และเทคโนโลยีอาหาร</option>
                    </select>
                    @error('major')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label class="label-input100" for="email">{{ __('อีเมล') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="อีเมลของคุณ" required autocomplete="email"
                        autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label for="password" class="label-input100">{{ __('รหัสผ่าน') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="รหัสผ่านของคุณ" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 m-b-10">
                    <label for="password-confirm" class="label-input100c">{{ __('ยืนยันรหัสผ่าน') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="ยืนยันรหัสผ่านของคุณ" required autocomplete="new-password">
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('สมัครสมาชิก') }}
                    </button>
                </div>
                <div class="flex-sb-m w-full p-b-5">
                    <div class="contact100-form-checkbox"></div>
                    <div>
                        <a href="{{ route('login') }}">
                            {{ __("มีบัญชีผู้ใช้อยู่แล้ว ลงชื่อเข้าใช้ตอนนี้!") }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
