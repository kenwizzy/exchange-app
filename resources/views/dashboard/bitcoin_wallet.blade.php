@extends('layouts.dashboard')
@section('content')

<div class="page-content">
    <div class="container">

        @if (session('error'))
        <div class="alert alert-danger">
        <p class="text-center">{{ session('error') }}</p>
        </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <p class="text-center">{{ session('success') }}</p>
            </div>
        @endif

        @if(count($errors) > 0)
        <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $errors)
                <li class='text-center'>{{$errors}}</li>
            @endforeach
        </ul>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-6 animate__animated animate__backInLeft" >
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="margin: auto; padding-bottom: 50px;">
                        <div class="token-balance token-balance-with-icon">

                            <div class="token-balance-text">
                                <h6 class="card-sub-title">
                                <img src="{{asset('images/btc.svg')}}"> &nbsp; Bitcoin Wallet</h6>
                                    <br>
                                    <span class="lead">
                                    <em class="ti ti-wallet"> </em>{{$output}} <b>BTC</b>
                                        <br> <br>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline btn-secondary" style=" color: white; border-color: white; margin: 10px;">Send Bitcoin</a>
                                         <a href="#" data-toggle="modal" data-target="#exampleModa2" class="btn btn-outline btn-secondary" style=" color: white; border-color: white; margin: 10px;"> Receive Bitcoin</a> <br>

                                         <a href="javascript:void(0)" id="btc_id" class="btn btn-xs btn-lighter-alt btn-auto" style="margin: 10px;">Buy/Sell Bitcoin</a>
                                         {{-- <a href="#" class="btn btn-xs btn-outline btn-secondary btn-auto" style="margin: 10px; color: white; border-color: white;">Sell Bitcoin</a> --}}

                                        <!-- Button trigger modal -->
                            </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal one -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">

                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Send Bitcoin</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Send to Miraweb User</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Send to wallet address</a></li>
                </ul>
                <div class="tab-content" id="profile-details">
                <div class="tab-pane fade show active" id="personal-data">
                    <div class="modal-body" style="text-align: left;">
                <div>
                    <small>
                        Send funds instantly to another Miraweb account, simply enter the email associated with the account, enter the amount and click submit.
                    </small>
                </div><br>

                <form action="{{route('send_bitcoin')}}" method="POST">
                 @csrf
                <div class="input-item input-with-label">
                <label class="input-item-label">Email address</label>
                <input name="email" class="form-control" id="mew" value="" type="text" required>
                </div>
                <div class="input-item input-with-label">
                <label class="input-item-label">Reasons For Transfer</label>
                <textarea name="reason" class="input-bordered input-textarea reason" ></textarea>
                </div>
                <div class="input-item input-with-label">
                <label class="input-item-label">Amount in Btc</label>
                <input name="amount" id="amount" class="input-bordered amount" type="text" placeholder="">
                </div>
                {{-- <small style="color:black;">Transfer fee is 0.00000088btc <br>
                *This transaction is irreversible once sent</small> --}}
                </div>

                <div class="modal-footer">
                <button id="log" type="sumit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>

                <div class="tab-pane fade" id="password">
                    <div class="modal-body" style="text-align: left;">

                        <div>
                            <small>
                                Select the address you want to send funds to, enter the desired amount and click submit  </small>
                        </div><br>

                    <form action="{{route('send_bit')}}" method="POST">
                        @csrf
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Enter wallet address</label>
                            <input name="address" id="address" class="input-bordered" type="text" required>
                            </div>

                            <div class="input-item input-with-label">
                                <label class="input-item-label">Amount in Btc</label>
                                <input name="amt" id="amt" class="input-bordered" type="text" >
                            </div>


                        <div class="gaps-1x"></div>
                        <!-- 10px gap -->
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <button id="pay" type="submit" class="btn btn-primary">Submit</button>
                            <div class="gaps-2x d-sm-none"></div>

                        </div>
                    </form>
                    </div>
                    </div>

</div>
</div>
</div>
</div>


<!-- Modal two -->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModa2Label" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModa2Label">Bitcon Receive</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="input-item input-with-label" style="text-align: center;">
<p style="text-align: left;">Scan QR Code </p>
{{$img}}
</div>

<div class="input-item input-with-label">
<input class="input-bordered" id="myInput" type="text" value="{{$btcwallet->address}}" style="background-color: #f8f9fb;" readonly="true">
</div>
<div>
    <button id="test" data-clipboard-target="#myInput" class="btn btn-info">Copy Address</button>
</div>
</div>

<div class="modal-footer">

{{-- <button type="button" class="btn btn-primary">Copy</button> --}}

</div>
</div>
</div>
</div>

            <div class="col-lg-6 animate__animated animate__bounceInDown">
                {{-- <style type="text/css">
                    .animate__animated.animate__bounceInDown {
                      --animate-duration: 4s;
                        }
                </style> --}}

                <div class="content-area card" >
                <div class="card-innr">
                    <div class="card-head">
                        <h5> <b>Here is your Miraweb Bitcoin Wallet Addresss </b></h5>
                    </div> <br>
                <span id="myInput" class="badge badge-outline badge-md badge-primary" style="padding: 20px; margin-top: 0px; background-color: #f8f9fb; border-color: gray; border-style: dashed;">   <h3><strong>{{$btcwallet->address}}</strong></h3></span> <br> <br><br>

                <a href="javascript:void(0)" id="test" data-clipboard-target="#myInput" class="btn btn-outline btn-primary btn-sm btn-auto" style="border-radius: 20px;">Copy Btc Address</a>

        </div><!-- .card-innr --></div><!-- .card --></div>
        <div class="col-lg-6 animate__animated animate__backInLeft ll" style="margin-bottom: 10px;">
            <style type="text/css">
                    .animate__animated.animate__backInLeft.ll {
                      --animate-duration: 6s;
                        }
                </style>
            <div class="content-area card">
                <div class="card-innr">
                <img src="{{asset('images/aa.png')}}">
            <br><br>
            <a href="#" class="btn btn-outline btn-secondary">Btc Deposit</a>
            <a href="#" class="btn btn-outline btn-secondary">Naira Deposit</a>
        </div>
        </div>
        </div>
        <div class="col-lg-6 animate__animated animate__backInRight ">
            <style type="text/css">
                    .animate__animated.animate__backInRight {
                      --animate-duration: 8s;
                        }
                </style>

            <div class="content-area card">
                <div class="card-innr" style="display: inline-block;"><div class="card-head"><h6 class="card-title">Miraweb Debit Cards</h6></div> <p style="float: right;">With this Card, you can withdraw funds from any ATM and carry out online transactions. </p> <img src="{{asset('images/cc.png')}}" width="200px" height="auto"><a href="#" class="btn btn-secondary" style="margin-top: 40px;">Get Started</a>
        </div></div>
        </div>




            <div class="col-lg-12 animate__animated animate__fadeIn">
                <style type="text/css">
                    .animate__animated.animate__fadeIn {
                      --animate-duration: 10s;
                        }
                </style>



<div class="col-md-12">
    <div class="row">

@if(count($dataReceive2) > 0)
        <div class="col-lg-6 col-xs-12">
            <div class="content-area card" style="border-radius:8px;">
             <div class="card-innr ">

                <div class="card-head">
                    <h1>Deposits</h1>
                </div>

                <div class="table-responsive table-bordered">
                    <table class="table display product-overview mb-30" id="support_table5">
                        <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Amount Received</th>
                                <th>Fee</th>
                                {{-- <th>From</th> --}}
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sn = 1; @endphp
                        @foreach($dataReceive2 as $data)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$data->amount}}</td>
                                <td>{{$data->fee}}</td>
                                {{-- <td>{{$data->sender}}</td> --}}
                                <td>{{$data->type}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-sm" type="button">
                                            <span class="caret">{{$data->status}}</span>
                                        </button>
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($data->done_at)->diffForHumans() }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
        </div>
            </div>
@endif
@if(count($results) > 0)
            <div class="col-lg-6 col-xs-12">
                <div class="content-area card" style="border-radius:8px;">
                 <div class="card-innr">

                    <div class="card-head">
                        <h1>Withdrawals</h1>
                    </div>

                    <div class="table-responsive table-striped">
                        <table class="table display product-overview mb-30" id="support_table5">
                            <thead>
                                <tr>
                                <th>S/n</th>
                                <th>Amount</th>
                                {{-- <th>Fee</th> --}}
                                {{-- <th>From</th> --}}
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sn = 1; @endphp
                                @foreach($results as $res)
                                <tr>
                                   <td>{{$sn++}}</td>
                                   <td>{{$res->amount}}</td>
                                   <td>{{$res->fee}}</td>
                                   {{-- <td></td> --}}
                                   <td>{{$res->type}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success" type="button">
                                            <span class="caret">{{$res->status}}</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($res->created_at)->diffForHumans()}}</td>
                                    </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>



                    {{-- @endif --}}
            </div>
            </div>
        </div>
        @endif
                </div>
    </div>




        </div></div>

                <!-- .card-innr -->

                </div>

            <!-- .col -->
        </div></div>


<style type="text/css">
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
@endsection
@section('script')
<script>
$(document).ready(function(){
    $("#log").prop('disabled', true);
    $("#pay").prop('disabled', true);

    $(document).on('click', '#btc_id', function(){
     window.location = "{{route('dashboard.transac')}}";
    });

$('#amount').keyup(function(){

var email = $('#mew').val();
var reason = $('.reason').val();
var amount = $('.amount').val();

if(email !== '' && amount !== ''){
    $("#log").prop('disabled', false);
}

})

$('#amt').keyup(function(){

    var addr = $('#address').val();
    var amt = $('#amt').val();
    if(addr !== '' || amt !== ''){
    $("#pay").prop('disabled', false);
}

})

    function setTooltip(btn, message) {
  btn.tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    btn.tooltip('hide');
  }, 5000);
}

var clipboard = new ClipboardJS('#test');

clipboard.on('success', function(e) {

    var btn = $(e.trigger);
  var res = setTooltip(btn, 'Address Copied');
  hideTooltip(btn);

    e.clearSelection();
});

$('#log').on('click', function(){
        Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(7000);
});

$('#pay').on('click', function(){
        Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(7000);
});

});

</script>
@endsection
