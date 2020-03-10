<!DOCTYPE html>

<body lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
        {{-- Bootstrap css --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
        {{-- Fonts --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: bold;
                src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: bold;
                src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
            }

            body {
                font-family: "THSarabunNew";
                font-size: 1.8em;
            }

            @page {
                size: auto;
                margin: 0mm;
            }
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    </head>

    <body>
        <div class="container" id="section-to-print">
            <input type="hidden" id="img_url" value="{{url(asset('images/logo.jpg'))}}">
            <center><img id="img" src="{{url(asset('images/logo.jpg'))}}" alt="logo" height="150px"></center>
            <center>
                <h1><b>กิจกรรม {{$show->activity->activity_name}}</b></h1>
            </center>
            <div class="row">
                <div class="col-6">
                    <b>จัดวันที่</b> {{ date('d', strtotime($show->activity_date)) }}
                    {{ date('M', strtotime($show->activity_date)) }}
                    {{ date('Y', strtotime($show->activity_date)) }}
                    <br>
                    <b>เวลา</b> {{$show->activity->activity_time}} <b>น.</b>
                    <br>
                    <b>ถึงวันที่</b> {{ date('d', strtotime($show->activity_todate)) }}
                    {{ date('M', strtotime($show->activity_todate)) }}
                    {{ date('Y', strtotime($show->activity_todate)) }}
                    <br>
                    <b>เวลา</b> {{$show->activity->activity_totime}} <b>น.</b>
                    <br>
                    <b>จำนวนชั่วโมงกิจกรรมที่ได้</b> {{$show->activity->hour}} <b>ชั่วโมง</b>
                </div>
                <div class="col-6">
                    <b>รายละเอียด</b>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$show->activity->activity_detail}}
                </div>
            </div>
            <br>
            <div class="row">
                <center><b>ความพึงพอใจ</b></center>
            </div>
            <div class="row">
                <div class="col-3" style="min-width:125px;">
                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                    <p><b>ความพึงพอใจวันเวลาจัดกิจกรรม</b></p>
                    @if ($sum_date[$show->activity_id]=== 0)
                    <p>ยังไม่มีการประเเมิน</p>
                    @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id]) >= 0.1)
                    &&
                    (($sum_date[$show->activity_id]/$count_join[$show->activity_id]) <=0.5) ) <i class="far fa-star">
                        </i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                        >=0.51)
                        && (($sum_date[$show->activity_id]/$count_join[$show->activity_id]) <=0.99)) <i
                            class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                            >=
                            1) && (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                            <=1.5)) <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                >=1.51) &&
                                (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                <=1.99)) <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                    >=2) &&
                                    (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                    <=2.5)) <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                        >=2.51) &&
                                        (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                        <=2.99)) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                            >=3) &&
                                            (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                            <=3.5)) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                >=3.51) &&
                                                (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                <=3.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                    >=4) &&
                                                    (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                    <=4.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                        >=4.51) &&
                                                        (($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                        <=4.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            @elseif(($sum_date[$show->activity_id]/$count_join[$show->activity_id])
                                                            >= 5)
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            @endif
                                                            <!-- ///////////////////////////////////////////// -->

                </div>
                <div class="col-3" style="min-width:125px;">
                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                    <p><b>ความพึงพอใจสถานที่จัดกิจกรรม</b></p>
                    @if ($sum_address[$show->activity_id]=== 0)
                    <p>ยังไม่มีการประเเมิน</p>
                    @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id]) >=
                    0.1)
                    &&
                    (($sum_address[$show->activity_id]/$count_join[$show->activity_id]) <=0.5) ) <i class="far fa-star">
                        </i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                        >=0.51)
                        && (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                            >=
                            1) && (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                            <=1.5)) <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                >=1.51) &&
                                (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                <=1.99)) <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                    >=2) &&
                                    (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                    <=2.5)) <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                        >=2.51) &&
                                        (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                        <=2.99)) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                            >=3) &&
                                            (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                            <=3.5)) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                >=3.51) &&
                                                (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                <=3.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                    >=4) &&
                                                    (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                    <=4.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                        >=4.51) &&
                                                        (($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                        <=4.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            @elseif(($sum_address[$show->activity_id]/$count_join[$show->activity_id])
                                                            >= 5)
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            @endif
                                                            <!-- ///////////////////////////////////////////// -->

                </div>
                <div class="col-3" style="min-width:125px;">
                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                    <p><b>ความพึงพอใจในภาพรวม</b></p>
                    @if ($sum_overview[$show->activity_id]=== 0)
                    <p>ยังไม่มีการประเเมิน</p>
                    @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id]) >=
                    0.1)
                    &&
                    (($sum_overview[$show->activity_id]/$count_join[$show->activity_id]) <=0.5) ) <i
                        class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                        >=0.51)
                        && (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                        <=0.99)) <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                            >=
                            1) && (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                            <=1.5)) <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                >=1.51) &&
                                (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                <=1.99)) <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                    >=2) &&
                                    (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                    <=2.5)) <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                        >=2.51) &&
                                        (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                        <=2.99)) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                            >=3) &&
                                            (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                            <=3.5)) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                >=3.51) &&
                                                (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                <=3.99)) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                    >=4) &&
                                                    (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                    <=4.5)) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif((($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                        >=4.51) &&
                                                        (($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                        <=4.99)) <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            @elseif(($sum_overview[$show->activity_id]/$count_join[$show->activity_id])
                                                            >= 5)
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            @endif
                                                            <!-- ///////////////////////////////////////////// -->

                </div>
                <div class="col-3" style="min-width:125px;">
                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                    <p><b>ความพึงพอใจกิจกรรม</b></p>
                    @if ($sum_overview[$show->activity_id]=== 0)
                    <p>ยังไม่มีการประเเมิน</p>
                    @elseif(((($sum_date[$show->activity_id] + $sum_address[$show->activity_id] +
                    $sum_overview[$show->activity_id])/3)>=0.1)&&( (($sum_date[$show->activity_id] +
                    $sum_address[$show->activity_id] + $sum_overview[$show->activity_id])/3)<=0.5)) <i
                        class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif(((($sum_date[$show->activity_id] + $sum_address[$show->activity_id] +
                        $sum_overview[$show->activity_id])/3) >=0.51) &&
                        ((($sum_date[$show->activity_id] + $sum_address[$show->activity_id] +
                        $sum_overview[$show->activity_id])/3) <=0.99)) <i class="fas fa-star-half-alt">
                            </i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif(( (($sum_date[$show->activity_id] +
                            $sum_address[$show->activity_id] + $sum_overview[$show->activity_id])/3)>=
                            1) && ((($sum_date[$show->activity_id] + $sum_address[$show->activity_id]
                            + $sum_overview[$show->activity_id])/3)<=1.5)) <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                @elseif(( (($sum_date[$show->activity_id] +
                                $sum_address[$show->activity_id] +
                                $sum_overview[$show->activity_id])/3)>=1.51) &&
                                ((($sum_date[$show->activity_id] + $sum_address[$show->activity_id] +
                                $sum_overview[$show->activity_id])/3) <=1.99)) <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif(((($sum_date[$show->activity_id] +
                                    $sum_address[$show->activity_id] +
                                    $sum_overview[$show->activity_id])/3) >=2) &&
                                    ((($sum_date[$show->activity_id] +
                                    $sum_address[$show->activity_id] +
                                    $sum_overview[$show->activity_id])/3) <=2.5)) <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif(((($sum_date[$show->activity_id] +
                                        $sum_address[$show->activity_id] +
                                        $sum_overview[$show->activity_id])/3) >=2.51) && (
                                        (($sum_date[$show->activity_id] +
                                        $sum_address[$show->activity_id] +
                                        $sum_overview[$show->activity_id])/3)<=2.99)) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif(((($sum_date[$show->activity_id] +
                                            $sum_address[$show->activity_id] +
                                            $sum_overview[$show->activity_id])/3) >=3) && (
                                            (($sum_date[$show->activity_id] +
                                            $sum_address[$show->activity_id] +
                                            $sum_overview[$show->activity_id])/3)<=3.5)) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif(((($sum_date[$show->activity_id] +
                                                $sum_address[$show->activity_id] +
                                                $sum_overview[$show->activity_id])/3)>=3.51) && (
                                                (($sum_date[$show->activity_id] +
                                                $sum_address[$show->activity_id] +
                                                $sum_overview[$show->activity_id])/3)<=3.99)) <i class="fas fa-star">
                                                    </i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif(((($sum_date[$show->activity_id] +
                                                    $sum_address[$show->activity_id] +
                                                    $sum_overview[$show->activity_id])/3)>=4) &&
                                                    ((($sum_date[$show->activity_id] +
                                                    $sum_address[$show->activity_id] +
                                                    $sum_overview[$show->activity_id])/3) <=4.5)) <i
                                                        class="fas fa-star">
                                                        </i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif(((($sum_date[$show->activity_id] +
                                                        $sum_address[$show->activity_id] +
                                                        $sum_overview[$show->activity_id])/3)>=4.51) &&
                                                        ((($sum_date[$show->activity_id] +
                                                        $sum_address[$show->activity_id] +
                                                        $sum_overview[$show->activity_id])/3) <=4.99)) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            @elseif((($sum_date[$show->activity_id] +
                                                            $sum_address[$show->activity_id] +
                                                            $sum_overview[$show->activity_id])/3) >= 5)
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            @endif
                </div>
            </div>
            <hr>
            <center>
                <b>นักศึกษาที่โหวตทั้งหมด</b> {{$count_alljoin[$show->activity_id]}} <b>คน</b>
            </center>

            <div class="row">
                <b>นักศึกษาโหวตเข้าร่วมทั้งหมด</b>&nbsp;
                @if ($count_join->isEmpty())
                0
                @else
                {{$count_join[$show->activity_id]}}
                @endif
                &nbsp;
                <b>คน</b>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>เพศชาย</b> {{ $j_male }} <b>คน</b>
                </div>
                <div class="col-8">
                    <b>เพศหญิง</b> {{ $j_female }} <b>คน</b>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>วิศวกรรมซอฟต์แวร์</b> {{ $j_se }} <b>คน</b>
                </div>
                <div class="col-3">
                    <b>วิทยาการคอมพิวเตอร์</b> {{ $j_cs }} <b>คน</b>
                </div>
                <div class="col-5">
                    <b>วิทยาศาสตร์และเทคโนโลยีอาหาร</b> {{ $j_fs }} <b>คน</b>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>รหัสนักศึกษา</center>
                        </th>
                        <th scope="col">
                            <center>ชื่อ</center>
                        </th>
                        <th scope="col">
                            <center>นามสกุล</center>
                        </th>
                        <th scope="col">
                            <center>เพศ</center>
                        </th>
                        <th scope="col">
                            <center>สาขา</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($join_male_female!=null)
                    @foreach ($join_male_female as $key=> $item)
                    <tr>
                        <td>{{$item->user->student_id}}</td>
                        <td>{{$item->user->first_name}}</td>
                        <td>{{$item->user->last_name}}</td>
                        <td>{{$item->user->gender}}</td>
                        <td>{{$item->user->major->major}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <hr><br>


            @if ($count_unjoin->isEmpty())

            @else
            <div class="row"><b>นักศึกษาโหวตไม่เข้าร่วมทั้งหมด</b>&nbsp;
                @if ($count_unjoin->isEmpty())
                0
                @else
                {{$count_unjoin[$show->activity_id]}}
                @endif
                &nbsp;
                <b>คน</b>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>เพศชาย</b> {{ $unj_male }} <b>คน</b>
                </div>
                <div class="col-8">
                    <b>เพศหญิง</b> {{ $unj_female }} <b>คน</b>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>วิศวกรรมซอฟต์แวร์</b> {{ $uj_se }} <b>คน</b>
                </div>
                <div class="col-3">
                    <b>วิทยาการคอมพิวเตอร์</b> {{ $uj_cs }} <b>คน</b>
                </div>
                <div class="col-5">
                    <b>วิทยาศาสตร์และเทคโนโลยีอาหาร</b> {{ $uj_fs }} <b>คน</b>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>รหัสนักศึกษา</center>
                        </th>
                        <th scope="col">
                            <center>ชื่อ</center>
                        </th>
                        <th scope="col">
                            <center>นามสกุล</center>
                        </th>
                        <th scope="col">
                            <center>เพศ</center>
                        </th>
                        <th scope="col">
                            <center>สาขา</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($unjoin_male_female!=null)
                    @foreach ($unjoin_male_female as $key=> $item)
                    <tr>
                        <td>{{$item->user->student_id}}</td>
                        <td>{{$item->user->first_name}}</td>
                        <td>{{$item->user->last_name}}</td>
                        <td>{{$item->user->gender}}</td>
                        <td>{{$item->user->major->major}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <hr><br>
            @endif

            @if ($count_cancle_join->isEmpty())

            @else
            <div class="row">
                <b>นักศึกษายกเลิกการโหวตเข้าร่วมทั้งหมด</b>&nbsp;
                @if ($count_cancle_join->isEmpty())
                0
                @else
                {{$count_cancle_join[$show->activity_id]}}
                @endif
                &nbsp;
                <b>คน</b>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>เพศชาย</b> {{ $cancle_j_male }} <b>คน</b>
                </div>
                <div class="col-8">
                    <b>เพศหญิง</b> {{ $cancle_j_female }} <b>คน</b>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <b>วิศวกรรมซอฟต์แวร์</b> {{ $cj_se }} <b>คน</b>
                </div>
                <div class="col-3">
                    <b>วิทยาการคอมพิวเตอร์</b> {{ $cj_cs }} <b>คน</b>
                </div>
                <div class="col-5">
                    <b>วิทยาศาสตร์และเทคโนโลยีอาหาร</b> {{ $cj_fs }} <b>คน</b>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>รหัสนักศึกษา</center>
                        </th>
                        <th scope="col">
                            <center>ชื่อ</center>
                        </th>
                        <th scope="col">
                            <center>นามสกุล</center>
                        </th>
                        <th scope="col">
                            <center>เพศ</center>
                        </th>
                        <th scope="col">
                            <center>สาขา</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cancle_join_male_female!=null)
                    @foreach ($cancle_join_male_female as $key=> $item)
                    <tr>
                        <td>{{$item->user->student_id}}</td>
                        <td>{{$item->user->first_name}}</td>
                        <td>{{$item->user->last_name}}</td>
                        <td>{{$item->user->gender}}</td>
                        <td>{{$item->user->major->major}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <hr><br>
            @endif

            <center>
                <button id="printpagebutton" type="button" onclick="printpage()" class="btn btn-success">
                    <i class="fas fa-print"> พิมพ์</i>
                </button>
            </center>
            {{-- Bootstrap js --}}
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous">
            </script>
            <script type="text/javascript">
                function printpage() {
                //Get the print button and put it into a variable
                var printButton = document.getElementById("printpagebutton");
                //Set the print button visibility to 'hidden'
                printButton.style.visibility = 'hidden';
                //Print the page content
                window.print()
                printButton.style.visibility = 'visible';
            }
            </script>
    </body>

    </html>
