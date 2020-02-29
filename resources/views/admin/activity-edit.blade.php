@extends('layouts.admin-layout')
@section('title', 'Activity')
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
            <div class="panel-heading clearfix">แก้ไขกิจกรรม</div>
            <div class="panel-body">
                <form class="form-horizontal row-border was-validated" method="post"
                    action="{{route('activity-update.update', $activity->activity_id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="activity_name" class="col-md-3 control-label">ชื่อกิจกรรม</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_name}}" type="text"
                                name="activity_name" id="activity_name" placeholder="ชื่อกิจกรรม" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_address" class="col-md-3 control-label">สถานที่จัดกิจกรรม</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_address" id="activity_address"
                                placeholder="สถานที่จัดกิจกรรม" required>{{ $activity->activity_address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_date" class="col-md-3 control-label">วันที่</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_date}}" type="date"
                                name="activity_date" id="activity_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_time" class="col-md-3 control-label">เวลา</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_time}}" type="time"
                                name="activity_time" id="activity_time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_hour" class="col-md-3 control-label">จำนวนชั่วโมง</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->hour}}" type="number" name="activity_hour"
                                id="activity_hour" required placeholder="จำนวนชั่วโมง">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_detail" class="col-md-3 control-label">รายละเอียด</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_detail" id="activity_detail"
                                placeholder="รายละเอียด" required>{{ $activity->activity_detail }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_image" class="col-md-3 control-label">รูป</label>
                        <div class="col-md-8 costom-file">
                            <input type="file" name="activity_image" class="form-control custom-file-input"
                                id="activity_image" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn btn-primary" value="Save">อัพเดท</button>
                                <a href="{{url('admin/activity')}}" class="btn btn-danger">ยกเลิก</a>
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
