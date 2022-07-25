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
        {{-- @include('includes.alerts') --}}
        <div class="card-head"><h6 class="card-title">Pay Electricity Bills</h6></div>
        <div class="gaps-1x"></div>
        <!-- .gaps -->
        <form action="" id="elect" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-item input-with-label">
                        <label class="input-item-label text-exlight">Enter Meter Number</label>
                    <input name="meter" class="input-bordered" id="meter" type="number" required>
                    <small style="color:red;">Note: The system automatically validates your meter mumber with the distributor</small>
                    </div>
                    </div>


                <div class="col-md-6">
                <div class="input-item input-with-label">
<label class="input-item-label">Electricity Distributors</label>
<select name="network" class="select select-block select-bordered bund" id="network" required>

</select>
</div>

</div>
    </div>

    <div class="row" id="show">
        <div class="col-md-4">
            <div class="input-item input-with-label">
            <label class="input-item-label">Customer's Name</label>
            <input name="name" class="input-bordered" id="name" type="text" required readonly>
            </div>
        </div>

                        <div class="col-md-4">
                        <div class="input-item input-with-label">
    <label class="input-item-label">Customer's Address</label>
    <input name="address" class="input-bordered" id="address" type="text" required readonly>

    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-item input-with-label">
    <label class="input-item-label">Distributor's Name</label>
    <input name="distro" class="input-bordered" id="distro" type="text" required readonly>

    </div>
                    </div>
                    </div>

                <div class="row">
    <div class="col-md-6">
        <div class="input-item input-with-label">
        <label class="input-item-label">Top-up Amount</label>
        <input name="amount" class="input-bordered" id="amount" placeholder="" type="number" required>
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
@section('script')
<script>

$(document).ready(function(){
     $("#show").hide();
    fetch("{{ url('/get_electricity') }}")
     .then(response => response.text()
     .then(response => {
    let me = response;
    //console.log(me);
     $(".bund").html(me);
     }));

    //$("select.country").change(function(){
    $('#network').on('change',function(){
    var meter = $('#meter').val();
    var net = $(this).val();
    var net2 = $(this).children(":selected").text();

// });
//             $("#show").show();
//         }
//      //$("#bund").html(me);

    axios.get("{{url('/validate_electricity')}}/"+meter+"/"+net).then(data =>{
        if(data.data === ""){
        Notiflix.Report.Failure( 'Oops', 'Validation Failed! Please check the meter number and Distributor. Then Try Again Later', 'Ok' );
        setTimeout(function (){
        location.reload();
    }, 3500);
        }else{

       $("#address").val(data.data.address);
       $("#name").val(data.data.name);
       $("#distro").val(net2);
       $("#show").show();

        }
    });


});

$(document).on('submit', '#elect', function (event){

event.preventDefault();
let data = $(this).serialize();
axios.post("{{route('submit_electricity')}}", data).then(data =>{
    if(data.data.status === 201){
        Notiflix.Report.Success('Success', data.data.message, 'Ok' );
        setTimeout(function (){
        location.reload();
        }, 7000);

    }else{
Notiflix.Report.Failure( 'Oops!', data.data.message, 'Ok' );
setTimeout(function (){
    location.reload();
}, 7000);
    }

}).catch( error => {
    console.log(error);
    Notiflix.Report.Failure( 'Oops!', '{{(session('error'))}}', 'Ok' );
setTimeout(function (){
    location.reload();
}, 7000);
});
});


});
</script>

@endsection
