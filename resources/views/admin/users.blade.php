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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">รายการข้อมูลผู้ใช้</div>
            <div class="panel-body btn-margins">
                <div class="col-md-12 table-responsive">
                    <table id="data_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>สาขา</th>
                                <th>สถานะผู้ใช้</th>
                                <th>เบอร์โทร</th>
                                <th>รูปภาพ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{ $item->student_id}}</td>
                                <td>{{ $item->first_name}}</td>
                                <td>{{ $item->last_name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->major->major}}</td>
                                <td>{{ $item->role->role}}</td>
                                <td>{{ $item->tel}}</td>
                                <td>
                                    @if ($item->user_image)
                                    <a href="{{url('./images/profile')}}/{{$item->user_image}}" target="_blank">
                                        {{ $item->user_image}}
                                    </a>
                                    @else
                                    ไม่มีภาพ
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ action('Admin\UserController@edit', $item->user_id) }}"
                                        class="btn-size btn btn-warning">
                                        <i class="fas fa-pencil-alt"><b> แก้ไข</b></i>
                                    </a>
                                    <form method="post" class="delete_form" id="btn-delete{{ $item->user_id }}"
                                        action="{{ action('Admin\UserController@destroy', $item->user_id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="button" class="btn-size btn btn-danger" onclick="confirmDel({{ ($key+1) }})">
                                            <i class="fas fa-trash-alt"><b> ลบ</b></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>สาขา</th>
                                <th>สถานะผู้ใช้</th>
                                <th>เบอร์โทร</th>
                                <th>รูปภาพ</th>
                                <th>จัดการ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- {{ $users->onEachSide(1)->links() }} --}}
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div>
<!--/.row-->
@endsection
@section('script')
<script type="text/javascript">
    function confirmDel(id){
        const url = $(this).attr('href');
        swal({
            title: 'คุณแน่ใจหรือไม่ที่จะลบผู้ใช้ ลำดับที่ '+id+' นี้?',
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
