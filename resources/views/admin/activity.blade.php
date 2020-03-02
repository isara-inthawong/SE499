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
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $key => $item)
                            <tr>
                                <td>{{ $item->activity_id }}</td>
                                <td>{{ $item->activity_name }}</td>
                                <td>{{ $item->activity_date }}</td>
                                <td>{{ $item->activity_time }}</td>
                                <td>{{ $item->hour }}</td>
                                <td>{{ $item->activity_address }}</td>
                                <td style="min-width:200px">{{ $item->activity_detail }}</td>
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
                                    <a href="{{ action('Admin\ActivityController@edit', $item->activity_id) }}"
                                        class="btn-size btn btn-warning">
                                        <i class="fas fa-pencil-alt"><b> แก้ไข</b></i>
                                    </a>

                                    <form method="post" class="delete_form" id="btn-delete{{ $item->activity_id }}"
                                        action="{{ action('Admin\ActivityController@destroy', $item->activity_id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="button" class="btn-size btn btn-danger"
                                            onclick="confirmDel({{ $item->activity_id }})">
                                            <i class="fas fa-trash-alt"><b> ลบ</b></i>
                                        </button>
                                    </form>
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
                                <th>จัดการ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
