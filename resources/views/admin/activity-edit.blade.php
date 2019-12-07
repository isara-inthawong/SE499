@extends('layouts.admin-layout')
@section('title', 'Edit Activity')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Activity</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">Edit Activity</div>
            <div class="panel-body">
                <form class="form-horizontal row-border was-validated" method="PUT"
                    action="{{route('activity.update',$activity->activity_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="activity_name" class="col-md-3 control-label">Activity Name</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_name}}" type="text"
                                name="activity_name" id="activity_name" placeholder="Your Activity Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_address" class="col-md-3 control-label">Activity Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_address" id="activity_address"
                                placeholder="Your Activity Address" required>{{ $activity->activity_address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_date" class="col-md-3 control-label">Activity Date</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_date}}" type="date"
                                name="activity_date" id="activity_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_time" class="col-md-3 control-label">Activity Time</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->activity_time}}" type="time"
                                name="activity_time" id="activity_time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_hour" class="col-md-3 control-label">Activity Hour</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{$activity->hour}}" type="number" name="activity_hour"
                                id="activity_hour" required placeholder="Your Activity Hour">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_detail" class="col-md-3 control-label">Activity Detail</label>
                        <div class="col-md-8">
                            <textarea class="form-control is-invalid" name="activity_detail" id="activity_detail"
                                placeholder="Your Activity Detail" required>{{ $activity->activity_detail }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity_image" class="col-md-3 control-label">Activity Image</label>
                        <div class="col-md-8 costom-file">
                            <input type="file" name="activity_image" class="form-control custom-file-input"
                                id="activity_image" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn btn-primary" value="Save">Save</button>
                                <a href="{{url('admin/activity')}}" class="btn btn-danger">Cancle</a>
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
