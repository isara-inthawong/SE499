@extends('layouts.admin-layout')
@section('title', 'ประวัติการเข')
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>กิจกรรม</th>
                                <th>จำนวนผู้เข้าร่วม</th>
                                <th>โหวต</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $key => $value)
                            <tr>
                                <td>{{ $value->activity->activity_name }}</td>
                                <td>{{ $count_history[$value->activity_id] }}</td>
                                <td>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $history->onEachSide(1)->links() }}
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
