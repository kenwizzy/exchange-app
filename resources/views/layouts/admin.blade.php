<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title> Admin </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
<link href="{{asset('assetss/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('fontss/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('fontss/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assetss/css/dataTables.bootstrap4.css')}}">
    <!--bootstrap -->
<link href="{{asset('assetss/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetss/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <!-- Material Design Lite CSS -->
<link rel="stylesheet" href="{{asset('assetss/plugins/material/material.min.css')}}">
<link rel="stylesheet" href="{{asset('assetss/css/material_style.css')}}">
    <!-- animation -->
<link href="{{asset('assetss/css/pages/animate_page.css')}}" rel="stylesheet">
    <!-- inbox style -->
<link href="{{asset('assetss/css/pages/inbox.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->

<link href="{{asset('assetss/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetss/css/responsive.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetss/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/notiflix.css')}}" rel="stylesheet" type="text/css">
    <!-- favicon -->
<link rel="shortcut icon" href="{{asset('assetss/img/favicon.ico')}}" />
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
          @include('admin.partials.top_header')
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>

                            {{-- <li class="sidebar-user-panel">
                                <div class="user-panel">
                                    <div class="pull-left image">
                                    <img src="{{asset('assetss/img/dp.jpg')}}" class="img-circle user-img-circle" alt="User Image" />
                                    </div>
                                    <div class="pull-left info">
                                        <p> Mr Abdul </p>
                                        <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                                    </div>
                                </div>
                            </li> --}}
                            @php
                            if( Request::is('admin/add_giftcards') ||  Request::is('admin/giftcards')){
                               $class = 'active';
                            }else{
                                $class = '';
                            }
                            if( Request::is('admin/exchange_rate') ||  Request::is('admin/all_exchanges')){
                               $class1 = 'active';
                            }else{
                                $class1 = '';
                            }
                            if( Request::is('admin/airtime-config') ||  Request::is('admin/airtime_exchange_log')){
                               $class2 = 'active';
                            }else{
                                $class2 = '';
                            }
                            @endphp
                            <li class="nav-item start {{Request::is('admin') ? 'active' : ''}}">
                                <a href="{{route('admin.index')}}" class="nav-link nav-toggle">
                                    <i class="material-icons">dashboard</i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>

                                </a>

                            </li>
                           <li class="nav-item {{$class}} ">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                                    <span class="title">Giftcards</span> <span class="arrow"></span>
                                </a>
                            <ul class="sub-menu">
                                    <li class="nav-item {{Request::is('admin/add_giftcards') ? 'active' : ''}}">
                                        <a href="{{route('admin.add_giftcards')}}" class="nav-link"> <span class="title">Add Giftcards</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{Request::is('admin/giftcards') ? 'active' : ''}}">
                                    <a href="{{url('admin/giftcards')}}" class="nav-link "> <span class="title">View Giftcards</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="nav-item {{$class1}}">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
                                    <span class="title">Digital Exchange</span> <span class="arrow"></span>
                                </a>
                                 <ul class="sub-menu">
                                 <li class="nav-item {{Request::is('admin/exchange_rate')? 'active' : ''}}">
                                        <a href="{{url('admin/exchange_rate')}}" class="nav-link "> <span class="title">Digital Exchange Rate</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{Request::is('admin/all_exchanges')? 'active' : ''}}">
                                        <a href="{{url('admin/all_exchanges')}}" class="nav-link "> <span class="title">All Exchanges</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item {{$class2}}">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
                                    <span class="title">Airtime to Cash</span> <span class="arrow"></span>
                                </a>
                                 <ul class="sub-menu">
                                 <li class="nav-item {{Request::is('admin/airtime-config')? 'active' : ''}}">
                                        <a href="{{url('admin/airtime-config')}}" class="nav-link "> <span class="title">Set Airtime Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{Request::is('admin/airtime_exchange_log')? 'active' : ''}}">
                                        <a href="{{url('admin/airtime_exchange_log')}}" class="nav-link "> <span class="title">Airtime Exchange Log</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                          <li class="nav-item {{Request::is('admin/system-payment')? 'active' : ''}}">
                          <a href="{{url('admin/system-payment')}}" class="nav-link nav-toggle"> <i class="material-icons">monetization_on</i>
                                    <span class="title">Withdrawals</span>
                                </a>
                            </li>




                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">

            @yield('content')


            </div>
            <!-- end page content -->

        </div>
        <!-- end page container -->
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2018 &copy; Smile Admin Theme By
            <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RedStar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="{{asset('js/notiflix.js')}}"></script>
    <script src="{{asset('assetss/plugins/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('assetss/plugins/popper/popper.min.js')}}" ></script>
    <script src="{{asset('assetss/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
    <script src="{{asset('assetss/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assetss/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assetss/plugins/dataTables/dataTables.bootstrap4.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assetss/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('assetss/plugins/sparkline/jquery.sparkline.min.js')}}" ></script>
    <script src="{{asset('assetss/js/pages/sparkline/sparkline-data.js')}}" ></script>
    <!-- Common js-->
    <script src="{{asset('assetss/js/app.js')}}" ></script>
    <script src="{{asset('assetss/js/layout.js')}}" ></script>
    <script src="{{asset('assetss/js/theme-color.js')}}" ></script>
    <!-- material -->
    <script src="{{asset('assetss/plugins/material/material.min.js')}}"></script>
    <!-- animation -->
    <script src="{{asset('assetss/js/pages/ui/animations.js')}}')}}"></script>
    <!-- chart js -->
    <script src="{{asset('assetss/plugins/chart-js/Chart.bundle.js')}}" ></script>
    <script src="{{asset('assetss/plugins/chart-js/utils.js')}}" ></script>
    <script src="{{asset('assetss/js/pages/chart/chartjs/home-data.js')}}" ></script>
    <!-- summernote -->
    <script src="{{asset('assetss/plugins/summernote/summernote.min.js')}}" ></script>
    <script src="{{asset('assetss/js/pages/summernote/summernote-data.js')}}"></script>

    <!-- end js include path -->
    @yield('script')
  </body>

  @section('script')
<script>
    $(function () {
      $("#example1").DataTable();
    });
</script>
</html>
