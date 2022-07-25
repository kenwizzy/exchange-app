

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Miraweb - Exchange Giftcards and Bitcoin for Cash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- Bootstrap -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Magnific -->
<link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons -->
<link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('../../release/v2.1.7/css/unicons.css')}}">
    <!-- Main Css -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt">
<link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">

</head>

<body>

    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <!-- Logo container-->
            <div>
            <a class="logo" href="{{url('/')}}">
                <img src="{{asset('images/logo-dark.png')}}" height="24" alt="">
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
                <ul class="navigation-menu nav-light jj">
                <li><a href="{{url('/')}}">Home</a></li>


                    <li class="has-submenu">
                        <a href="javascript:void(0)" >Our Products</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="#"> Exchange Gift Card for Cash</a></li>
                            <li><a href="#">Exchange Bitcoin for Cash</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)">Company</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                        <li><a href="{{url('aboutus')}}">About us </a></li>
                        <li><a href="{{url('services')}}">Services </a></li>

                        </ul>
                    </li>


                <li><a href="{{url('contact')}}">Contact us</a></li>
                </ul><!--end navigation menu-->


            </div><!--end navigation-->
        </div><!--end container-->
    </header><!--end header-->
    <!-- Navbar End -->

@yield("content")

<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                <img src="{{asset('images/logo-light.png')}}" height="24" alt="">
                </a>
                <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                <ul class="list-unstyled social-icon social mb-0 mt-4">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul><!--end icon-->
            </div><!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h4 class="text-light footer-head">Company</h4>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="page-aboutus.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> About us</a></li>
                    <li><a href="page-services.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Services</a></li>

                    <li><a href="page-pricing.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Rates</a></li>
                    <li><a href="page-blog-grid.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Blog</a></li>
                    <li><a href="login.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Login</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h4 class="text-light footer-head">Usefull Links</h4>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="page-terms.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Terms of Services</a></li>
                    <li><a href="page-privacy.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Privacy Policy</a></li>
                    <li><a href="documentation.html" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Faq</a></li>

                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h4 class="text-light footer-head">Newsletter</h4>
                <p class="mt-4">Sign up and receive the latest tips via email.</p>
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe form-group position-relative">
                                <label>Write your email <span class="text-danger">*</span></label>
                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                <input type="email" name="email" id="emailsubscribe" class="form-control pl-5 rounded" placeholder="Your email : " required="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary btn-block" value="Subscribe">
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
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
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
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
<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific.init.js')}}"></script>
<!-- Icons -->
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('../../release/v2.1.9/script/monochrome/bundle.js')}}"></script>
<!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
