@extends('layouts.dashboard')
@section('content')


@if(session()->has('good'))
@section('script')
<script>
Notiflix.Report.Success( 'Success!', '{!! session()->get('good') !!}', 'Ok' );
</script>
@endsection
@endif

        @if (session('error'))
            <div class="alert alert-danger">
                <p class="text-center">{{ session('error') }}</p>
            </div>
        @endif

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="aside sidebar-right col-lg-4">
                <div class="account-info card">
                    <div class="card-innr" style="padding-left: 30px; padding-right: 30px; text-align: center;">
                        <h6 class="card-title card-title-sm">Profile Settings</h6>

                        <a href="#" class="btn btn-secondary" style="margin-bottom: 10px;"><em class="ti ti-pencil"> </em>Edit Profile</a>


                    </div>
                </div>


                </div>
            <div class="col-lg-4">
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="padding-right: 40px; padding-left: 40px;">
                        <div class="token-balance token-balance-with-icon">

                            <div class="token-balance-text">
                            <h6 class="card-sub-title">Wallet Balance</h6><span class="lead"><em class="ti ti-wallet"> </em><b>₦</b>{{number_format($naira->balance, 2)}}</span><br><br>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="aside sidebar-right col-lg-4">
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="padding-right: 40px; padding-left: 40px;">
                        <div class="token-balance token-balance-with-icon">

                            <div class="token-balance-text">
                            <h6 class="card-sub-title">Bitcoin Balance</h6><span class="lead"><em><p><img src="{{asset('images/btc.svg')}}"></em> {{$btc== '0.0'?'0.00000':$btc}}</span><br><br>
                            </div>
                        </div>


                    </div>
                </div>


                </div>
            <!-- .col -->


                <style type="text/css">
                    @media (min-width: 576px){
                    .card-innr {
                    padding: 25px 100px;
                        }
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

                </style>
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="content-area card">
                                    <div class="card-innr" style="text-align: center;">

                                    <img src="{{asset('images/giftcard.svg')}}">
                                    <a href="{{url('dashboard/giftcard')}}" class="btn btn-dark" style="margin-top: 30px;">Exchange Gift Card </a>
                                    </div>
                                    <!-- .card-innr -->
                                </div>
                                <!-- .card -->
                            </div>

                            <div class="col-lg-4">
                                <div class="content-area card">
                                    <div class="card-innr" style="text-align: center;">

                                        <img src="images/bitcoin.svg">
                                    <a href="{{route('dashboard.transac')}}" class="btn btn-dark" style="margin-top: 30px;">Buy/Sell Bitcoin</a>
                                    </div>
                                    <!-- .card-innr -->
                                </div>
                                <!-- .card -->
                            </div>

                            <div class="col-lg-4">
                                <div class="content-area card">
                                    <div class="card-innr" style="text-align: center;">

                                        <img src="images/digital.svg">
                                    <a href="{{url('dashboard/digital_asset')}}" class="btn btn-dark" style="margin-top: 30px;">Exchange Digital Card</a>
                                    </div>
                                    <!-- .card-innr -->
                                </div>
                                <!-- .card -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7">
                    <div class=" card ">
                        <div class="card-innr">
                            <div class="card-head has-aside">
                                <h4 class="card-title">Transaction</h4>
                                <div class="card-opt">
                                    @if(count($transactions) > 0)
                                    <a href="{{route('dashboard.transactions')}}" class="link ucap">View ALL <em class="fas fa-angle-right ml-2"></em></a>
                                    @endif
                                </div>
                            </div>

                                   <div class="table-responsive table-hover">
                                    @if(count($transactions) > 0)
                                       <table class="table table-bordered">
                                           <thead>
                                               <tr>
                                               <th>S/n</th>
                                               <th>Amount</th>
                                               <th>Type</th>
                                               <th>Description</th>
                                               <th>Status</th>
                                               <th>Date</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               @php $sn = 1; @endphp
                                               @foreach($transactions as $result)
                                               <tr>
                                               <td>{{$sn++}}</td>
                                               <td>
                                                @if($result->type == 'withdraw')
                                                <p class="text-danger">{{$result->amount}}</p>
                                                @else
                                                <p>{{$result->amount}}</p>
                                                @endif
                                               </td>
                                                <td>@if($result->type == 'withdraw')
                                                    <p class="text-danger">{{$result->type}}</p>
                                                    @else
                                                    <p>{{$result->type}}</p>
                                                    @endif</td>
                                                    <td>{{$result->meta}}</td>
                                               <td>
                                                   @if($result->confirmed == 1)
                                                   <p class="text-success">Confirmed</p>
                                                   @else
                                                   <p class="text-danger">Confirmed</p>
                                                   @endif
                                                </td>
                                                   <td>
                                                    {{ \Carbon\Carbon::parse($result->created_at)->diffForHumans()}}
                                                   </td>
                                                   </tr>
                                       @endforeach
                                           </tbody>
                                       </table>
                                       @else
                                       <div class="text-center">
                                        <img src="{{asset('images/no-t.svg')}}">
                                        <div class="card-head"><h4 class="card-title">You Currently Have No Transactions</h4></div>
                                     </div>
                                       @endif
                                   </div>

                                </div>

                                   {{-- @endif --}}

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="token-calculator card card-full-height">
                        <div class="nomics-ticker-widget" data-name="Bitcoin" data-base="BTC" data-quote="USD"></div><script src="https://widget.nomics.com/embed.js"></script>
            </div>
        </div>
    </div>
    </div>

</div>
@stop
@section('script')
<script>

$(document).ready(function(){
   fetch("{{ url('/resend_token') }}")
    .then(response => response.text()
    .then(response => {
   //console.log(response);
    }));
});

</script>
@endsection
