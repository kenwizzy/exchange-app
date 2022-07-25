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
<div class="col-lg-12">

<div class="content-area card">
<div class="card-innr card-innr-fix">
<div class="card-head">
<h6 class="card-title">Withdraw</h6>
</div>

@if(session('message'))
@section('script')
<script>
    Notiflix.Loading.Hourglass('Processing...');
    setTimeout(function (){
        var load = location.reload();
        if(load){
        Notiflix.Report.Success( 'Success', '{{ session('message') }}', 'Ok' );
    }
    }, 5000);
</script>
@endsection
 @endif

 @if (session('error'))
            @section('script')
            <script>
                Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
                setTimeout(function (){
                   location.reload();
                }, 4000);
            </script>
            @endsection
            @endif

 @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
            <script>
                Notiflix.Report.Failure( 'Opps', '{{ $errors }}', 'Dismiss' );
                setTimeout(function (){
                    location.reload();
                }, 5000);
            </script>
    @endforeach
@endif

        @php
        if($data->bank_name != null){
        $result = $data->bank_name;
        $res = explode('-', $result);
        $bank = $res[1];
        $bank_code = $res[0];
        }else{
            $bank = "";
            $bank_code = "";
        }
        @endphp

<div class="gaps-1x"></div>
<!-- .gaps -->
<form action="" method="POST">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="input-item input-with-label">
            <label class="input-item-label text-exlight">Bank Name</label>
        <input class="input-bordered" name="" type="text" value="{{$bank}}" readonly required>
        <input class="input-bordered" name="" type="hidden" value="{{$bank_code}}" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-item input-with-label">
            <label class="input-item-label text-exlight">Account Name</label>
            <input class="input-bordered" name="" type="text" value="{{$data->holder_name}}" readonly required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="input-item input-with-label">
            <label class="input-item-label text-exlight">Account Number</label>
            <div class="relative">
                <span class="input-icon input-icon-right"><em class="ti ti-mobile"></em></span>
                <input class="input-bordered" name="" type="text" value="{{$data->account_number}}" readonly required>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-item input-with-label">
            <label class="input-item-label text-exlight">Amount</label>
            <input name="" class="input-bordered amount" type="number" placeholder="Min 1000">
        <input id="ac_bal" class="input-bordered" type="hidden" value="{{$wallet->balance}}">
        </div>
        <p style="color:black; font-size: 12px;margin-top:-10px;">Fee is ₦<span id="charge" style="color:black; font-size: 14px;">100</span></p>
        <p id="calc_amt" style="color:black; font-size: 13px; color:red;"></p>

    </div>
</div>

<div class="gaps-1x">

</div>
<button type="button" id="btn" class="btn btn-info" data-toggle="modal" data-target="#modal-centered">Withdraw</button>

</form>
</div>
<!-- .card-innr -->

<div class="modal fade" id="modal-centered" tabindex="-1" aria-hidden="true" style="display: none;"><div class="modal-dialog modal-dialog-sm modal-dialog-centered"><div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a><div class="popup-body">
    <h3 class="popup-title" style="text-align: center;">Enter Pin</h3>
    <p style="text-align: center;"></p>

    <form action="{{route('submit_withdrawal')}}" method="POST">
        @csrf
    <div class="form-group" style="text-align: center;">
        <input name="digit1" class="inputs setpin" type="password" required size="1" maxlength="1" style="margin: 10px; padding: 10px;">
        <input name="digit2" class="inputs setpin" type="password" required size="1" maxlength="1" style="margin: 10px; padding: 10px;">
        <input name="digit3" class="inputs setpin" type="password" required size="1" maxlength="1" style="margin: 10px; padding: 10px;">
        <input name="digit4" class="inputs setpin" type="password" required size="1" maxlength="1" style="margin: 10px; padding: 10px;">
        <input class="input-bordered" name="bank_code" type="hidden" value="{{$bank_code}}" readonly>
        <input class="input-bordered" name="acc_name" type="hidden" value="{{$data->holder_name}}" readonly required>
        <input class="input-bordered" name="acc_num" type="hidden" value="{{$data->account_number}}" readonly required>
        <input id="ac_bal" class="input-bordered" type="hidden" value="{{$wallet->balance}}">
        <input name="amount" class="input-bordered amt" type="hidden" >
     </div>

     <div  style="text-align: center;">
     <button type="submit" class="btn btn-info">Ok</button> </div>
</div>
</form>
</div><!-- .modal-content --></div><!-- .modal-dialog --></div>


</div>
<!-- .card -->
</div>
</div>
<!-- .container -->
</div>
<!-- .page-content -->

@endsection
@section('script')
<script>
$(document).ready(function(){
$("#btn").prop('disabled', true);
$(".amount").keyup(function(){
   var charge = $("#charge").text();
   var change = $(".amount").val();
   if(change >= 1000){
    $('.amt').val(change);
    var compute = parseInt(change) - parseInt(charge);
   $("#calc_amt").html('You get ₦'+compute);
   $("#btn").prop('disabled', false);

   }else{
    var compute = "";
   $("#calc_amt").html('');
   $("#btn").prop('disabled', true);
   }

  });

  $('.setpin').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
     });

$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      var $next = $(this).next('.inputs');
      if ($next.length)
          $(this).next('.inputs').focus();
      else
          $(this).blur();
    }
});
});
  </script>
  @endsection
