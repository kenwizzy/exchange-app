@extends('layouts.dashboard')
@section('content')

<div class="page-content">
    <div class="container">

        @if (session('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ session('success') }}</p>
        </div>
        @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <p class="text-center">{{ session('error') }}</p>
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

            <div class="col-lg-6">
                <div class="token-statistics card card-token height-auto">
                    <div class="card-innr" style="margin: auto; padding-bottom: 50px;">
                        <div class="token-balance token-balance-with-icon">

                            <div class="token-balance-text">
                                <h6 class="card-sub-title">
                                <img src="{{asset('images/naira.svg')}}"> &nbsp; Naira Wallet</h6>
                                    <br>
                                    <span class="lead">
                                        <em class="ti ti-wallet"> </em>{{number_format($na_wallet->balance, 2)}} <b>₦</b>
                                        <br> <br>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline btn-secondary" style=" color: white; border-color: white;">Tansfer </a>
                                         <a href="#" data-toggle="modal" data-target="#exampleModa2" class="btn btn-outline btn-secondary" style=" color: white; border-color: white;"> Deposit</a>

                                        <!-- Button trigger modal -->


<!-- Modal one -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Transfer to Miraweb User</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="{{route("dashboard.wallet_transfer")}}" method="post">
    @csrf
<div class="modal-body" style="text-align: left;">
<div class="input-item input-with-label">
<label class="input-item-label">Enter User's Email Address</label>
<input name="email" class="input-bordered" type="email" required>
</div>
<div class="input-item input-with-label">
<label class="input-item-label">Reasons For Transfer</label>
<textarea name="reason" class="input-bordered input-textarea" ></textarea>
</div>
<div class="input-item input-with-label">
<label class="input-item-label">Enter Amount</label>
<input name="amount" class="input-bordered" type="number" required>
</div>
{{-- <p style="color:black; font-size: 15px;">Transfer fee is ₦100 <br>
*This transaction is irreversible once sent</p> --}}
</div>

<div class="modal-footer">

<button type="submit" class="btn btn-primary">Transfer</button>
<button type="button" id="withdraw" class="btn btn-outline btn-info">Click here to withdraw</button>
</div>
</div>
</form>
</div>
</div>


<!-- Modal two -->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModa2Label" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModa2Label">Naira Deposit</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@php
$array = array(array('metaname' => 'color', 'metavalue' => 'blue'),
                array('metaname' => 'size', 'metavalue' => 'big'));
                $ref = rand(9,50);

@endphp
<form action="{{ route('pay') }}" method="POST">
    @csrf
<div class="modal-body" style="text-align: left;">
<div class="input-item input-with-label">
<label class="input-item-label ">Enter Amount</label>
    <input type="number" class="input-bordered" id="amount" name="amount" placeholder="Min 1000" required/> <!-- Replace the value with your transaction amount -->
    <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both -->
    <input type="hidden" name="description" value="" /> <!-- Replace the value with your transaction description -->
    <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
    <input type="hidden" name="currency" value="NGN" /> <!-- Replace the value with your transaction currency -->
    <input type="hidden" name="email" value="{{$user->email}}" /> <!-- Replace the value with your customer email -->
    <input type="hidden" name="firstname" value="{{$user->firstname}}" /> <!-- Replace the value with your customer firstname -->
    <input type="hidden" name="lastname" value="{{$user->lastname}}" /> <!-- Replace the value with your customer lastname -->
    <input type="hidden" name="metadata" value="{{ json_encode($array) }}" > <!-- Meta data that might be needed to be passed to the Rave Payment Gateway -->
    <input type="hidden" name="phonenumber" value="{{$user->phone}}" /> <!-- Replace the value with your customer phonenumber -->
<input type="hidden" id="bal" value="{{$user->stage->limit}}" />
</div>
<p style="color:black; font-size: 12px;margin-top:-10px;">Deposit fee is ₦<span id="charge" style="color:black; font-size: 14px;">100</span> </p>
<p id="calc_amt" style="color:black; font-size: 13px; color:red;"></p>
</div>

<div class="modal-footer">

<button type="submit" id="btn" class="btn btn-primary">Fund Wallet</button>
<button type="button" id="withdraw" class="btn btn-outline btn-secondary">Click here to withdraw</button>
</div>
</div>
</form>
</div>
</div>
                            </span>


                            </div>


                        </div>



                    </div>
                </div>
            </div>

            <div class="col-lg-6"><div class="content-area card">
                <div class="card-innr">
                    <div class="card-head">
                        <h5> <b>Here is your Miraweb account number </b></h5>
                    </div>
                <span class="badge badge-outline badge-md badge-primary" style="padding: 20px; margin-top: 0px; background-color: #f8f9fb; border-color: gray; border-style: dashed;"> <h3>Account Number: <strong>779383930 </strong></h3>  <h3>Account Name: <strong>Psalmzy </strong></h3></span> <br> <br>

            <a href="#" class="btn btn-outline btn-primary btn-sm btn-auto" style="border-radius: 20px; margin: 7px; ">Copy Account Number</a>
                <a href="#" class="btn btn-outline btn-primary btn-sm btn-auto" style="border-radius: 20px;">Copy Account details</a>

        </div><!-- .card-innr --></div><!-- .card --></div>
        <div class="col-lg-6" style="margin-bottom: 10px;">
            <div class="content-area card">
                <div class="card-innr">
                <img src="{{asset('images/aa.png')}}">
            <br><br>
            <a href="#" class="btn btn-outline btn-secondary">Btc Deposit</a>
            <a href="#" class="btn btn-outline btn-secondary">Naira Deposit</a>
        </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="content-area card"><div class="card-innr" style="display: inline-block;"><div class="card-head"><h6 class="card-title">Miraweb Debit Cards</h6></div> <p style="float: right;">With this Card, you can withdraw funds from any ATM and carry out online transactions. </p> <img src="{{asset('images/cc.png')}}" width="200px" height="auto"><a href="{{route('dashboard.cards')}}" class="btn btn-secondary" style="margin-top: 40px;">Get Started</a></div></div>
        </div>

            <div class="col-lg-12">

                <div class="card  card-box">
                    <div class="card-head">

                    </div>
                    <div class="card-body ">
                           @if($results->count() > 0)
                            <div class="table-responsive table-bordered">
                                <table class="table display product-overview mb-30" id="example1">
                                    <thead>
                                        <tr>
                                            <th>S/n</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Type</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $sn = 1; @endphp
                                    @foreach($results as $res)
                                        <tr>
                                            <td>{{$sn++}}</td>

                                            @if($res->type == "withdraw")
                                               <td style="color:red;">{{number_format($res->amount,2)}}</td>
                                               <td style="color:red;">{{$res->type}}</td>
                                            @else
                                            <td>{{number_format($res->amount,2)}}</td>
                                            <td>{{$res->type}}</td>
                                            @endif


                                            <td>
                                                @if($res->confirmed == 1)
                                                <button class="btn btn-success " type="button">
                                                  Confirmed   <span class="caret"></span>
                                                </button>
                                                @else
                                                <button class="btn btn-danger " type="button">
                                                    Failed  <span class="caret"></span>
                                                  </button>
                                                @endif
                                        </td>


                                            <td>{{\Carbon\Carbon::parse($res->created_at)->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                         <div class="text-center">
                            <img src="{{asset('images/no-t.svg')}}">
                            <div class="card-head"><h4 class="card-title">No Transactions</h4></div>

                         </div>
                            @endif

                    </div>
                </div>

           </div>
            </div>
            <!-- .col -->
        </div></div> </div>

        <style type="text/css">
            /*@media (min-width: 576px){
            .card-innr {
            padding: 25px 100px;
                }
                }*/
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
                .card-innr {
                text-align: center;
                }

        </style>
@endsection
@section('script')
<script>
$(document).ready(function(){
    $("#btn").prop('disabled', true);
$("#amount").keyup(function(){

   var charge = parseInt($("#charge").html());
   var change = parseInt($("#amount").val());
   var bal = parseInt($("#bal").val());

   if(change >= 1000 && change <= bal){
var compute = change - charge;
$("#calc_amt").text('You get ₦'+compute.toFixed(2));
$("#btn").prop('disabled', false);
}else if(change > bal){
    $("#calc_amt").text('Cannot make transaction above your limit, Kindly upgrade your account to get higher transaction limit');
    $("#btn").prop('disabled', true);

}else{
var compute = "";
$("#calc_amt").text('');
$("#btn").prop('disabled', true);
}

  });

  $(document).on('click', '#withdraw', function(){
     window.location = "{{route('dashboard.withdraw')}}";
  })
});
  </script>
  @endsection
