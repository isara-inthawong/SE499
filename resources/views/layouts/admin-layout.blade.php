<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->

    <link href="{{ asset('css/admin/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet">

    <!--Theme-->
    <link href="{{ asset('css/admin/theme-default.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/all-style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                    <!-- <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-bell"></em><span class="label label-primary">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li><a href="#">
                                        <div><em class="fa fa-envelope"></em> 1 New Message
                                            <span class="pull-right text-muted small">3 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-heart"></em> 12 New Likes
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-user"></em> 5 New Followers
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="{{url('./images/profile')}}/{{Auth::user()->user_image}}" width="50"
                        class="img-responsive" />
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{ Auth::user()->first_name }}</div>
                    <!-- <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div> -->
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <!-- <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form> -->
            <ul class="nav menu">
                <li class="{{ (request()->is('admin/home')) ? 'active' : '' }}">
                    <a href="{{route('admin.home')}}"><em class="fas fa-tachometer-alt">&nbsp;</em> แดชบอร์ด</a>
                </li>
                <li class="{{ (request()->is('admin/profile')) ? 'active' : '' }}">
                    <a href="{{route('profile.index')}}"><em class="fas fa-user">&nbsp;</em> โปรไฟล์</a>
                </li>
                <li class="{{ (request()->is('admin/users')) ? 'active' : '' }}">
                    <a href="{{route('users.index')}}"><em class="fas fa-users">&nbsp;</em> รายการผู้ใช้</a>
                </li>
                <li class="{{ (request()->is('admin/join_activity')) ? 'active' : '' }}">
                    <a href="{{route('join_activity.index')}}"><em class="fas fa-link">&nbsp;</em> เข้าร่วมกิจกรรม</a>
                </li>

                <li
                    class="parent {{ (request()->is('admin/activity/create')||request()->is('admin/activity')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#sub-item-1">
                        <i class="far fa-calendar-alt">&nbsp;</i> กิจกรรม <span data-toggle="collapse"
                            href="#sub-item-1" class="icon pull-right"><i class="fa fa-plus"></i></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li class="{{ (request()->is('admin/activity')) ? 'active' : '' }}">
                            <a href="{{route('activity.index')}}"><em class="fas fa-calendar-alt">&nbsp;</em>
                                รายการกิจกรรม</a>
                        </li>
                        <li class="{{ (request()->is('admin/activity/create')) ? 'active' : '' }}">
                            <a href="{{route('activity.create')}}"><em class="far fa-calendar-plus">&nbsp;</em>
                                สร้างกิจกรรม</a>
                        </li>
                    </ul>
                </li>

                {{-- <li
                    class="parent {{ (request()->is('admin/linenotify')||request()->is('admin/alert')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#sub-item-2">
                    <i class="fas fa-bug">&nbsp;</i> ทดสอบ <span data-toggle="collapse" href="#sub-item-2"
                        class="icon pull-right"><i class="fa fa-plus"></i></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li class="{{ (request()->is('admin/linenotify')) ? 'active' : '' }}">
                        <a href="{{route('linenotify.index')}}"><em class="fab fa-line">&nbsp;</em> ไลน์บรอดแคส</a>
                    </li>
                    <li class="{{ (request()->is('admin/alert')) ? 'active' : '' }}">
                        <a href="{{route('sweet.alert')}}"><em class="fas fa-exclamation-circle">&nbsp;</em>
                            แจ้งเตือน</a>
                    </li>
                </ul>
                </li> --}}

                <li class="{{ (request()->is('admin/linenotify')) ? 'active' : '' }}">
                    <a href="{{route('linenotify.index')}}"><em class="fab fa-line">&nbsp;</em> ไลน์บรอดแคส</a>
                </li>

                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <em class="fas fa-sign-out-alt">&nbsp;</em> {{ __('ออกจากระบบ') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">@yield('title')</li>
                </ol>
            </div>
            @yield('content')
        </div>
        <div class="col-sm-12">
            <p class="back-link">พัฒนาโดย <a href="https://web.facebook.com/Isara.Intawong" target="__blank">B&B
                    Soft</a></p>
        </div><!-- /.row -->
    </div>
    {{-- sweetalert --}}
    @include('sweetalert::alert')
    <!-- JQuery -->
    <script src="{{asset('js/admin/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/chart.min.js')}}"></script>
    <script src="{{asset('js/admin/chart-data.js')}}"></script>
    <script src="{{asset('js/admin/easypiechart.js')}}"></script>
    <script src="{{asset('js/admin/easypiechart-data.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/admin/custom.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('script')
</body>

</html>
