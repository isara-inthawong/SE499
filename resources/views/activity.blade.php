@extends('layouts.app-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Activity</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{route('Activity.store')}}" enctype="multipart/form-data"
                        class="was-validated">
                        @csrf
                        <div class="form-group row">
                            <label for="activity_name" class="col-md-4 col-form-label text-md-right"> ชื่อกิจกรรม
                                Activity name
                                :</label>
                            <div class="col-md-6">
                                <input id="activity_name" type="text" name="activity_name"
                                    value="{{ old('activity_name') }}" class="form-control"
                                    placeholder="กรุณากรอกชื่อกิจกรรม" required />
                                <div class="invalid-feedback">กรุณากรอกชื่อของกิจกรรม</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activity_detail" class="col-md-4 col-form-label text-md-right">
                                รายละเอียดกิจกรรม Activity detail
                                :</label>
                            <div class="col-md-6">
                                <input id="activity_detail" type="text" name="activity_detail"
                                    value="{{ old('activity_detail') }}" class="form-control"
                                    placeholder="กรุณากรอกรายละเอียดของกิจกรรม" required />
                                <div class="invalid-feedback">กรุณากรอกรายละเอียดของกิจกรรม</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="activity_address">
                                สถานที่จัดกิจกรรม Activity address
                                :</label>
                            <div class="col-md-6">
                                <textarea class="form-control is-invalid" name="activity_address" id="activity_address"
                                    placeholder="กรอกสถานที่จัดกิจกรรม"
                                    required>{{ old('activity_address') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="activity_datetime"> วันเวลาที่แข่ง Race datetime :</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="activity_datetime" value="{{ old('activity_datetime') }}" class="form-control"
                                    required />
                                <div class="invalid-feedback">กรุณาระบุวันที่จัดกิจกรรม</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="activity_image"> รูปกิจกรรม Image activity : </label>
                            <div class="col-md-6">
                                <input type="file" class="custom-file-input" id="activity_image" name="activity_image"
                                    accept=".png, .jpg, .jpeg" required />
                                <label class="custom-file-label">Choose file...</label>
                                <div class="invalid-feedback">กรุณาเลือกไฟล์รูปภาพกิจกรรม</div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary" value="Save">Save</button>
                                    <a href="{{ url('admin/dashboard')}}" class="btn btn-danger">Cancle</a>
                                </div>
                            </div>
                        </div>

                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
