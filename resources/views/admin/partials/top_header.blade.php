<?php
namespace App\Http\Controllers;
use App\Notification;
use Illuminate\Support\Facades\Auth;
$notification = Notification::where('admin','Admin')
                                ->where('seen', '0');
?>

<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="{{url('/')}}">
            <img alt="" src="{{asset('assetss/img/logo.png')}}">
            <span class="logo-default" >Miraweb</span> </a>
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
        </ul>
         {{-- <form class="search-form-opened" action="#" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="query">
                <span class="input-group-btn">
                  <a href="javascript:;" class="btn submit">
                     <i class="icon-magnifier"></i>
                   </a>
                </span>
            </div>
        </form> --}}
        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
       <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- start language menu -->

                <!-- end language menu -->
               <li class="dropdown dropdown-extended dropdown-notification show" id="header_notification_bar">
               <a href="{{route('admin.notifications')}}" class="dropdown-toggle" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                        <i class="fa fa-bell-o"></i>
                        @if($notification->count() > 0)
                <span class="badge headerBadgeColor1"> {{$notification->count()}} </span>
                        @endif
                    </a>

                </li>

                <!-- start manage user dropdown -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        {{-- <img alt="" class="img-circle " src="assetss/img/dp.jpg" /> --}}
                        <span class="username username-hide-on-mobile">{{Auth::user()->firstname}}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default animated jello">

                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- end manage user dropdown -->

            </ul>
        </div>
    </div>
</div>
