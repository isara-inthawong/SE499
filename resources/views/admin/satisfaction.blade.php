@extends('layouts.admin-layout')
@section('title', 'แบบประเมิน')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">แบบประเมิน</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">แบบประเมินความพึงพอใจกิจกรรม {{$history->activity->activity_name}}
            </div>
            <form class="form-horizontal row-border was-validated" method="post"
                action="{{route('join_activity.update', $history->activity_id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">ความเหมาะสมของวัน เวลาในการจัดกิจกรรม</div>
                                <div class="panel-body">
                                    <center>
                                        <label class="radio-inline">
                                            น้อยที่สุด
                                        </label>
                                        <label class="radio-inline" for="datetime_rate1">
                                            <input type="radio" name="datetime_rate" id="datetime_rate1"
                                                value="option1" required>1
                                        </label>
                                        <label class="radio-inline" for="datetime_rate2">
                                            <input type="radio" name="datetime_rate" id="datetime_rate2"
                                                value="option2">2
                                        </label>
                                        <label class="radio-inline" for="datetime_rate3">
                                            <input type="radio" name="datetime_rate" id="datetime_rate3"
                                                value="option2">3
                                        </label>
                                        <label class="radio-inline" for="datetime_rate4">
                                            <input type="radio" name="datetime_rate" id="datetime_rate4"
                                                value="option1">4
                                        </label>
                                        <label class="radio-inline" for="datetime_rate5">
                                            <input type="radio" name="datetime_rate" id="datetime_rate5"
                                                value="option2">5
                                        </label>
                                        <label class="radio-inline">
                                            มากที่สุด
                                        </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">ความเหมาะสมของสถานที่จัดกิจกรรม</div>
                                <div class="panel-body">
                                    <center>
                                        <label class="radio-inline">
                                            น้อยที่สุด
                                        </label>
                                        <label class="radio-inline" for="datetime_rate1">
                                            <input type="radio" name="datetime_rate" id="datetime_rate1"
                                                value="option1" required>1
                                        </label>
                                        <label class="radio-inline" for="datetime_rate2">
                                            <input type="radio" name="datetime_rate" id="datetime_rate2"
                                                value="option2">2
                                        </label>
                                        <label class="radio-inline" for="datetime_rate3">
                                            <input type="radio" name="datetime_rate" id="datetime_rate3"
                                                value="option2">3
                                        </label>
                                        <label class="radio-inline" for="datetime_rate4">
                                            <input type="radio" name="datetime_rate" id="datetime_rate4"
                                                value="option1">4
                                        </label>
                                        <label class="radio-inline" for="datetime_rate5">
                                            <input type="radio" name="datetime_rate" id="datetime_rate5"
                                                value="option2">5
                                        </label>
                                        <label class="radio-inline">
                                            มากที่สุด
                                        </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">ความพึงพอใจในภาพรวม</div>
                                <div class="panel-body">
                                    <center>
                                        <label class="radio-inline">
                                            น้อยที่สุด
                                        </label>
                                        <label class="radio-inline" for="datetime_rate1">
                                            <input type="radio" name="address_rate" id="datetime_rate1"
                                                value="option1" required>1
                                        </label>
                                        <label class="radio-inline" for="datetime_rate2">
                                            <input type="radio" name="address_rate" id="datetime_rate2"
                                                value="option2">2
                                        </label>
                                        <label class="radio-inline" for="datetime_rate3">
                                            <input type="radio" name="address_rate" id="datetime_rate3"
                                                value="option2">3
                                        </label>
                                        <label class="radio-inline" for="datetime_rate4">
                                            <input type="radio" name="address_rate" id="datetime_rate4"
                                                value="option1">4
                                        </label>
                                        <label class="radio-inline" for="datetime_rate5">
                                            <input type="radio" name="address_rate" id="datetime_rate5"
                                                value="option2">5
                                        </label>
                                        <label class="radio-inline">
                                            มากที่สุด
                                        </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">ข้อเสนอแนะอื่นๆ</div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <textarea class="form-control is-invalid" name="activity_detail"
                                            id="activity_detail" placeholder="ข้อเสนอแนะอื่นๆ"
                                            required>{{ $history->activity_detail }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                    <center>
                        <button type="submit" class="btn btn-primary" value="Save">อัพเดท</button>
                        <a href="{{url('admin/activity')}}" class="btn btn-danger">ยกเลิก</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.row-->


@endsection
@section('script')
<script type="text/javascript">
    function confirmDel(id){
        const url = $(this).attr('href');
        swal({
            title: 'คุณแน่ใจหรือไม่ที่จะลบกิจกรรม รหัส '+id+' นี้?',
            text: 'คุณจะไม่สามารถกู้คืนข้อมูลนี้ได้อีกหากลบแล้ว!',
            icon: 'warning',
            buttons: ["Cancel", "Yes, delete it!"],
        }).then(function(value) {
            if (value) {
                document.getElementById("btn-delete"+id).submit();
            }
        });
    }
</script>
@endsection
