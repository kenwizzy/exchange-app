@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Dashboard</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
   <!-- start widget -->
    <div class="state-overview">
            <div class="row">


                    <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-b-purple">
                    <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"> Total users</span>
                    <span class="info-box-number">{{$users->count()}}</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                            {{-- 40% Increase in 28 Days --}}
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-b-black">
                    <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Withdrawals</span>
                      <span class="info-box-number">{{$withdraws->count()}}</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                            {{-- 50% Increase in 28 Days --}}
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-b-cyan">
                    <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Approved Giftcards</span>
                    <span class="info-box-number">{{$giftcards->count()}}</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                            {{-- 85% Increase in 28 Days --}}
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->



                 <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-b-orange">
                    <span class="info-box-icon push-bottom"><i class="material-icons">redeem</i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Digital Exchange</span>
                    <span class="info-box-number">{{$assets->count()}}</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">

                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>



        </div>
    <!-- end widget -->
     <!-- chart start -->
    <div class="row">
    <div class="col-sm-8">
       <div class="card card-box">
              <div class="card-head">
                  <header>Chart Survey</header>
                  <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                 </div>
              </div>
              <div class="card-body no-padding height-9">
                <div class="row">
                    <canvas id="canvas1"></canvas>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
       <div class="card card-box">
              <div class="card-head">
                  <header>Chart Survey</header>
                  <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                 </div>
              </div>
              <div class="card-body no-padding height-9">
                <div class="row">
                    <canvas id="chartjs_pie"></canvas>
                </div>
            </div>
          </div>
        </div>
    </div>
     <!-- Chart end -->




</div>


@endsection
