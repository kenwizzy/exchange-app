@extends('layouts.dashboard')
@section('content')

<style type="text/css">

    @media screen (min-width: 992px) {
.payment-card {
padding:40px !important;
}
}




/* .card-innr {
        text-align: center;
        } */
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

        .payment-card {
background: #ffffff;
padding: 20px;
margin-bottom: 25px;
border: 1px solid #e7eaec;
}
.payment-icon-big {
font-size: 60px;
color: #d1dade;
}
.payments-method.panel-group .panel + .panel {
margin-top: -1px;
}
.payments-method .panel-heading {
padding: 15px;
}
.payments-method .panel {
border-radius: 0;
}
.payments-method .panel-heading h5 {
margin-bottom: 5px;
}
.payments-method .panel-heading i {
font-size: 26px;
}

.payment-icon-big {
font-size: 60px !important;
color: #d1dade;
}

.form-control,
.single-line {
background-color: #FFFFFF;
background-image: none;
border: 1px solid #e5e6e7;
border-radius: 1px;
color: inherit;
display: block;
padding: 6px 12px;
transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
width: 50%;
font-size: 14px;
}
.text-navy {
color: #1ab394;
}
.text-success {
color: #1c84c6;
}
.text-warning {
color: #f8ac59;
}
.ibox {
clear: both;
margin-bottom: 25px;
margin-top: 0;
padding: 0;
}
.ibox.collapsed .ibox-content {
display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
content: "\f077";
}
.ibox:after,
.ibox:before {
display: table;
}
.ibox-title {
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
-moz-border-right-colors: none;
-moz-border-top-colors: none;
background-color: #ffffff;
border-color: #e7eaec;
border-image: none;
border-style: solid solid none;
border-width: 3px 0 0;
color: inherit;
margin-bottom: 0;
padding: 14px 15px 7px;
min-height: 48px;
}
.ibox-content {
background-color: #ffffff;
color: inherit;
padding: 15px 20px 20px 20px;
border-color: #e7eaec;
border-image: none;
border-style: solid solid none;
border-width: 1px 0;
}
.ibox-footer {
color: inherit;
border-top: 1px solid #e7eaec;
font-size: 90%;
background: #ffffff;
padding: 10px 15px;
}
.text-danger {
color: #ed5565;
}

.line{
    height:1px;
    border:none;
    color:rgb(170, 169, 169);
    background-color:rgb(170, 169, 169);
    width:100%;
    margin-top:-10px;
}

</style>

<div class="page-content">
    <div class="container">

        @if (session('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ session('success') }}</p>
        </div>
    @endif

    {{-- @if(session()->has('success'))
            <script>
                Notiflix.Report.Success( 'Success!', '{!! session()->get('success') !!}', 'Ok' );
            </script>
        @endif --}}

    @if (session('error'))
        <div class="alert alert-danger">
            <p class="text-center">{{ session('error') }}</p>
        </div>
    @endif

    @if(count($errors) > 0)
            @foreach($errors->all() as $errors)

            <script>
                Notiflix.Notify.Failure('{{$errors}}');
            </script>

            @endforeach
@endif
@php
$var = str_split($card->card_pan,4);

@endphp
        <div class="col-lg-12">
        <div class="content-area card">
         <div class="card-innr" style="">
      <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="card-head">
                <h1>Virtual Card</h1>
            </div>
            {{-- <p>Just like your regular cards, you can pay for your shopping online with your Miraweb card.</p> --}}

            <div class="payment-card bg-info" style="border-radius: 10px;  color: white;">

                <div class="row">
                       <div class="col-sm-4">
                           <img src="{{asset('images/logo-light.png')}}" srcset="{{asset('images/logo-light.png')}} 2x" alt="logo">
                       </div>


                  <div class="col-sm-6">
                  <p style="text-align: center; color: white; font-size:17px;">{{$card->name_on_card}}</p>
                  </div>

                  <div class="col-sm-2">

                     </div>
              </div> <br>

              <h2 style="text-align: center;  color: white;">
                  {{$var[0]}} &nbsp;&nbsp;  {{$var[1]}} &nbsp;&nbsp; {{$var[2]}} &nbsp;&nbsp; {{$var[3]}}

              </h2>
              <div class="row">
                  <div class="col-md-5 col-sm-12 col-xs-12">
                      <small>
                      <strong>CURRENT BALANCE</strong><br> <strong style="margin-top: -4px;font-size:20px;">{{$card->currency=='NGN'?'₦':'$'}}{{number_format($card->amount, 2)}}</strong>
                      </small>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12">
                      <small>
                      <strong>VALID THRU</strong><br> <p style="margin-top: -4px;font-size:20px;">{{$card->expiration}}</p>
                      </small>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12">
                      @if($card->card_type == "mastercard")
                    <img src="https://seeklogo.com/images/M/mastercard-logo-473B8726A9-seeklogo.com.png" width="50" height="auto">
                      @elseif($card->card_type == "visa")
                      <img src="https://image.shutterstock.com/image-photo/kiev-ukraine-march-21-2015-600w-267662744.jpg" width="50" height="auto">
                      @else
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33RPOgICXOLbVA1FJWrA1bi4SRD7yXQCwWg&usqp=CAU" width="50" height="auto">
                      @endif

                </div>
              </div>
          </div>
                @if($card->is_active == true)
                 <button type="button" class="btn btn-success btn-sm">Card Activated</button><br><br>
                 @else
                 <button type="button" class="btn btn-danger btn-sm">Card Deactivated</button><br><br>
                 @endif
         </div>
        <div class="col-md-7">

   <div class="row">
                <div class="col-md-2">
                   <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-sm">Fund Card</button><br><br>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-1">
                @if($card->is_active == true)
                 <button type="button" id="block" class="btn btn-danger btn-sm">block</button><br><br>
                 @else
                 <button type="button" id="block" class="btn btn-info btn-sm">unblock</button><br><br>
                 @endif
                </div>
        </div>

        </div>

    </div></div>
    </div>
        </div>

        <div class="col-md-12">
    <div class="row">

        <div class="col-lg-5 col-xs-12">
            <div class="content-area card" style="border-radius:8px;">
             <div class="card-innr ">

                <div class="card-head">
                    <h1>Card Details</h1>
                </div>

         <strong>CARD NAME</strong>
         <p>{{$card->name_on_card}}</p><hr class="line">
         <strong>CARD NUMBER</strong>
         <p>{{$card->card_pan}}</p><hr class="line">
         <strong>CARD CVV</strong>
        <p>{{$card->cvv}}</p><hr class="line">
         <strong>BILLING ADDRESS</strong>
         <p>1{{$card->address_1}}</p><hr class="line">
         <strong>ZIP CODE</strong>
         <p>{{$card->zip_code}}</p><hr class="line">
    </div>
        </div>
            </div>

            <div class="col-lg-7 col-xs-12">
                <div class="content-area card" style="border-radius:8px;">
                 <div class="card-innr">

                    <div class="card-head">
                        <h1>Card Transactions</h1>
                    </div>
                @if(count($details) > 0)
                    <div class="table-responsive table-bordered">
                        <table class="table display product-overview mb-30" id="support_table5">
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Product</th>
                                    <th>Reference</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sn = 1; @endphp
                            @foreach($details as $data)
                                <tr>
                                   <td>{{$sn++}}</td>
                                <td>{{number_format($data->amount,2)}}</td>
                                    <td>{{number_format($data->fee,2)}}</td>
                                    <td>{{$data->product}}</td>
                                    <td>{{$data->reference}}</td>
                                    <td>{{$data->currency}}</td>
                                    <td>

                                        <div class="btn-group">
                                            <button class="btn btn-success" type="button">
                                                {{$data->status}} <span class="caret"></span>
                                            </button>

                                        </div>


                                    </td>

                                    <td>{{date('Y-m-d h:i:sa', strtotime($data->created_at))}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                @else

                    <div class="text-center">
                        <img src="{{asset('images/no-t.svg')}}">
                        <div class="card-head"><h4 class="card-title">You Currently Have No Transactions</h4></div>
                        <p>You haven’t purchased anything with your card yet.</p>
                     </div>
                    @endif
            </div>
            </div></div>
                </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Fund Card</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="{{route('fund_card')}}" method="POST">
                        @csrf
                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label for="Amount" class="input-item-label">Amount</label>
                            <input class="input-bordered setpin" type="text" name="amt" required>
                        <input class="input-bordered" type="hidden" id="card_id" name="id" value="{{$card->id}}" required>
                        <input class="input-bordered" type="hidden" name="currency" value="{{$card->currency}}" required>
                        </div>

                        </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal" style="background-color:red">Close</button>
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
          </div>
        </div>
      </div>

            </div>
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
    Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(3000);
$(document).ready(function(){

    $("#pa1").prop('disabled', true);
    $('.setpin').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
     });

     $(document).on('click', '#block', function(){
     var card_id = $('#card_id').val();
     var status = $('#block').text();
     Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(3000);

        axios.post("{{ url('/update_card') }}/"+card_id+"/"+status).then(data =>{
        if(data.data.status == "success"){

            Notiflix.Report.Success( 'Success', data.data.message, 'Ok' );
            setTimeout(function (){
            location.reload();
         }, 3000);

        }else{

        Notiflix.Report.Failure( 'Oops!', data.data.message, 'Ok' );
        setTimeout(function (){
        location.reload();
    }, 3000);
   }

   });

     });

});
</script>
@stop
