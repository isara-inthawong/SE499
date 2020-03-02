@extends('layouts.admin-layout')
@section('title', 'แดชบอร์ด')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">แดชบอร์ด</h1>
    </div>
</div>
<!--/.row-->

<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding">
                    <i class="far fa-xl fa-calendar-alt color-blue"></i>
                    <div class="large">{{ $countData['activity'] }}</div>
                    <div class="text-muted">กิจกรรมทั้งหมด</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large">{{ $countData['user'] }}</div>
                    <div class="text-muted">ผู้ใช้ทั้งหมด</div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default articles">
            <div class="panel-heading">
                ข่าวสารกิจกรรม
                <span class="pull-right clickable panel-toggle panel-button-tab-left">
                    <i class="far fa-caret-square-up fa-lg"></i>
                </span></div>
            <div class="panel-body articles-container">
                @foreach ($new_activity as $item)
                <div class="article border-bottom">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2 col-md-2 date">
                                <div class="large">
                                    {{ date('d', strtotime($item->activity_date)) }}
                                </div>
                                <div class="text-muted">
                                    {{ date('M-y', strtotime($item->activity_date)) }}
                                </div>
                            </div>
                            <div class="col-xs-10 col-md-10">
                                <h4>
                                    <b>{{ $item->activity_name }}</b>
                                </h4>
                                <p>{{$item->activity_detail}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--End .article-->
                @endforeach
            </div>
        </div>
        <!--End .articles-->
    </div>
    <!--/.col-->
</div>
<!--/.row-->



@endsection
