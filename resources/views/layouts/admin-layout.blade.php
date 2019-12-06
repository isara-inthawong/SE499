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
    {{-- <link href="css/font-awesome.min.css" rel="stylesheet"> --}}

    <link href="{{ asset('css/admin/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet">

    <!--Theme-->
    <link href="{{ asset('css/admin/theme-default.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                    <ul class="nav navbar-top-links navbar-right">
                        {{-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-envelope"></em><span class="label label-info">15</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="./images/profile-pic-2.jpg"
                                                width="40">
                                        </a>
                                        <div class="message-body"><small class="pull-right">3 mins ago</small>
                                            <a href="#"><strong>John Doe</strong> commented on <strong>your
                                                    photo</strong>.</a>
                                            <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="./images/profile-pic-1.jpg"
                                                width="40">
                                        </a>
                                        <div class="message-body"><small class="pull-right">1 hour ago</small>
                                            <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                            <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="all-button"><a href="#">
                                            <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                        </a></div>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-bell"></em><span class="label label-primary">5</span>
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
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    {{-- <img src="./images/profile-pic-1.jpg" width="50" class="img-responsive" alt=""> --}}
                <img src="{{url('./images/profile-default.jpg')}}"
                        width="50" class="img-responsive" alt="" />
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{ Auth::user()->first_name }}</div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="{{ (request()->is('admin/home')) ? 'active' : '' }}">
                    <a href="{{route('admin.home')}}"><em class="fas fa-tachometer-alt">&nbsp;</em> Dashboard</a>
                </li>

                <li class="{{ (request()->is('admin/activity')) ? 'active' : '' }}">
                    <a href="{{route('activity.index')}}"><em class="fab fa-line">&nbsp;</em> Activity</a>
                </li>


                <li class="{{ (request()->is('admin/linenotify')) ? 'active' : '' }}">
                    <a href="{{route('linenotify.index')}}"><em class="fab fa-line">&nbsp;</em> Line</a>
                </li>
                <li class="{{ (request()->is('admin/alert')) ? 'active' : '' }}">
                    <a href="{{route('sweet.alert')}}"><em class="fab fa-line">&nbsp;</em> Alert</a>
                </li>
                {{-- <li><a href="#"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
                <li><a href="#"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                <li><a href="#"><em class="fa fa-hand-pointer-o">&nbsp;</em> Buttons</a></li>
                <li><a href="#"><em class="fa fa-pencil-square-o">&nbsp;</em> Forms</a></li>
                <li><a href="#"><em class="fa fa-table">&nbsp;</em> Tables</a></li>
                <li><a href="#"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
                <li><a href="#"><em class="fa fa-star-o">&nbsp;</em> Icons</a></li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-file-o">&nbsp;</em> Pages <span data-toggle="collapse" href="#sub-item-1"
                            class="icon pull-right"><i class="fa fa-plus"></i></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="#">
                                Gallery
                                <li><a class="" href="#">
                                    Search
                                </a></li>
                                <li><a class="" href="#">
                                    </a></li>
                                Login
                            </a></li>
                        <li><a class="" href="#">
                                Error 404
                            </a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em
                            class="fas fa-sign-out-alt">&nbsp;</em> {{ __('Logout') }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            @yield('content')
        </div>
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
</body>

</html>
