@extends('layouts.app-layout')
@section('title', 'ประวัติการเข้าร่วม')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>ประวัติการเข้าร่วม</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body btn-margins">
                                <div class="col-md-12 table-responsive">
                                    <table id="data_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>กิจกรรม</th>
                                                <th>วันจัดกิจกรรม</th>
                                                <th>สถานะ</th>
                                                <th>โหวต</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($history as $key => $value)
                                            <tr>
                                                <td>{{ ($key+1) }}</td>
                                                <td>{{ $value->activity->activity_name }}</td>
                                                <td>{{ date('d-M-Y', strtotime($value->activity->activity_date)) }}</td>
                                                <td>{{ $value->state }}</td>
                                                <td>
                                                    @if (($value->activity->assessment_status == 1)&&
                                                    ($value->date_time_rate == null))
                                                    <a href="{{ action('Member\HistoryController@edit', $value->activity_id) }}"
                                                        class="join-btn-size2 btn btn-warning">
                                                        <i class="fas fa-star"><b> ประเมิน</b></i>
                                                    </a>
                                                    @elseif($value->date_time_rate != null)
                                                    <p>ประเมินแล้ว</p>
                                                    @elseif($value->state=="เข้าร่วม")
                                                    <p>รอเปิดการประเมิน</p>
                                                    @endif


                                                    @if (($value->state=="เข้าร่วม" || $value->state=="ไม่เข้าร่วม")&&$value->date_time_rate == null)
                                                    <form method="post"
                                                        action="{{ action('Member\HistoryController@store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="activity_id"
                                                            value="{{ $value->activity_id }}">
                                                        <input type="hidden" name="state" value="ยกเลิก">
                                                        <button type="submit" class="join-btn-size2 btn btn-danger">
                                                            <i class="fas fa-times"><b> ยกเลิก</b></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>กิจกรรม</th>
                                                <th>วันจัดกิจกรรม</th>
                                                <th>สถานะ</th>
                                                <th>โหวต</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.panel-->
                    </div><!-- /.col-->
                </div>
                <!--/.row-->

            </div>
        </div>
    </div>
</div>


{{-- // then listen out for that id in your SA script --}}


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
