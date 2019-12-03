<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="css/admin/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    {{-- <link href="css/font-awesome.min.css" rel="stylesheet"> --}}

    <link href="css/admin/datepicker3.css" rel="stylesheet">
    <link href="css/admin/styles.css" rel="stylesheet">

    <!--Theme-->
    <link href="css/admin/theme-default.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
                    <a class="navbar-brand" href="{{ url('/') }}"><span>{{ config('app.name') }}</span></a>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
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
                        </li>
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
                    <img src="images/profile-pic-1.jpg" width="50" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">Username</div>
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
                <li class="active"><a href="#"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="#"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
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
                            </a></li>
                        <li><a class="" href="#">
                                Search
                            </a></li>
                        <li><a class="" href="#">
                                Login
                            </a></li>
                        <li><a class="" href="#">
                                Error 404
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.sidebar-->








        {{-- <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-1">
            <a class="navbar-brand" href=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('./home')}}">Home
        <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('LineNotify.index')}}">Line</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" {{url('/activity')}} ">Activity</a>
        </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto nav-flex-icons">

            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="https://images.unsplash.com/photo-1552933529-e359b2477252?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                        class="rounded-circle z-depth-0" alt="avatar image" width="30"
                        height="30">{{' '}}{{ Auth::user()->first_name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                    aria-labelledby="navbarDropdownMenuLink-55">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">History</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
    </nav>
    <!--/.Navbar --> --}}

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('content')
    </div>
    </div>

    <!-- JQuery -->
    <script src="js/admin/jquery-1.11.1.min.js"></script>
    <script src="js/admin/bootstrap.min.js"></script>
    <script src="js/admin/chart.min.js"></script>
    <script src="js/admin/chart-data.js"></script>
    <script src="js/admin/easypiechart.js"></script>
    <script src="js/admin/easypiechart-data.js"></script>
    <script src="js/admin/bootstrap-datepicker.js"></script>
    <script src="js/admin/custom.js"></script>
</body>

</html>
