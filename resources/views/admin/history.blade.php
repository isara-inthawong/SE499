@extends('layouts.admin-layout')
@section('title','History')
@section('content')
<div class="container">
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
