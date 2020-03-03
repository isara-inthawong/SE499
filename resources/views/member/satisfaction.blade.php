@extends('layouts.app-layout')
@section('title', 'แบบประเมิน')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>แบบประเมินความพึงพอใจกิจกรรม {{$history->activity->activity_name}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            @if ($history->activity->assessment_status==1)
                            <form class="form-horizontal row-border was-validated" method="post"
                                action="{{route('my_history.update', $history->activity_id)}}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading clearfix">ความเหมาะสมของวัน
                                                    เวลาในการจัดกิจกรรม</div>
                                                <div class="panel-body">
                                                    <center>
                                                        <label class="radio-inline">
                                                            น้อยที่สุด
                                                        </label>
                                                        <label class="radio-inline" for="datetime_rate1">
                                                            <input type="radio" name="datetime_rate" id="datetime_rate1"
                                                                value="1" required>1
                                                        </label>
                                                        <label class="radio-inline" for="datetime_rate2">
                                                            <input type="radio" name="datetime_rate" id="datetime_rate2"
                                                                value="2">2
                                                        </label>
                                                        <label class="radio-inline" for="datetime_rate3">
                                                            <input type="radio" name="datetime_rate" id="datetime_rate3"
                                                                value="3">3
                                                        </label>
                                                        <label class="radio-inline" for="datetime_rate4">
                                                            <input type="radio" name="datetime_rate" id="datetime_rate4"
                                                                value="4">4
                                                        </label>
                                                        <label class="radio-inline" for="datetime_rate5">
                                                            <input type="radio" name="datetime_rate" id="datetime_rate5"
                                                                value="5">5
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
                                                <div class="panel-heading clearfix">ความเหมาะสมของสถานที่จัดกิจกรรม
                                                </div>
                                                <div class="panel-body">
                                                    <center>
                                                        <label class="radio-inline">
                                                            น้อยที่สุด
                                                        </label>
                                                        <label class="radio-inline" for="address_rate1">
                                                            <input type="radio" name="address_rate" id="address_rate1"
                                                                value="1" required>1
                                                        </label>
                                                        <label class="radio-inline" for="address_rate2">
                                                            <input type="radio" name="address_rate" id="address_rate2"
                                                                value="2">2
                                                        </label>
                                                        <label class="radio-inline" for="address_rate3">
                                                            <input type="radio" name="address_rate" id="address_rate3"
                                                                value="3">3
                                                        </label>
                                                        <label class="radio-inline" for="address_rate4">
                                                            <input type="radio" name="address_rate" id="address_rate4"
                                                                value="4">4
                                                        </label>
                                                        <label class="radio-inline" for="address_rate5">
                                                            <input type="radio" name="address_rate" id="address_rate5"
                                                                value="5">5
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
                                                        <label class="radio-inline" for="overview_rate1">
                                                            <input type="radio" name="overview_rate" id="overview_rate1"
                                                                value="1" required>1
                                                        </label>
                                                        <label class="radio-inline" for="overview_rate2">
                                                            <input type="radio" name="overview_rate" id="overview_rate2"
                                                                value="2">2
                                                        </label>
                                                        <label class="radio-inline" for="overview_rate3">
                                                            <input type="radio" name="overview_rate" id="overview_rate3"
                                                                value="3">3
                                                        </label>
                                                        <label class="radio-inline" for="overview_rate4">
                                                            <input type="radio" name="overview_rate" id="overview_rate4"
                                                                value="4">4
                                                        </label>
                                                        <label class="radio-inline" for="overview_rate5">
                                                            <input type="radio" name="overview_rate" id="overview_rate5"
                                                                value="5">5
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
                                                        <textarea class="form-control is-invalid" name="suggestion"
                                                            id="suggestion" placeholder="ข้อเสนอแนะอื่นๆ"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.row-->
                                    <center>
                                        <button type="submit" class="btn btn-primary" value="Save">ประเมิน</button>
                                        <a href="{{url('/history')}}" class="btn btn-danger">ยกเลิก</a>
                                    </center>
                                </div>
                            </form>
                            @else
                            <center>
                                <h1>กิจกรรมนี้ยังใม่เปิดให้ประเมิน</h1>
                            </center>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </div>
</div>




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
