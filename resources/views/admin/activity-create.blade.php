@extends('layouts.admin-layout')
@section('title', 'กิจกรรม')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">กิจกรรม</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">สร้างกิจกรรมใหม่</div>
            <div class="panel-body">
                <form class="form-horizontal row-border was-validated" method="POST"
                    action="{{route('activity.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="activity_name" class="col-md-3 control-label">ชื่อกิจกรรม</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="activity_name" id="activity_name"
                                placeholder="ชื่อกิจกรรม" value="{{ old('activity_name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_address" class="col-md-3 control-label">สถานที่จัดกิจกรรม</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_address" id="activity_address"
                                placeholder="สถานที่จัดกิจกรรม" required>{{ old('activity_address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_date" class="col-md-3 control-label">วันที่จัดกิจกรรม</label>
                        <div class="col-md-8">
                            <input class="form-control" type="date" value="{{ old('activity_date') }}"
                                name="activity_date" id="activity_date" placeholder="วว/ดด/ปป" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_time" class="col-md-3 control-label">เวลา</label>
                        <div class="col-md-8">
                            <input class="form-control" type="time" value="{{ old('activity_time') }}"
                                name="activity_time" id="activity_time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_hour" class="col-md-3 control-label">จำนวนชั่วโมง</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{ old('activity_hour') }}" type="number" min="0"
                                max="24" name="activity_hour" id="activity_hour" required
                                placeholder="จำนวนชั่วโมงกิจกรรม">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_detail" class="col-md-3 control-label">รายละเอียดกิจกรรม</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_detail" id="activity_detail"
                                placeholder="รายละเอียดกิจกรรม" required>{{ old('activity_detail') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_image" class="col-md-3 control-label">รูปกิจกรรม</label>
                        <div class="col-md-8 costom-file">
                            <input type="file" name="activity_image" class="form-control custom-file-input"
                                id="activity_image" value="{{ old('activity_image') }}" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn btn-primary" value="Save">สร้าง</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                {{-- <a href="{{ url('admin/dashboard')}}" class="btn btn-danger">Cancle</a> --}}
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
