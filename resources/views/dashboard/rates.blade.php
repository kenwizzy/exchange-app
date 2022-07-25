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

    .secs{
        height:150px;
        border-radius:5px;
        margin-top:20px;
        background-color: #f0f2f5;
    }

    .sec2{
        height:180px;
        border-radius:5px;
        margin-top:20px;
        background-color: #f0f2f5;
    }

</style>
<!-- .topbar-wrap -->
<div class="page-content">
<div class="">
<div class="main-content">
    <div class="content-area card col-md-10" style="margin:auto;">
        <div class="card-innr">

        <div class="text-center">
            <h1>Rate Calculator</h1>
            <p>Know the value of your transaction</p>
            <hr><br>
        </div>
        <div class="row">
        <div class="col-md-6" style="border: 1px solid #dedcdc;border-radius:3%;">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Buy</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Sell</a></li>
            </ul>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
                <div class="tab-pane fade show active" id="personal-data">
                    <br>

                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="Digital Assets" class="input-item-label">Digital Assets</label>
                                    <select class="select-bordered select-block digital" required>
                                    <option selected>Select Digital Assets</option>
                                    <option value="ITunes">Itunes Card</option>
                                    <option value="Amazon">Amazon Card</option>
                                    <option value="Paypal">PayPal</option>
                                    <option value="BTC">BTC</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" id="cad">
                                <div class="input-item input-with-label">
                                    <label for="Card Types" class="input-item-label">Card Type</label>
                                    <select class="select-bordered select-block" id="" required>
                                        <option selected>Select Card Type</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" id="cou">
                                <div class="input-item input-with-label">
                                    <label for="Country" class="input-item-label">Country</label>
                                    <select class="select-bordered select-block" id="" required readonly>
                                        <option selected>Select Country</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="Digital Assets">Amount($)</label>
                                    <input type="text" class="form-control " id="amt" >
                                </div>
                            </div>
                              {{-- <div class="gaps-1x"></div>
                              <div class="d-sm-flex justify-content-between align-items-center">
                                  <button class="btn btn-info">Trade Now</button>
                                  <div class="gaps-2x d-sm-none"></div>

                              </div> --}}
                            {{-- </form> --}}

                        </div>
                        <!-- .tab-pane -->
                        <div class="tab-pane fade" id="password">
                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="Digital Assets" class="input-item-label">Digital Assets</label>
                                    <select class="select-bordered select-block digital2" required>
                                    <option selected>Select Digital Assets</option>
                                    <option value="ITunes">Itunes Card</option>
                                    <option value="Amazon">Amazon Card</option>
                                    <option value="Paypal">PayPal</option>
                                    <option value="BTC">BTC</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" id="cad2">
                                <div class="input-item input-with-label">
                                    <label for="Card Types" class="input-item-label">Card Type</label>
                                    <select class="select-bordered select-block" id="" required>
                                        <option selected>Select Card Type</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" id="cou2">
                                <div class="input-item input-with-label">
                                    <label for="Country" class="input-item-label">Country</label>
                                    <select class="select-bordered select-block" id="" required readonly>
                                        <option selected>Select Country</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="Digital Assets">Amount($)</label>
                                    <input type="text" class="form-control " id="amt2" >
                                </div>
                            </div>
                        </div>
                        </div>
        </div>
        <div class="col-md-3" style="border: 1px solid #dedcdc;border-radius:3%;margin:20px;">
          <h2>Trade Info</h2>
          <p>Asset Type: <span id="atype"></span></p>
          <p>Country: <span id="coun"></span></p>
          <p>Card Type: <span id="ctype"></span></p>
          <p>Asset Value: <span id="aval"></span></p><br>
          <h2>Total Payout</h2>
          <strong><h2 id="pout"></h2></strong><br>
          <h4>Rate: ₦/$</h4>
          <p></p>
        </div>
    </div>
                        </div>
                    </div>
                    <!-- .card-innr -->
                </div>
                <!-- .card -->
</div>
<!-- .col -->
</div>

@endsection

@section('script')
<script>
$(document).ready(function(){
var current;
    axios.get("{{ route('fetch_rates') }}").then(data =>{
        current = data.data.USD_NGN;
    });


$('.digital').on('change',function(){
    var digital = $(this).val();
    $("#atype").html(digital);

    if(digital == "BTC"){
        $("#cad").hide();
        $("#cou").hide();
        $("#amt").prop('disabled', false);
    }else{
        $("#cad").show();
        $("#cou").show();
        $("#amt").prop('disabled', true);

    }


});

$(document).on('keyup', '#amt', function(){
   var amount = $("#amt").val();
   $("#aval").html('$'+amount);
    compute = (amount * current).toFixed(2);
    $("#pout").html('₦'+compute);

  });


//################### for selling ###########

$('.digital2').on('change',function(){
    var digital2 = $(this).val();
    $("#atype").html(digital2);

    if(digital2 == "BTC"){
        $("#cad2").hide();
        $("#cou2").hide();
        $("#amt2").prop('disabled', false);
    }else{
        $("#cad2").show();
        $("#cou2").show();
        $("#amt2").prop('disabled', true);

    }
//     axios.get("{{ url('') }}").then(data =>{});

});

$(document).on('keyup', '#amt2', function(){
   var amount = $("#amt2").val();
   if(amount !== ''){
   $("#aval").html('$'+amount);
   var selling = (amount * current) + 10;
    compute = (selling).toFixed(2);
    $("#pout").html('₦'+compute);
   }else{
    $("#aval").html('');
    $("#pout").html('');
   }
  });

});
</script>
@endsection
