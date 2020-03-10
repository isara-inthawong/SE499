@extends('layouts.admin-layout')
@section('title', 'ประวัติการเข้าร่วม')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ประวัติการเข้าร่วมทุกกิจกรรม</h1>
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
                                <th>ลำดับ</th>
                                <th>กิจกรรม</th>
                                {{-- <th>รหัสนักศึกษา</th> --}}
                                <th>ชื่อผู้เข้าร่วม</th>
                                <th>ความพึงพอใจวันเวลาจัดกิจกรรม</th>
                                <th>ความพึงพอใจสถานที่จัดกิจกรรม</th>
                                <th>ความพึงพอใจในภาพรวม</th>
                                <th>ความพึงพอใจกิจกรรม</th>
                                <th>ข้อเสนอแนะ</th>
                                {{-- <th>โหวต</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $key => $value)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $value->activity->activity_name }}</td>
                                <td>{{ $value->user->first_name }}</td>
                                {{-- <td>{{ $count_join[$value->activity_id] }}</td> --}}
                                <td style="min-width:125px;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if ($value->date_time_rate === null)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif(($value->date_time_rate >= 0.1)
                                    &&
                                    ($value->date_time_rate <=0.5) ) <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(($value->date_time_rate
                                        >=0.51)
                                        && ($value->date_time_rate <=0.99)) <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(($value->date_time_rate
                                            >=
                                            1) && ($value->date_time_rate
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(($value->date_time_rate
                                                >=1.51) &&
                                                ($value->date_time_rate
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(($value->date_time_rate
                                                    >=2) &&
                                                    ($value->date_time_rate
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(($value->date_time_rate
                                                        >=2.51) &&
                                                        ($value->date_time_rate
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif(($value->date_time_rate
                                                            >=3) &&
                                                            ($value->date_time_rate
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif(($value->date_time_rate
                                                                >=3.51) &&
                                                                ($value->date_time_rate
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif(($value->date_time_rate
                                                                    >=4) &&
                                                                    ($value->date_time_rate
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif(($value->date_time_rate
                                                                        >=4.51) &&
                                                                        ($value->date_time_rate
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif($value->date_time_rate
                                                                            >= 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            @endif
                                                                            <!-- ///////////////////////////////////////////// -->

                                </td>
                                <td style="min-width:125px;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if ($value->address_rate === null)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif(($value->address_rate >=
                                    0.1)
                                    &&
                                    ($value->address_rate <=0.5) ) <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(($value->address_rate
                                        >=0.51)
                                        && ($value->address_rate
                                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(($value->address_rate
                                            >=
                                            1) && ($value->address_rate
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(($value->address_rate
                                                >=1.51) &&
                                                ($value->address_rate
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(($value->address_rate
                                                    >=2) &&
                                                    ($value->address_rate
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(($value->address_rate
                                                        >=2.51) &&
                                                        ($value->address_rate
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif(($value->address_rate
                                                            >=3) &&
                                                            ($value->address_rate
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif(($value->address_rate
                                                                >=3.51) &&
                                                                ($value->address_rate
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif(($value->address_rate
                                                                    >=4) &&
                                                                    ($value->address_rate
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif(($value->address_rate
                                                                        >=4.51) &&
                                                                        ($value->address_rate
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif($value->address_rate
                                                                            >= 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            @endif
                                                                            <!-- ///////////////////////////////////////////// -->

                                </td>
                                <td style="min-width:125px;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if ($value->overview_rate === null)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif(($value->overview_rate >=
                                    0.1)
                                    &&
                                    ($value->overview_rate <=0.5) ) <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(($value->overview_rate
                                        >=0.51)
                                        && ($value->overview_rate
                                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(($value->overview_rate
                                            >=
                                            1) && ($value->overview_rate
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(($value->overview_rate
                                                >=1.51) &&
                                                ($value->overview_rate
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(($value->overview_rate
                                                    >=2) &&
                                                    ($value->overview_rate
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(($value->overview_rate
                                                        >=2.51) &&
                                                        ($value->overview_rate
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif(($value->overview_rate
                                                            >=3) &&
                                                            ($value->overview_rate
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif(($value->overview_rate
                                                                >=3.51) &&
                                                                ($value->overview_rate
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif(($value->overview_rate
                                                                    >=4) &&
                                                                    ($value->overview_rate
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif(($value->overview_rate
                                                                        >=4.51) &&
                                                                        ($value->overview_rate
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif($value->overview_rate
                                                                            >= 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            @endif
                                                                            <!-- ///////////////////////////////////////////// -->

                                </td>
                                <td style="min-width:125px;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if ($value->date_time_rate === null)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif(((($value->date_time_rate + $value->address_rate +
                                    $value->overview_rate)/3)>=0.1)&&( (($value->date_time_rate +
                                    $value->address_rate +$value->overview_rate)/3)<=0.5)) <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(((($value->date_time_rate + $value->address_rate +
                                        $value->overview_rate)/3) >=0.51) &&
                                        ((($value->date_time_rate + $value->address_rate +
                                        $value->overview_rate)/3) <=0.99)) <i class="fas fa-star-half-alt">
                                            </i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(( (($value->date_time_rate +
                                            $value->address_rate +$value->overview_rate)/3)>=
                                            1) && ((($value->date_time_rate + $value->address_rate
                                            +$value->overview_rate)/3)<=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(( (($value->date_time_rate +
                                                $value->address_rate +
                                                $value->overview_rate)/3)>=1.51) &&
                                                ((($value->date_time_rate + $value->address_rate +
                                                $value->overview_rate)/3) <=1.99)) <i class="fas fa-star">
                                                    </i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(((($value->date_time_rate +
                                                    $value->address_rate +
                                                    $value->overview_rate)/3) >=2) &&
                                                    ((($value->date_time_rate +
                                                    $value->address_rate +
                                                    $value->overview_rate)/3) <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(((($value->date_time_rate +
                                                        $value->address_rate +
                                                        $value->overview_rate)/3) >=2.51) && (
                                                        (($value->date_time_rate +
                                                        $value->address_rate +
                                                        $value->overview_rate)/3)<=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif(((($value->date_time_rate +
                                                            $value->address_rate +
                                                            $value->overview_rate)/3) >=3) && (
                                                            (($value->date_time_rate +
                                                            $value->address_rate +
                                                            $value->overview_rate)/3)<=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif(((($value->date_time_rate +
                                                                $value->address_rate +
                                                                $value->overview_rate)/3)>=3.51) && (
                                                                (($value->date_time_rate +
                                                                $value->address_rate +
                                                                $value->overview_rate)/3)<=3.99)) <i
                                                                    class="fas fa-star">
                                                                    </i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif(((($value->date_time_rate +
                                                                    $value->address_rate +
                                                                    $value->overview_rate)/3)>=4) &&
                                                                    ((($value->date_time_rate +
                                                                    $value->address_rate +
                                                                    $value->overview_rate)/3) <=4.5)) <i
                                                                        class="fas fa-star">
                                                                        </i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif(((($value->date_time_rate +
                                                                        $value->address_rate +
                                                                        $value->overview_rate)/3)>=4.51) &&
                                                                        ((($value->date_time_rate +
                                                                        $value->address_rate +
                                                                        $value->overview_rate)/3) <=4.99)) <i
                                                                            class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif((($value->date_time_rate +
                                                                            $value->address_rate +
                                                                            $value->overview_rate)/3) >= 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            @endif
                                                                            <!-- ///////////////////////////////////////////// -->

                                </td>
                                <td>
                                    @if ($value->suggestion!=null)
                                    {{ $value->suggestion }}
                                    @else
                                    <center>-</center>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ลำดับ</th>
                                <th>กิจกรรม</th>
                                {{-- <th>รหัสนักศึกษา</th> --}}
                                <th>ชื่อผู้เข้าร่วม</th>
                                <th>ความพึงพอใจวันเวลาจัดกิจกรรม</th>
                                <th>ความพึงพอใจสถานที่จัดกิจกรรม</th>
                                <th>ความพึงพอใจในภาพรวม</th>
                                <th>ความพึงพอใจกิจกรรม</th>
                                <th>ข้อเสนอแนะ</th>
                                {{-- <th>โหวต</th> --}}
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
