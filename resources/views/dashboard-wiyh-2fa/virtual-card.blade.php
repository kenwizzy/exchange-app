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

        <div class="col-lg-12">
        <div class="content-area card">
         <div class="card-innr" style="">
      <div class="row">
        <div class="col-md-5">
            <div class="card-head">
                <h1>Virtual Card</h1>
            </div>
            <p>Just like your regular cards, you can pay for your shopping online with your Miraweb card.</p>

          @if(count($cards) > 0)
          @foreach($cards as $card)
        <a href="{{route('dashboard.card', $card->id)}}"> <div class="payment-card bg-info" style="border-radius: 10px;  color: white;">

                      <div class="row">
                             <div class="col-sm-4">
                              <img src="{{asset('images/logo-light.png')}}" srcset="{{asset('images/logo-light.png')}} 2x" alt="logo">


                             </div>


                        <div class="col-sm-4">
                        <p style="text-align: center; color: white; font-size:17px;">{{$card->billing_name}}</p>
                        </div>
                    </div> <br>

                    <h2 style="text-align: center;  color: white;">
                        **** &nbsp;&nbsp;  **** &nbsp;&nbsp; **** &nbsp;&nbsp; ****
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <small>
                            <strong>CURRENT BALANCE</strong><br> <strong style="margin-top: -4px;font-size:20px;">{{number_format($card->balance, 2)}}</strong>
                            </small>
                        </div>

                        <div class="col-sm-6">
                            <small>
                            <strong>VALID THRU</strong><br> <p style="margin-top: -4px;font-size:20px;">{{$card->expiration}}</p>
                            </small>
                        </div>

                    </div>
                </div></a>
             @endforeach
  @endif




         </div>
        <div class="col-md-4">

            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal3">Create new card</button>

        </div>
    </div></div>
    </div>
        </div>

            </div>

            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Create Card</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                <div class="modal-body">
                <form action="{{route('create_card')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">Name on Card</label>
                                <input class="input-bordered" type="text" name="name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">Amount</label>
                                <input class="input-bordered setpin" type="text" name="amount" required placeholder="Min: 5 USD">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                            <label for="" class="input-item-label">Card Currency</label>
                            <select class="select-bordered select-block" name="currency" required>
                            <option value="">Select Currency</option>
                            <option value="NGN">NGN</option>
                            <option value="USD">USD</option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">Address</label>
                                <input class="input-bordered" type="text" name="address" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">City</label>
                                <input class="input-bordered " type="text" name="city" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">State</label>
                                <input class="input-bordered" type="text" name="state" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="old-pass" class="input-item-label">Postal Code</label>
                                <input class="input-bordered setpin" maxlength="5" type="text" name="postal_code" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label for="" class="input-item-label">Country</label>
                                <input class="input-bordered" type="text" name="country" required placeholder="Eg US/NGN">
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="modal-footer">
                        {{-- <p ><i class="fa fa-times" data-dismiss="modal" aria-hidden="true"></i>Close</p> --}}
                      <button type="button" class="btn" data-dismiss="modal" style="background-color:red">Close</button>
                      <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
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
$(document).ready(function(){

    $("#pa1").prop('disabled', true);
    $('.setpin').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
     });

});
</script>
@stop
