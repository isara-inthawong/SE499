@extends('layouts.app-layout')
@section('title', 'โปรไฟล์')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>แก้ไขข้อมูลส่วนตัว</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                {{-- <div class="panel-heading clearfix">แก้ไขข้อมูลส่วนตัว</div> --}}
                                <div class="panel-body">
                                    <form class="form-horizontal row-border was-validated" method="post"
                                        action="{{route('my_profile.update', $user->user_id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="student_id" class="col-md-3 control-label">รหัสนักศึกษา</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{$user->student_id}}" type="text"
                                                    name="student_id" id="student_id" placeholder="รหัสนักศึกษาของคุณ"
                                                    autocomplete="student_id" autofocus required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="first_name" class="col-md-3 control-label">ชื่อ</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{$user->first_name}}" type="text"
                                                    name="first_name" id="first_name" placeholder="ชื่อของคุณ"
                                                    autocomplete="first_name" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-3 control-label">นามสกุล</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{$user->last_name}}" type="text"
                                                    name="last_name" id="last_name" placeholder="นามสกุลของคุณ"
                                                    autocomplete="last_name" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="major" class="col-md-3 control-label">สาขาวิชา</label>
                                            <div class="col-md-5">
                                                <select class="form-control profile" name="major" id="major" required
                                                    autocomplete="major" autofocus>
                                                    <option {{ $user->majo_id == '1' ? ' selected ' : ' ' }} value="1">
                                                        วิศวกรรมซอฟต์แวร์</option>
                                                    <option {{ $user->major_id == '2' ? ' selected ' : ' ' }} value="2">
                                                        วิทยาการคอมพิวเตอร์</option>
                                                    <option {{ $user->major_id == '3' ? ' selected ' : ' ' }} value="3">
                                                        วิทยาศาสตร์และเทคโนโลยีอาหาร</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tel" class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                                            <div class="col-md-5">
                                                <input id="tel" type="number"
                                                    class="form-control @error('tel') is-invalid @enderror" name="tel"
                                                    value="{{ $user->tel }}" minlength="10" maxlength="10"
                                                    placeholder="Your Phone Number" required autocomplete="tel"
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 control-label">อีเมล</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{$user->email}}" type="email"
                                                    name="email" id="email" autocomplete="email" autofocus required
                                                    placeholder="อีเมลของคุณ">
                                            </div>
                                        </div>
                                        <div class="custom-file row">
                                            <label for="user_image" class="col-md-3 control-label">รูปโปรไฟล์</label>
                                            <div class="custom-file col-md-5">
                                                <input type="file" name="user_image" class="custom-file-input"
                                                    id="user_image" accept=".png, .jpg, .jpeg"
                                                    autocomplete="user_image">
                                                <label class="custom-file-label" for="user_image">Choose
                                                    file...</label>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <center>
                                                    <button type="submit" class="btn btn-primary"
                                                        value="Save">อัพเดท</button>
                                                    <a href="{{url('/home')}}" class="btn btn-danger">ยกเลิก</a>
                                                </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
