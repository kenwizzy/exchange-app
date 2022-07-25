<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Miraweb | Home</title>
<link href="{{asset('images-current/favicons.png')}}" rel="icon">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<link rel="stylesheet" href="{{asset('css-current/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/all.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/tooltipster.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/cubeportfolio.min.css')}}">
<link rel="stylesheet" href="{{asset('css-current/revolution/navigation.css')}}">
<link rel="stylesheet" href="{{asset('css-current/revolution/settings.css')}}">
<link rel="stylesheet" href="{{asset('css-current/style.css')}}">
</head>
<body data-spy="scroll" data-target=".navbar-nav" data-offset="75" class="offset-nav">
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
<header class="site-header">
    <nav class="navbar navbar-expand-lg padding-nav static-nav">
        <div class="container">
            <a class="navbar-brand" href="index.html">
            <img src="{{asset('images-current/logo-dark.png')}}" alt="logo">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mr-auto">

                   <li class="nav-item dropdown static">
                        <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Product </a>
                        <ul class="dropdown-menu megamenu">
                            <li>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a class="dropdown-item" href="{{url('giftcard')}}"> <img src="{{asset('images-current/giftcards.svg')}}"> &nbsp; &nbsp; GiftCards (Buy & Sell Gift Card at Best Rates) </a> </br>
                                        <a class="dropdown-item" href="{{url('bitcoin')}}"><img src="{{asset('images-current/bitcoin.svg')}}"> &nbsp; &nbsp;Bitcoin (Send, Receive Store, Trade and Store Bitcoin)</a> </br>
                                        <a class="dropdown-item" href="{{url('digital')}}"><img src="{{asset('images-current/card.svg')}}"> &nbsp; &nbsp;Digital Assets (Paypal, Perfect money, etc to Naira)</a> </br>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a class="dropdown-item" href="{{url('refill')}}"><img src="{{asset('images-current/refill.svg')}}"> &nbsp; &nbsp;Refill (Buy airtime, data & Pay for Utilities )</a> </br>
                                        <a class="dropdown-item" href="#"><img src="{{asset('images-current/pm.svg')}}"> &nbsp; &nbsp;Miraweb Cards (Physical and virtual cards for </br> instant cash out)</a> </br>


                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Company </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('about')}}">About</a>
                        <a class="dropdown-item" href="{{url('career')}}">Careers</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rates</a>
                    </li>

                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Help Center </a>

                    </li>
                </ul>
            </div>
            <ul class="social-icons social-icons-simple d-lg-inline-block d-none animated fadeInUp" data-wow-delay="300ms">
                <li><a href="#."><i class="fab fa-facebook-f"></i> </a> </li>
                <li><a href="#."><i class="fab fa-twitter"></i> </a> </li>
                <li><a href="#."><i class="fab fa-linkedin-in"></i> </a> </li>
            </ul>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span class="gradient-bg"></span> <span class="gradient-bg"></span> <span class="gradient-bg"></span>
        </a>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                            Product <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages1" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('giftcard')}}"> Exchange GiftCards (Gift Card at Best Rates)</a>

                                </li>
                               <li class="nav-item">
                                    <a class="nav-link" href="{{url('bitcoin')}}"> Exchange Bitcoin (Send, Receive Store, Trade and Store Bitcoin)</a>

                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{url('digital')}}">  Digital Assets (Paypal, Perfect money, etc to Naira)</a>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('refill')}}">Refill (Buy airtime, data & Pay for Utilities) </a>

                                </li>

                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Miraweb Cards (Physical and virtual cards for </br> instant cash out) </a>

                                </li>



                            </ul>
                        </div>
                    </li>

                        <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                            Company <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages1" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html"> About Us</a>

                                </li>
                               <li class="nav-item">
                                    <a class="nav-link" href="index.html"> Careers</a>

                                </li>


                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Rates </a>
                    </li>
                       <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Help Center</a>
                    </li>





                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>
<!-- header -->
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header about-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">A New Idea</h2>
                    <h2 class="font-bold">Inspires Us To Make</h2>
                    <h2 class="font-xlight">Great Works</h2>
                    <h3 class="font-light pt-2">(Fastest Growing Exchange Platform in Nigeria)</h3>
                </div>
            </div>
        </div>

        {{-- <style type="text/css">
            .gradient-bg {
                background-image: linear-gradient(to right, #28347a 0%, #2f55a2 51%, #28347a 100%);
            }

            /* .feature-item .icon {
    color: #2b357c;
} */
        </style> --}}

        <style type="text/css">
            .gradient-bg {
                background-image: linear-gradient(to right, #28347a 0%, #2f55a2 51%, #28347a 100%);
            }
        </style>



@yield('content')






<!--Site Footer Here-->
<footer id="site-footer" class="padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <a href="index.html" class="footer_logo bottom25 bc"><img src="images-current/logo-dark.png" alt="MegaOne"></a>
                    <style type="text/css">
                        .bc img{
                            width: 200px;
                            height: auto;
                        }
                    </style>
                    <p class=" bottom25">Miraweb is one of the fastest growing Exchange Platform, registered under Nigeria’s
Corporate Affairs Commision with the name 'Miraweb Networks Limited` and RC Number 1709342.</p>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class=" bottom25">Contact</h3>
                     <div class="d-table w-100 address-item bottom25">
                        <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                        <p class="d-table-cell align-middle bottom0">
                            +01 - 123 - 4567 <a class="d-block" href="mailto:web@support.com">support@miraweb.com.ng</a>
                        </p>
                    </div>



                         <ul class="social-icons  wow fadeInUp" data-wow-delay="300ms">
                        <li><a href="javascript:void(0)" class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="linkedin"><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="insta"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20 pl-0 pl-lg-5">
                    <h3 class=" bottom25">Company</h3>
                    <ul class="links" >
                        <li><a href="{{url('/')}}" style="color: black;">Home</a></li>
                        <li><a href="#" style="color: black;">About Us</a></li>
                        <li><a href="#" style="color: black;">Careers</a></li>
                        <li><a href="#" style="color: black;">Rates</a></li>
                        <li><a href="{{url('contact')}}" style="color: black;">Contact Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class=" bottom25">Legal</h3>

                    <ul class="hours_links">
                          <li><a href="#">Privacy-Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer ends-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js-current/jquery-3.4.1.min.js')}}"></script>
<!--Bootstrap Core-->
<script src="{{asset('js-current/propper.min.js')}}"></script>
<script src="{{asset('js-current/bootstrap.min.js')}}"></script>
<!--to view items on reach-->
<script src="{{asset('js-current/jquery.appear.js')}}"></script>
<!--Owl Slider-->
<script src="{{asset('js-current/owl.carousel.min.js')}}"></script>
<!--number counters-->
<script src="{{asset('js-current/jquery-countTo.js')}}"></script>
<!--Parallax Background-->
<script src="{{asset('js-current/parallaxie.js')}}"></script>
<!--Cubefolio Gallery-->
<script src="{{asset('js-current/jquery.cubeportfolio.min.js')}}"></script>
<!--Fancybox js-->
<script src="{{asset('js-current/jquery.fancybox.min.js')}}"></script>
<!--tooltip js-->
<script src="{{asset('js-current/tooltipster.min.js')}}"></script>
<!--wow js-->
<script src="{{asset('js-current/wow.js')}}"></script>
<!--Revolution SLider-->
<script src="{{asset('js-current/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('js-current/revolution/jquery.themepunch.revolution.min.js')}}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="{{asset('js-current/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('js-current/revolution/extensions/revolution.extension.video.min.js')}}"></script>
<!--custom functions and script-->
<script src="{{asset('js-current/functions.js')}}"></script>
</body>
</html>
