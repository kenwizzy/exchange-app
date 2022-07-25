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

<div class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
    <div class="content-area card">
    <div class="card-innr card-innr-fix">
        @include('includes.alerts')
        <div class="card-head"><h6 class="card-title">Airtime Recharge</h6>
        </div>
        <div class="gaps-1x"></div>
        <!-- .gaps -->
        <form action="{{route('vend_airtime')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-item input-with-label">
                        <label class="input-item-label text-exlight">Enter Phone Number</label>
                    <input name="phone" class="input-bordered" placeholder="Sample 09022228880" type="number" required>

                    </div>
                    </div>

                <div class="col-md-6">
                <div class="input-item input-with-label">
<label class="input-item-label">Select Network Category</label>
<select name="network" class="select select-block select-bordered" required>
<option value="">Select Network Provider</option>
<option value="MTN">MTN</option>
<option value="Globacom">GLO</option>
<option value="9mobile">9MOBILE</option>
<option value="Airtel">AIRTEL</option>

</select>
</div>
                </div>

                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Airtime Amount</label>
                            <input name="amount" class="input-bordered" type="number" required>
                            <span class="input-note">Input your Airtime Amount. </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="input-item input-with-label">
<label class="input-item-label">Payment Method</label>
<select class="select select-block select-bordered">
<option value="selected">Naira Wallet</option>
{{-- <option value="option-one">Btc Wallet</option> --}}

</select>
</div>
                </div>
                </div>


                <div class="gaps-1x"></div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div><!-- .card-innr -->
    </div><!-- .card -->
</div>
    </div></div></div>
@endsection
