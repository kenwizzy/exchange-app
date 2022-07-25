
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Miraweb - Exchange Giftcards and Bitcoin for Cash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Bootstrap -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons -->
<link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('../../release/v2.1.7/css/unicons.css')}}">
    <!-- Slider -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <!-- Main Css -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt">
<link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">

</head>

<body>

    <!-- Loader -->

    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky" style="position: fixed;">
        <div class="container">
            <!-- Logo container-->
            <div>
                <a class="logo" href="{{url('/')}}">
                <img src="{{asset('images/logo-dark.png')}}" class="l-dark" height="24" alt="">
                <img src="{{asset('images/logo-light.png')}}" class="l-light" height="24" alt="">
                </a>
            </div>
            <div class="buy-button">
                <a href="{{url('login')}}">
                    <div class="btn btn-primary login-btn-primary">Login</div>
                    <div class="btn btn-light login-btn-light">Login</div>
                </a>
                <a href="{{url('register')}}">
                    <div class="btn btn-primary login-btn-primary">Register</div>
                    <div class="btn btn-light login-btn-light" style="background-color: #2f55d4;">Register</div>
                </a>
            </div><!--end login button-->
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-light">
                    <li><a href="{{url('/')}}">Home</a></li>


                    <li class="has-submenu">
                        <a href="javascript:void(0)" >Our Products</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="#"> Exchange Gift Card for Cash</a></li>
                        <li><a href="{{url('bitcoin')}}">Exchange Bitcoin for Cash</a></li>
                             <li><a href="#">Exchange Paypal for Cash</a></li>
                              <li><a href="#">Exchange Cashapp for Cash</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Company</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                        <li><a href="{{url('about')}}">About us </a></li>
                            <li><a href="{{url('services')}}">Services </a></li>

                        </ul>
                    </li>

                     <li><a href="#">Rates</a></li>
                     <li><a href="{{url('contact')}}">Contact us</a></li>
                </ul><!--end navigation menu-->
                <div class="buy-menu-btn d-none">
                    <a href="#"  class="btn btn-primary">Buy Now</a>
                </div><!--end login button-->
            </div><!--end navigation-->
        </div><!--end container-->
    </header><!--end header-->
    <!-- Navbar End -->

    @yield('content')

    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-left">
                        <p class="mb-0">© 2020 Miraweb.</p>
                    </div>
                </div><!--end col-->

                <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <ul class="list-unstyled text-sm-right mb-0">
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('images/payments/american-ex.png')}}" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('images/payments/discover.png')}}" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('images/payments/master-card.png')}}" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('images/payments/paypal.png')}}" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('images/payments/visa.png')}}" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <!-- Footer End -->



    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

    <!-- javascript -->
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/scrollspy.min.js')}}"></script>
    <!-- SLIDER -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl.init.js')}}"></script>
    <!-- Icons -->
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('../../release/v2.1.9/script/monochrome/bundle.js')}}"></script>
    <!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
    <!-- Main Js -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
