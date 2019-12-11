@extends('layouts.admin-layout')
@section('title', 'Users')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Users Table</div>
            <div class="panel-body btn-margins">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Major</th>
                                <th>Tel</th>
                                <th>Profile Picture</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->user_id}}</td>
                                <td>{{ $item->first_name}}</td>
                                <td>{{ $item->last_name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->major}}</td>
                                <td>{{ $item->tel}}</td>
                                <td>
                                    <a href="{{url('./images/profile')}}/{{$item->user_image}}" target="_blank">
                                        {{ $item->user_image}}
                                    </a>
                                </td>
                                <td>
                                    <a href="#" {{-- <a href="{{ action('admin\UserController@edit', $item->user_id) }}"
                                        --}} class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"><b> Edit</b></i>
                                    </a>
                                    {{-- <form method="post" class="delete_form" id="deleteData"
                                        action="{{ action('admin\ActivityController@destroy', $item->activity_id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger" onclick="confirmDel()">
                                        <i class="fas fa-trash-alt"><b> Delete</b></i>
                                    </button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->onEachSide(1)->links() }}
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div>
<!--/.row-->
@endsection
