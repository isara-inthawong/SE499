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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">รายการกิจกรรม</div>
            <div class="panel-body btn-margins">
                <div class="col-md-12 table-responsive">
                    <table id="data_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>วันที่</th>
                                <th>เวลา</th>
                                <th>ชั่วโมง</th>
                                <th>สถานที่</th>
                                <th>รายละเอียด</th>
                                <th>รูปภาพ</th>
                                <th>สถานะ</th>
                                <th>โหวต</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $item)
                            <tr>
                                <td>{{ $item->activity_id}}</td>
                                <td>{{ $item->activity_name}}</td>
                                <td>{{ $item->activity_date}}</td>
                                <td>{{ $item->activity_time}}</td>
                                <td>{{ $item->hour}}</td>
                                <td>{{ $item->activity_address}}</td>
                                <td>{{ $item->activity_detail}}</td>
                                <td>
                                    @if ($item->activity_image)
                                    <a href="{{url('./images/activity')}}/{{$item->activity_image}}" target="_blank">
                                        {{ $item->activity_image}}
                                    </a>
                                    @else
                                    ไม่มีภาพ
                                    @endif
                                </td>
                                <td>
                                    @if ($item->history->state)
                                    {{ $item->history->state}}
                                    @else
                                    รอ
                                    @endif
                                </td>
                                <td>

                                    @if ($item->history->user_id != Auth::user()->user_id)
                                    <form method="post" action="{{ action('Admin\HistoryController@store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="activity_id" value="{{ $item->activity_id }}">
                                        <input type="hidden" name="state" value="เข้าร่วม">
                                        <button type="submit" class="join-btn-size btn btn-primary">
                                            <i class="fas fa-check"><b> เข้าร่วม</b></i>
                                        </button>
                                    </form>
                                    <form method="post" action="{{ action('Admin\HistoryController@store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="activity_id" value="{{ $item->activity_id }}">
                                        <input type="hidden" name="state" value="ไม่เข้าร่วม">
                                        <button type="submit" class="join-btn-size btn btn-danger">
                                            <i class="fas fa-times"><b> ไม่เข้าร่วม</b></i>
                                        </button>
                                    </form>
                                    @else

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>วันที่</th>
                                <th>เวลา</th>
                                <th>ชั่วโมง</th>
                                <th>สถานที่</th>
                                <th>รายละเอียด</th>
                                <th>รูปภาพ</th>
                                <th>สถานะ</th>
                                <th>โหวต</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- {{ $activity->onEachSide(1)->links() }} --}}
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div>
<!--/.row-->

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
