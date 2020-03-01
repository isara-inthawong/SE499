@extends('layouts.admin-layout')
@section('title', 'ข้อมูลผู้ใช้')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ข้อมูลผู้ใช้</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">แก้ไขข้อมูลผู้ใช้</div>
            <div class="panel-body">
                <form class="form-horizontal row-border was-validated" method="post"
                    action="{{route('users.update', $user->user_id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="student_id" class="col-md-3 control-label">รหัสนักศึกษา</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{$user->student_id}}" type="text" name="student_id"
                                id="student_id" placeholder="รหัสนักศึกษาของคุณ" autocomplete="student_id" autofocus
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_name" class="col-md-3 control-label">ชื่อ</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{$user->first_name}}" type="text" name="first_name"
                                id="first_name" placeholder="ชื่อของคุณ" autocomplete="first_name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-md-3 control-label">นามสกุล</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{$user->last_name}}" type="text" name="last_name"
                                id="last_name" placeholder="นามสกุลของคุณ" autocomplete="last_name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="major" class="col-md-3 control-label">สาขาวิชา</label>
                        <div class="col-md-5">
                            <select class="form-control profile" name="major" id="major" required autocomplete="major"
                                autofocus>
                                <option {{ $user->majo_id == '1' ? ' selected ' : ' ' }} value="1">
                                    วิศวกรรมซอฟต์แวร์</option>
                                <option {{ $user->major_id == '2' ? ' selected ' : ' ' }} value="2">
                                    วิทยาการคอมพิวเตอร์</option>
                                <option {{ $user->major_id == '3' ? ' selected ' : ' ' }} value="3">
                                    วิทยาศาสตร์และเทคโนโลยีอาหาร</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                        <div class="col-md-5">
                            <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror"
                                name="tel" value="{{ $user->tel }}" minlength="10" maxlength="10"
                                placeholder="Your Phone Number" required autocomplete="tel" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">อีเมล</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{$user->email}}" type="email" name="email" id="email"
                                autocomplete="email" autofocus required placeholder="อีเมลของคุณ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_image" class="col-md-3 control-label">รูปโปรไฟล์</label>
                        <div class="col-md-5 costom-file">
                            <input type="file" name="user_image" class="form-control custom-file-input" id="user_image"
                                accept=".png, .jpg, .jpeg" autocomplete="user_image" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">สถานะผู้ใช้</label>
                        <div class="col-md-5 costom-file">
                            <label class="form-check-label" onclick="confirmDel()">
                                <input type="radio" name="role_id" id="role1" value="1"
                                    {{ ($user->role_id=="1")? "checked" : "" }}>
                                ผู้ดูแลระบบ</label>
                            <label class="form-check-label" for="role2">
                                <input type="radio" name="role_id" id="role2" value="2"
                                    {{ ($user->role_id=="2")? "checked" : "" }}>
                                ผู้ใช้</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn btn-primary" value="Save">อัพเดท</button>
                                <a href="{{url('admin/home')}}" class="btn btn-danger">ยกเลิก</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
@endsection
@section('script')
<script type="text/javascript">
    function confirmDel(){
        const url = $(this).attr('href');
        swal({
            title: 'คุณแน่ใจหรือไม่ที่จะให้ผู้ใช้นี้เป็นผู้ดูแลระบบ?',
            text: 'ผู้ดูแลระบบจะสามารถแก้ไขหรือลบข้อมูลต่าง ๆ ได้',
            icon: 'warning',
            buttons: ["Cancel", "Yes, delete it!"],
        }).then(function(value) {
            if (value) {
                $('input#role1').prop('checked', true);
            }else{
                $('input#role2').prop('checked', true);
                $('input#role1').prop('checked', false);
            }
        });
    }
</script>
@endsection
