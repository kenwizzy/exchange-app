@extends('layouts.dashboard')
@section('content')

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
/* .rate{
    font-size:40px;
    margin-top:-10px;
} */
</style>
<!-- .topbar-wrap -->
<div class="page-content">
        <div class="container">
            {{-- <div class="row"> --}}

                <div class="col-lg-12">
        <div class="content-area card">
        <div class="card-innr card-innr-fix">
            <div class="card-head"><h6 class="card-title">Digital Exchange</h6>
            </div>
            <div class="gaps-1x"></div>
            <!-- .gaps -->

{{-- @if (Session::get('success'))
    <script>
            Notiflix.Report.Success( 'Success','{!! session()->get('success') !!}', 'Ok' );
            setTimeout(function (){
            location.reload();
            }, 6000);
    </script>
 @endif --}}

 @if ($mess = Session::get('success'))
    <div class="alert-success">
        <p class="text-success text-center">{!! $mess !!}</p>
    </div>
    <?php Session::forget('success');?>
 @endif

 @if ($message = Session::get('error'))
    <div class="alert-danger">
        <p class="text-danger text-center">{!! $message !!}</p>
    </div>
    <?php Session::forget('error');?>
 @endif
                      <div class="card mt-12 tab-card">
                        <div class="card-header tab-card-header">
                          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="one-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="One" aria-selected="true">PayPal</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#perfect" role="tab" aria-controls="Two" aria-selected="false">Perfect Money</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#cash" role="tab" aria-controls="Three" aria-selected="false">Cash App</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="four-tab" data-toggle="tab" href="#payo" role="tab" aria-controls="Four" aria-selected="false">Payoneer</a>
                            </li> --}}
                          </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active p-3" id="paypal" role="tabpanel" aria-labelledby="one-tab">
                            <form action="{{route('paypal')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Payment Type</label>
                        <input class="input-bordered" name="paypal" id="paytype" type="text" value="{{$pay->type}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Amount (USD)</label>
                            <input name="amount" id="amount1" class="input-bordered" type="number" required>
                        <span id="charge" class="input-note">Charge: {{$pay->rate}}</span>
                        <p class="res" style="color:red;"></p>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8 col-sm-8">
                            <div class="input-item input-with-label">
                                <label class="input-item-label text-exlight">Calculated Amount &#8358;</label>
                                <input name="calc_amt" id="calc_amt1" class="input-bordered" type="text" required placeholder="Total: &#8358;3,000" readonly>
                                <span class="input-note">Estimated Amount to receive in Naira. </span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                                <label class="input-item-label text-exlight">Rate in &#8358;</label>
                                <div><h3 id="rate1" class="rate paypal_rate"></h3></div>
                        </div>
                        </div>
                    <div class="gaps-1x"></div>
                    <button type="submit" id="paypal1" class="btn btn-primary">Pay With PayPal</button>
                </form>
                          </div>
                          <div class="tab-pane fade p-3" id="perfect" role="tabpanel" aria-labelledby="two-tab">
                          <form action="{{route('pm_pay')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                            <div class="input-item input-with-label">
                                <label class="input-item-label text-exlight">Payment Type</label>
                                <input class="input-bordered" name="pay_type" id="paytype" type="text" value="{{$pm->type}}" required readonly>
                            </div>
                             </div>

                                    <div class="col-md-6">
                                        <div class="input-item input-with-label">
                                            <label class="input-item-label text-exlight">Amount (USD)</label>
                                            <input name="pm_amount" id="amount2" class="input-bordered" type="number" requi>
                                            <span class="input-note">Input Amount </span>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                            <div class="input-item input-with-label">
                                                <label class="input-item-label text-exlight">Calculated Amount &#8358;</label>
                                                <input name="pm_calc_amt" id="calc_amt2" class="input-bordered" type="text" placeholder="Total: &#8358;1,000" required readonly>
                                                <span class="input-note">Estimated Amount to receive in Naira. </span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <label class="input-item-label text-exlight">Rate in &#8358;</label>
                                            <div><h1 id="rate2" class="rate">{{$pm->rate}}</h1></div>
                                    </div>
                                        </div>
                                    <div class="gaps-1x"></div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                          </div>
                          <div class="tab-pane fade p-3" id="cash" role="tabpanel" aria-labelledby="three-tab">

                          </div>

                          <div class="tab-pane fade p-3" id="payo" role="tabpanel" aria-labelledby="four-tab">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                            <div class="input-item input-with-label">
                                <label class="input-item-label text-exlight">Payment Type</label>
                                <input class="input-bordered" id="paytype" name="pay_cash" type="text" value="{{$payo->type}}" required readonly>
                            </div>
                             </div>

                                    <div class="col-md-6">
                                        <div class="input-item input-with-label">
                                            <label class="input-item-label text-exlight">Amount (USD)</label>
                                            <input name="ca_amount" id="amount4" class="input-bordered" type="number" required>
                                            <span class="input-note">Input Amount </span>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                            <div class="input-item input-with-label">
                                                <label class="input-item-label text-exlight">Calculated Amount &#8358;</label>
                                                <input class="input-bordered" name="new_amt" id="calc_amt4" type="text"  placeholder="Total: &#8358;10,000" required readonly>
                                                <span class="input-note">Estimated Amount to receive in Naira. </span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <label class="input-item-label text-exlight">Rate in &#8358;</label>
                                            <div><h1 id="rate4" class="rate">{{$payo->rate}}</h1></div>
                                    </div>
                                        </div>
                                    <div class="gaps-1x"></div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                          </div>

                        </div>
                      </div>

        </div>

            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('script')
<script>
$(document).ready(function(){
var rate1;
$("#paypal1").prop('disabled', true);

fetch("{{ url('/paypal_rate') }}")
     .then(response => response.text()
     .then(response => {
   let me = response+'/USD';
    $("#rate1").append(me);
}));

$("#amount1").keyup(function(){
   let change = $("#amount1").val();
    if(change == 0 ){
        //alert("Amount must be greater than zero(0)");
        $("#amount1").val('');
        //$(".res").append('');
        $("#calc_amt1").val(0);
    }
    var conc = $(".paypal_rate").text();
    arr = conc.split("/");
    rate1 = amt = arr[0];
    currency = arr[1];
    var ch = $("#charge").text();

    arr = ch.split(":");
    ra = am = arr[1];

     var charge = ra;
    let computess = (change * rate1) - (charge);
    let compute = parseInt(computess).toLocaleString();;
       if(change >= 10){
        $("#calc_amt1").val(compute);
        $(".res").html('You get &#8358;'+compute);
        $("#paypal1").prop('disabled', false);
    }else{
        $("#paypal1").prop('disabled', true);
        $(".res").html('');
        $("#calc_amt1").val(0);

    }

  });


let rate2 = $("#rate2").html();
$("#amount2").keyup(function(){
   let change2 = $("#amount2").val();
    if(change2 == 0 ){
        alert("Amount must be greater than zero(0)");
        $("#amount2").val('');
    }
    let compute2 = (change2 * rate2).toFixed(2);
    $("#calc_amt2").val(compute2);

  });

  let rate3 = $("#rate3").html();
$("#amount3").keyup(function(){
   let change3 = $("#amount3").val();
    if(change3 == 0 ){
        alert("Amount must be greater than zero(0)");
        $("#amount3").val('');
    }
    let compute3 = (change3 * rate3).toFixed(2);
    $("#calc_amt3").val(compute3);

  });


  let rate4 = $("#rate4").html();
$("#amount4").keyup(function(){
   let change4 = $("#amount4").val();
    if(change4 == 0 ){
        alert("Amount must be greater than zero(0)");
        $("#amount4").val('');
    }
    let compute4 = (change4 * rate4).toFixed(2);
    $("#calc_amt4").val(compute4);

  });
});
</script>
@endsection
