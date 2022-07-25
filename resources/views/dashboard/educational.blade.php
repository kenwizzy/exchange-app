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

            <div class="col-lg-8 offset-2">
    <div class="content-area card">
    <div class="card-innr card-innr-fix">
        {{-- @include('includes.alerts') --}}
        <div class="card-head"><h6 class="card-title">Educational Payments</h6>
        </div>
        <div class="gaps-1x"></div>
        <!-- .gaps -->
        <form action="{{route('vend_airtime')}}" method="POST">
            @csrf
                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label class="input-item-label">Select Category</label>
                        <select name="category" class="sel select-block select-bordered" required>
                        <option value="">Select Category</option>
                        <option value="waec">WAEC</option>
                        <option value="neco">NECO</option>
                        </select>
                        </div>
                    </div>

                <div id="waec_pro" class="col-md-12">
                <div class="input-item input-with-label">
<label class="input-item-label">Select Product</label>
<select name="product" class="prod select-block select-bordered" required> waec_registration
<option value="">Select Product</option>
<option value="waec_registration">Waec Registration</option>
<option value="waec_result">Waec Result Checker</option>

</select>
</div>
                </div>

                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Amount</label>
                            <input id="res_price" name="amount" class="input-bordered" type="number" required readonly>
                            {{-- <span class="input-note">Input your Airtime Amount. </span> --}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Phone Number</label>
                            <input name="phone" class="input-bordered" type="number" required >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Email Address</label>
                            <input name="mail" class="input-bordered" type="email" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Quantity</label>
                            <input name="amount" class="input-bordered" type="number" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="input-item input-with-label">
<label class="input-item-label">Payment Method</label>
<select class="select select-block select-bordered">
<option value="selected">Naira Wallet</option>
</select>
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

@section('script')
<script>

$(document).ready(function(){
    $('#waec_pro').hide();
    $(".btn").prop('disabled', true);

    $('.sel').on('change',function(){
    var net = $(this).val();
    if(net == 'waec'){
        $('#waec_pro').show();
        $(".btn").prop('disabled', false);
    }else{
        $('#waec_pro').hide();
        $("#res_price").val("");
        $(".btn").prop('disabled', true);
    }
});

$('.prod').on('change',function(){
    var pro = $(this).val();
    if(pro == 'waec_registration'){
      var serviceID = "waec-registration";

    }else if(pro == 'waec_result'){
        var serviceID = "waec";

    }

    axios.get("{{url('dashboard/get_waec_reg')}}/"+serviceID).then(data =>{
        var price = data.data.toFixed(2);
    $("#res_price").val(price);
    });

});

});
</script>

@endsection

