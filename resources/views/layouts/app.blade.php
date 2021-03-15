<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Businnes, Portfolio, Corporate"> 
	<meta name="Author" content="WebThemez"> 
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('elegant_font/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('css/slider-pro.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}"> 

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="status"></div>
    </div>
    <!-- Header End -->
    <header>
        <!-- Navigation Menu start-->
        <nav id="topNav" class="navbar navbar-default main-menu">
            <div class="container">
                <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    ☰
                </button> 
                <a class="navbar-brand page-scroll" href="{{route ('welcome') }}"><img class="logo" id="logo" src="{{asset ('/img/logo.png')}}" alt="logo"></a>
                <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#slider">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#about">Giới thiệu</a>
                        </li>
                            <li>
                            <a href="#services">Đề thi</a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('auth.login') }}">Đăng nhập</a>
                            </li> 
                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('auth.register') }}">Đăng ký</a>
                            </li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#">{{Auth::user()->username}}</a>
                                <div class="dropdown-content">
                                    @if ( Auth::user()->role == 0 || Auth::user()->role == 1)                                    
                                    <a href="{{route ('admin.user-manage.user-manage')}}">Quản lý người dùng</a>
                                    @endif
                                    <a href="{{route ('home')}}">Trang cá nhân</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item btn btn-link">Đăng xuất</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> 
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    <div class="container">
        <div class="row">
            <div class="footer-containertent">

                <ul class="footer-social-info">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <br/><br/>
                <p>quuynhnhi.jvb@gmail.com</p>
            </div>
        </div>
    </div>
    </footer>
    <!-- Footer End -->

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.easypiechart.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.sliderPro.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script> -->
    <script src="js/custom.js"></script>

</body>
</html>

