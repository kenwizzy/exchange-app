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

</style>
<!-- .topbar-wrap -->
<div class="page-content">
<div class="container">
<div class="row">
<div class="main-content col-md-7" style="margin:auto;">
    <div class="content-area card">
        <div class="card-innr">

            @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
            @section('script')
            <script>
                 Notiflix.Report.Failure( 'Opps!', '{{ $errors }}', 'Dismiss' );
                 setTimeout(function (){
                    location.reload();
                }, 4000);
            </script>
            @endsection
            @endforeach

        @endif

            @if (session('success'))
            @section('script')
            <script>
                Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
                setTimeout(function (){
                    location.reload();
                }, 5000);
            </script>
            @endsection
        @endif

        @if (session('error'))
        @section('script')
            <script>
                Notiflix.Report.Failure( 'Error!', '{{ session('error') }}', 'Ok' );
                setTimeout(function (){
                    location.reload();
                }, 5000);
            </script>
            @endsection
        @endif

            <div class="card-head">
                <h3 class="text-center" style="font-size:30px;color:#4d71ca;">Buy Or Sell Bitcoin</h3>
                <p class="text-center" style="color:#4d71ca;;">A simple way to buy or sell cryptocurrency within minutes</p>
            </div><br>
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Buy</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Sell</a></li>
            </ul><br>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
                <div class="tab-pane fade show active" id="personal-data">
                <form action="{{route('buy_btc')}}" method="POST">
                    {{-- @method('POST') --}}
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="nationality" class="input-item-label">Currency to buy</label>
                                    <select class="select-bordered select-block" name="" id="">
                                        <option value="Btc">Bitcoin(BTC)</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="nationality" class="input-item-label">Buy With</label>
                                    <select class="select-bordered select-block" name="" id="">
                                        <option value="">Naira(NGN)</option>

                                    </select>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>

                         <div class="row">
                            <div class="col-md-12" id="pay">
                                <label for="">Amount to Buy</label>
                                    <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">BTC</div>
                                    </div>
                                    <input type="text" name="btc_amount" class="form-control btc_text" id="btc_text">
                                    <div class="input-group-prepend">
                                  <div>
                                  <button type="button" id="pay_id" data-toggle="tooltip" data-placement="top" title="Switch to Amount to Spend" class="input-group-text form-control"><em class="ikon ikon-transactions"></em></button>
                                </div>
                                    </div>
                                  </div>
                                  <p id="bal" style="margin-top: -20px;"></p>
                              </div></div>

                              <div class="col-md-12">
                                <div class="input-item input-with-label">
                                  <input class="input-bordered" type="hidden" id="pass" name="pay_amount" required readonly>
                                </div>

                                </div>

                              <div class="row">
                              <div class="col-md-12" id="spend">
                                <label for="">Amount to Spend</label>
                                    <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">NGN</div>
                                    </div>
                                    <input type="number" class="form-control" id="bund">
                                    <div class="input-group-prepend">
                                  <div>
                                  <button type="button" id="spend_id" data-toggle="tooltip" data-placement="top" title="Switch to Amount to Buy" class="input-group-text form-control"><em class="ikon ikon-transactions"></em></button>
                                </div>
                                    </div>
                                  </div>
                              </div>
                         </div><br>
                              <!-- .row -->
                              <div class="gaps-1x"></div>

                                  <button id="sho" class="btn btn-success form-control">Submit</button>
                                  <div class="gaps-2x d-sm-none"></div>

                            </form>
                            <!-- form -->
                        </div>
                        <!-- .tab-pane -->
                        <div class="tab-pane fade" id="password">
                            <form action="{{route('sell_btc')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6" id="">
                                        <div class="input-item input-with-label">
                                            <label for="nationality" class="input-item-label">Currency to Sell</label>
                                            <select class="select-bordered select-block" name="" id="">
                                                <option value="Btc">Bitcoin(BTC)</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="">
                                        <div class="input-item input-with-label">
                                            <label for="nationality" class="input-item-label">Sell For</label>
                                            <select class="select-bordered select-block" name="" id="">
                                                <option value="United State">Naira(NGN)</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- .col -->
                                </div>
                                <!-- .row -->
                                <div class="row">
                                    <div class="col-md-12" id="sell">
                                        <label for="">Amount to Sell</label>
                                            <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">BTC</div>
                                            </div>
                                            <input type="text" name="sell_amt" class="form-control" id="btc_sell" required>
                                            <div class="input-group-prepend">
                                          <div>
                                          <button type="button" id="sell_id" data-toggle="tooltip" data-placement="top" title="Switch to Amount to Receive" class="input-group-text form-control"><em class="ikon ikon-transactions"></em></button>
                                        </div>
                                            </div>
                                          </div>
                                          <p id="sell_bal" style="margin-top: -20px;"></p>
                                      </div></div>

                                      <div class="col-md-12">
                                        <div class="input-item input-with-label">
                                          <input class="input-bordered" type="hidden" id="rec_amt" name="receive_amt" required readonly>
                                        </div>

                                        </div>

                                      <div class="row">
                                      <div class="col-md-12" id="receive">
                                        <label for="">Amount to Receive</label>
                                            <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">NGN</div>
                                            </div>
                                            <input type="number" class="form-control" id="receive_id">
                                            <div class="input-group-prepend">
                                          <div>
                                          <button type="button" id="rec_id" data-toggle="tooltip" data-placement="top" title="Switch to Amount to Sell" class="input-group-text form-control"><em class="ikon ikon-transactions"></em></button>
                                        </div>
                                            </div>
                                          </div>
                                      </div>
                                 </div><br>
                                <div class="gaps-1x"></div>
                                <!-- 10px gap -->
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <button id="sho" class="btn btn-success form-control">Submit</button>
                                    <div class="gaps-2x d-sm-none"></div>

                                </div>
                            </form>
                            </div>
                            <!-- .tab-pane -->
                        </div>
                        <!-- .tab-content -->
                    </div>
                    <!-- .card-innr -->
                </div>
                <!-- .card -->
</div>
<!-- .col -->
</div>
<div class="main-content col-lg-1"></div>
<!-- .container -->
</div>
<!-- .container -->
</div>
<!-- .page-content -->
@endsection
@section('script')
<script>
var me;
$(document).ready(function(){
    $("#sho").prop('disabled', true);
    $("#spend").hide();
    $("#receive").hide();

    fetch("{{ url('/getbtc') }}")
     .then(response => response.text()
     .then(response => {
    me = response;
     }));

     $("#btc_text").keyup(function(){
    var compute;
    change = $('#btc_text').val();

    if(change!== ''){
        $("#sho").prop('disabled', false);
    }else{
        $("#sho").prop('disabled', true);
    }

    if(change != 0){
    var amount = (change * me).toFixed(2);
    compute = "= NGN "+(change * me).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }else{
        compute = "";
    }

    $('#bal').html(compute);
    $('#pass').val(amount);
  });

     $(document).on('click', '#pay_id', function (){
        $("#pay").hide();
        $("#spend").show();
     });

     $(document).on('click', '#spend_id', function (){
        $("#pay").show();
        $("#spend").hide();

    //var comp;
    var spend_val = $('#bund').val();
    if(spend_val !== ''){
        $("#sho").prop('disabled', false);
    }else{
        $("#sho").prop('disabled', true);
    }

    if(spend_val != 0){
    var result = (spend_val / me).toFixed(8);
    $('#btc_text').val(result);
    var amount2 = (result * me).toFixed(2);
    var comp = "= NGN "+(result * me).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    $('#pass').val(amount2);
    $('#bal').html(comp);
    }else{
        comp = "";
    }

     });


     $("#btc_sell").keyup(function(){
    var computer;
    changer = $('#btc_sell').val();
    if(changer != 0){
    var amoun = (changer * me).toFixed(2);
    computer = "= NGN "+(changer * me).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }else{
        computer = "";
    }
    console.log(computer);
    $('#sell_bal').html(computer);
    $('#rec_amt').val(amoun);
  });

  $(document).on('click', '#sell_id', function (){
        $("#sell").hide();
        $("#receive").show();
     });

     $(document).on('click', '#rec_id', function (){
        $("#sell").show();
        $("#receive").hide();

    //var comp;
    var spend_va = $('#receive_id').val();
    if(spend_va != 0){
    var re = (spend_va / me).toFixed(8);
    $('#btc_sell').val(re);
    var amount3 = (re * me).toFixed(2);
    var com = "= NGN "+(re * me).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    $('#rec_amt').val(amount3);
    $('#sell_bal').html(com);
    }else{
        com = "";
    }

     });


// $(document).on('submit', '#pay_tv', function (event){

// event.preventDefault();
// let data = $(this).serialize();
// axios.post("{{route('submit_television')}}", data).then(data =>{
//     //if(data.data.status === 201){
//         Notiflix.Report.Success('Success', data.data.code+ " Your Recharge of "+data.data.topup_amount+" "+data.data.paid_currency+" was successful", 'Ok' );

// console.log(data);

// }).catch( error => {

//     Notiflix.Report.Failure( 'Oops!', '{{(session('error'))}}', 'Ok' );
//     console.log(error);
// });
// });
$('#sho').on('click', function(){
        Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(7000);
});
});

</script>
@endsection
