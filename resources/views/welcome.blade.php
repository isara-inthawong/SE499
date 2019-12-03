<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>SE499 - Welcome</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="css/welcome/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/welcome/responsive.css">
{{-- Font Awesome --}}
<script src="https://kit.fontawesome.com/da3b12fb4d.js" crossorigin="anonymous"></script>

<body>
    <div id="page-top" class="politics_version">
        <!-- LOADER -->
        <div id="preloader">
            <div id="main-ld">
                <div id="loader"></div>
            </div>
        </div><!-- end loader -->
        <!-- END LOADER -->

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                    <!-- <img class="img-fluid" src="images/logo.png" alt="" /> -->
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <section id="home" class="main-banner parallaxie" style="background: url('images/welcome/banner-03.jpg')">
            <div class="heading">
                <h1>Hello Scientists</h1>
                <p>"เว็บแอพพลิเคชันสำหรับบริหารกิจกรรมสโมสรนักศึกษาคณะวิทยาศาสตร์"<br>Activity Management For
                    Student
                    Science Club</p>
                <!-- <p>"This is Web application for , <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p> -->
                <h3 class="cd-headline clip is-full-width">
                    <span>พวกเราคือ</span>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">"วิศวกรรมซอฟต์แวร์"</b>
                        <b>"วิทยาการคอมพิวเตอร์"</b>
                        <b>"วิทยาศาสตร์และเทคโนโลยีอาหาร"</b>
                    </span>
                </h3>
            </div>
        </section>

        <svg id="clouds" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
            viewBox="0 0 85 100" preserveAspectRatio="none">
            <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
            </path>
        </svg>

        <div class="copyrights">
            <div class="container">
                <div class="footer-distributed">
                    <div class="footer-left">
                        <p class="footer-links">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/home') }}">Home</a>
                            @else

                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))

                            <a href="{{ route('register') }}">Register</a>

                            @endif
                            @endauth
                            @endif
                        </p>
                        <p class="footer-company-name">© 2019 Copyright:
                            <a href="https://www.facebook.com/Isara.Intawong" target="_blank">Isara Intawong</a></p>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copyrights -->

        <a href="#" id="scroll-to-top" class="dmtop global-radius">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- ALL JS FILES -->
        <script src="js/welcome/all.js"></script>
        <!-- Camera Slider -->
        <script src="js/welcome/parallaxie.js"></script>
        <script src="js/welcome/headline.js"></script>
        <!-- ALL PLUGINS -->
        <script src="js/welcome/custom.js"></script>
    </div>
</body>

</html>
