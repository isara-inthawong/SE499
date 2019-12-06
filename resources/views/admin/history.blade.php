@extends('layouts.admin-layout')
@section('title','History')
@section('content')
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">History</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">History</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    history

                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
