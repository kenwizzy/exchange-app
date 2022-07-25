@extends('layouts.dashboard')
@section('content')


<style type="text/css">
    .card-innr {
            text-align: center;
            }
            .topbar {
    background: #384b7c;
    position: relative;
    z-index: 3;
        }
        .card-token {
        background-image: linear-gradient(45deg, #1c65c9 0%, #384b7c 100%);
        color: #fff;
        }
        .demo-panel, .promo-trigger, .promo-content.active {

            display: none;
            }

            .body{
                    background: #f4f5f8;
            }

    </style>

<div class="page-content">
    <div class="container">

        @if (session('success'))
        @section('script')
        <script>
            Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
            // setTimeout(function (){
            //    location.reload();
            // }, 4000);
        </script>
        @endsection
        @endif

        @if (session('error'))
        @section('script')
        <script>
            //Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
           Notiflix.Notify.Failure('{{ session('error') }}');
        </script>
        @endsection
        @endif

        <div class="row">


            <div class="col-lg-6">
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="margin: auto;">
                        <div class="token-balance token-balance-with-icon">

                        <div class="token-balance-text"><h6 class="card-sub-title"><img src="{{asset('images/naira.svg')}}"> &nbsp; Naira Wallet</h6><br><span class="lead"><em class="ti ti-wallet"> </em> {{number_format($naira_wallet->balance, 2)}} <b>₦</b> <br> <br><a href="{{url('dashboard/naira_wallet')}}" class="btn btn-outline btn-secondary" style=" color: white; border-color: white;">View more</a>  <img src="{{asset('images/naira.png')}}"  width="100px" height="auto">
                            </span>


                            </div>


                        </div>



                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="margin: auto;">
                        <div class="token-balance token-balance-with-icon">

                        <div class="token-balance-text"><h6 class="card-sub-title"><img src="{{asset('images/btc.svg')}}"> &nbsp; Bitcoin Wallet</h6><br><span class="lead"><em class="ti ti-wallet"> </em>{{$btc_wallet}} <b>Btc</b> <br> <br><a href="{{url('dashboard/bitcoin_wallet')}}" class="btn btn-outline btn-secondary" style=" color: white; border-color: white;">View more</a>  <img src="{{asset('images/btc.png')}}"  width="100px" height="auto">
                            </span>


                            </div>


                        </div>



                    </div>
                </div>
            </div>

            <!-- .col -->


                <style type="text/css">
                .card-innr {
                        text-align: center;
                        }
                        .topbar {
                background: #384b7c;
                position: relative;
                z-index: 3;
                    }
                    .card-token {
                    background-image: linear-gradient(45deg, #1c65c9 0%, #384b7c 100%);
                    color: #fff;
                    }
                    .demo-panel, .promo-trigger, .promo-content.active {

                        display: none;
                        }

                        .body{
                                background: #f4f5f8;
                        }

                </style>
                <div class="page-content">
                    <div class="container">
                            <div class="col-lg-12 ">
                                <div class="content-area card shadow-sm p-3 mb-5 bg-white rounded">
                                    <div class="card-innr">
                                        <div class="card-title" style="text-align: center;"> Set Default Wallet</h6>
                                        </div>
                                        <br>



                        <div class="form-check-inline">
                        <p style="margin-bottom: 30px;"><img src="{{asset('images/naira.svg')}}"> &nbsp; Naira Wallet &nbsp;
<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked style="margin: 5px 5px;"> </p>

</div>

            <div class="form-check-inline">
            <p><img src="{{asset('images/btc.svg')}}"> &nbsp; Btc Wallet &nbsp;
<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" style="margin: 5px 5px;"> </p>

</div>
                        </div>
                        <!-- .card-innr -->
                    <p style="text-align: center;"><img src="{{asset('images/info.svg')}}"> All card payments will be charged from this wallet.</p>
                    </div>
                    <!-- .card -->
                </div>

                        </div>
                    </div>

                    <style type="text/css">
                        .nomics-ticker-widget-embedded {
border-radius: 5px !important;
border: 1px solid rgba(16,19,21,.1) !important;
overflow: hidden !important;
position: relative !important;
min-width: 260px !important;
min-height: 240px !important;
max-height: 310px !important;
-webkit-touch-callout: none !important;
-webkit-user-select: none !important;
-moz-user-select: none !important;
-ms-user-select: none !important;
user-select: none;
}
                    </style>

                    <div class="col-xl-5 col-lg-5">
                    <div class="token-calculator card">
                        <div class="nomics-ticker-widget-embedded nomics-ticker-widget-size-responsive nomics-ticker-widget-bg-light">
                            <iframe frameborder="0" scrolling="yes" height="270px" sandbox="allow-same-origin allow-scripts allow-top-navigation allow-popups" src="https://widget.nomics.com/assets/BTC/USD/"></iframe><div class="nomics-ticker-widget-footer" style="display: none !important; visibility: visible !important; opacity: 1 !important;"></div></div><script src="https://widget.nomics.com/embed.js"></script>
            </div>
        </div>
                </div>






</div>
<!-- .container -->
</div>

@endsection

