@extends('layouts.admin-layout')
@section('title', 'ประวัติการเข้าร่วม')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ประวัติการเข้าร่วมแต่ละกิจกรรม</h1>
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
                                <th>จำนวนผู้เข้าร่วม</th>
                                <th>ความพึงพอใจวันเวลาจัดกิจกรรม</th>
                                <th>ความพึงพอใจสถานที่จัดกิจกรรม</th>
                                <th>ความพึงพอใจในภาพรวม</th>
                                <th>ความพึงพอใจกิจกรรม</th>
                                <th>โหวต</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $key => $value)
                            <tr>
                                <td>{{ $value->activity_id }}</td>
                                <td>{{ $value->activity->activity_name }}</td>
                                <td>{{ $count_join[$value->activity_id] }}</td>
                                <td style="min-width:125px;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if ($sum_date[$value->activity_id]=== 0)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id]) >= 0.1)
                                    &&
                                    (($sum_date[$value->activity_id]/$count_join[$value->activity_id]) <=0.5) ) <i
                                        class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                        >=0.51)
                                        && (($sum_date[$value->activity_id]/$count_join[$value->activity_id]) <=0.99))
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                            >=
                                            1) && (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                >=1.51) &&
                                                (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                    >=2) &&
                                                    (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                        >=2.51) &&
                                                        (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                            >=3) &&
                                                            (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                >=3.51) &&
                                                                (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                    >=4) &&
                                                                    (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif((($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                        >=4.51) &&
                                                                        (($sum_date[$value->activity_id]/$count_join[$value->activity_id])
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(($sum_date[$value->activity_id]/$count_join[$value->activity_id])
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
                                    @if ($sum_address[$value->activity_id]=== 0)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id]) >=
                                    0.1)
                                    &&
                                    (($sum_address[$value->activity_id]/$count_join[$value->activity_id]) <=0.5) ) <i
                                        class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                        >=0.51)
                                        && (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                            >=
                                            1) && (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                >=1.51) &&
                                                (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                    >=2) &&
                                                    (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                        >=2.51) &&
                                                        (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                            >=3) &&
                                                            (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                >=3.51) &&
                                                                (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                    >=4) &&
                                                                    (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif((($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                        >=4.51) &&
                                                                        (($sum_address[$value->activity_id]/$count_join[$value->activity_id])
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(($sum_address[$value->activity_id]/$count_join[$value->activity_id])
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
                                    @if ($sum_overview[$value->activity_id]=== 0)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id]) >=
                                    0.1)
                                    &&
                                    (($sum_overview[$value->activity_id]/$count_join[$value->activity_id]) <=0.5) ) <i
                                        class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                        >=0.51)
                                        && (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                            >=
                                            1) && (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                            <=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                >=1.51) &&
                                                (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                <=1.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                    >=2) &&
                                                    (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                    <=2.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                        >=2.51) &&
                                                        (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                        <=2.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                            >=3) &&
                                                            (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                            <=3.5)) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                >=3.51) &&
                                                                (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                <=3.99)) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                    >=4) &&
                                                                    (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                    <=4.5)) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif((($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                        >=4.51) &&
                                                                        (($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
                                                                        <=4.99)) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(($sum_overview[$value->activity_id]/$count_join[$value->activity_id])
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
                                    @if ($sum_overview[$value->activity_id]=== 0)
                                    <p>ยังไม่มีการประเเมิน</p>
                                    @elseif(((($sum_date[$value->activity_id] + $sum_address[$value->activity_id] +
                                    $sum_overview[$value->activity_id])/3)>=0.1)&&( (($sum_date[$value->activity_id] +
                                    $sum_address[$value->activity_id] + $sum_overview[$value->activity_id])/3)<=0.5)) <i
                                        class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(((($sum_date[$value->activity_id] + $sum_address[$value->activity_id] +
                                        $sum_overview[$value->activity_id])/3) >=0.51) &&
                                        ((($sum_date[$value->activity_id] + $sum_address[$value->activity_id] +
                                        $sum_overview[$value->activity_id])/3) <=0.99)) <i class="fas fa-star-half-alt">
                                            </i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(( (($sum_date[$value->activity_id] +
                                            $sum_address[$value->activity_id] + $sum_overview[$value->activity_id])/3)>=
                                            1) && ((($sum_date[$value->activity_id] + $sum_address[$value->activity_id]
                                            + $sum_overview[$value->activity_id])/3)<=1.5)) <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(( (($sum_date[$value->activity_id] +
                                                $sum_address[$value->activity_id] +
                                                $sum_overview[$value->activity_id])/3)>=1.51) &&
                                                ((($sum_date[$value->activity_id] + $sum_address[$value->activity_id] +
                                                $sum_overview[$value->activity_id])/3) <=1.99)) <i class="fas fa-star">
                                                    </i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(((($sum_date[$value->activity_id] +
                                                    $sum_address[$value->activity_id] +
                                                    $sum_overview[$value->activity_id])/3) >=2) &&
                                                    ((($sum_date[$value->activity_id] +
                                                    $sum_address[$value->activity_id] +
                                                    $sum_overview[$value->activity_id])/3) <=2.5)) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(((($sum_date[$value->activity_id] +
                                                        $sum_address[$value->activity_id] +
                                                        $sum_overview[$value->activity_id])/3) >=2.51) && (
                                                        (($sum_date[$value->activity_id] +
                                                        $sum_address[$value->activity_id] +
                                                        $sum_overview[$value->activity_id])/3)<=2.99)) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif(((($sum_date[$value->activity_id] +
                                                            $sum_address[$value->activity_id] +
                                                            $sum_overview[$value->activity_id])/3) >=3) && (
                                                            (($sum_date[$value->activity_id] +
                                                            $sum_address[$value->activity_id] +
                                                            $sum_overview[$value->activity_id])/3)<=3.5)) <i
                                                                class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif(((($sum_date[$value->activity_id] +
                                                                $sum_address[$value->activity_id] +
                                                                $sum_overview[$value->activity_id])/3)>=3.51) && (
                                                                (($sum_date[$value->activity_id] +
                                                                $sum_address[$value->activity_id] +
                                                                $sum_overview[$value->activity_id])/3)<=3.99)) <i
                                                                    class="fas fa-star">
                                                                    </i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif(((($sum_date[$value->activity_id] +
                                                                    $sum_address[$value->activity_id] +
                                                                    $sum_overview[$value->activity_id])/3)>=4) &&
                                                                    ((($sum_date[$value->activity_id] +
                                                                    $sum_address[$value->activity_id] +
                                                                    $sum_overview[$value->activity_id])/3) <=4.5)) <i
                                                                        class="fas fa-star">
                                                                        </i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif(((($sum_date[$value->activity_id] +
                                                                        $sum_address[$value->activity_id] +
                                                                        $sum_overview[$value->activity_id])/3)>=4.51) &&
                                                                        ((($sum_date[$value->activity_id] +
                                                                        $sum_address[$value->activity_id] +
                                                                        $sum_overview[$value->activity_id])/3) <=4.99))
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                            @elseif((($sum_date[$value->activity_id] +
                                                                            $sum_address[$value->activity_id] +
                                                                            $sum_overview[$value->activity_id])/3) >= 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            @endif
                                                                            <!-- ///////////////////////////////////////////// -->

                                </td>
                                <td>
                                    @if ($value->activity->assessment_status == 0)
                                    <form method="post" action="{{route('join_activity.update', $value->activity_id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="join" value="1">
                                        <button type="submit" class="join-btn-size2 btn btn-primary">
                                            <i class="fas fa-book"><b> เปิดประเมิน</b></i>
                                        </button>
                                    </form>
                                    @else
                                    <form method="post" action="{{route('join_activity.update', $value->activity_id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="join" value="0">
                                        <button type="submit" class="join-btn-size2 btn btn-danger">
                                            <i class="fas fa-book"><b> ปิดประเมิน</b></i>
                                        </button>
                                    </form>
                                    @endif
                                    <a href="{{ action('Admin\HistoryController@show', $value->activity_id) }}"
                                        class="join-btn-size2 btn btn-warning">
                                        <i class="fas fa-file-pdf"><b> โหลด PDF</b></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ลำดับ</th>
                                <th>กิจกรรม</th>
                                <th>จำนวนผู้เข้าร่วม</th>
                                <th>ความพึงพอใจวันเวลาจัดกิจกรรม</th>
                                <th>ความพึงพอใจสถานที่จัดกิจกรรม</th>
                                <th>ความพึงพอใจในภาพรวม</th>
                                <th>ความพึงพอใจกิจกรรม</th>
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
