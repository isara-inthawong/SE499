@extends('layouts.admin-layout')
@section('title', 'Activity')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Activity List</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Activity Table</div>
            <div class="panel-body btn-margins">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hour</th>
                                <th>Address</th>
                                <th>Detail</th>
                                <th>Image</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $item)
                            <tr>
                                <td>{{ $item->activity_id}}</td>
                                <td>{{ $item->activity_name}}</td>
                                <td>{{ $item->activity_date}}</td>
                                <td>{{ $item->activity_time}}</td>
                                <td>{{ $item->hour}}</td>
                                <td>{{ $item->activity_address}}</td>
                                <td>{{ $item->activity_detail}}</td>
                                <td>
                                    <a href="{{url('./images/activity')}}/{{$item->activity_image}}" target="_blank">
                                        {{ $item->activity_image}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ action('admin\ActivityController@edit', $item->activity_id) }}"
                                        class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"><b> Edit</b></i>
                                    </a>
                                    <form method="post" class="delete_form" id="deleteData"
                                        action="{{ action('admin\ActivityController@destroy', $item->activity_id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="btn btn-danger" onclick="confirmDel()">
                                            <i class="fas fa-trash-alt"><b> Delete</b></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $activity->onEachSide(1)->links() }}
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div>
<!--/.row-->
@endsection