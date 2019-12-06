@extends('layouts.app-layout')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                    {{-- <a href="{{route('LineNotify.index')}}" target="_blank" class="btn aqua-gradient">Line</a> --}}
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
