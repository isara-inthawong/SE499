@extends('layouts.app-layout')
@section('title','Home')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">
                <h1>ข่าวสารกิจกรรม</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default articles">
                            <div class="panel-body articles-container">
                                @foreach ($new_activity as $item)
                                <div class="article border-bottom">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-2 col-md-2 date">
                                                <div class="large">
                                                    <h2>
                                                        {{ date('D', strtotime($item->activity_date)) }}
                                                        {{ date('d', strtotime($item->activity_date)) }}
                                                    </h2>
                                                </div>
                                                <div class="text-muted">
                                                    {{ date('M-Y', strtotime($item->activity_date)) }}
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
            </div>
        </div>
    </div>
</div>
@endsection
