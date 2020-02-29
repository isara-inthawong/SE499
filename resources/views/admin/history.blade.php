@extends('layouts.admin-layout')
@section('title','ประวัติการเข้าร่วมกิจกรรม')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ประวัติการเข้าร่วมกิจกรรม</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    ประวัติการเข้าร่วมกิจกรรม
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
