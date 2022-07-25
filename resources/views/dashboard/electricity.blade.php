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
        @if (session('error'))
        @section('script')
        <script>
            Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
            setTimeout(function (){
                   location.reload();
                }, 2000);
        </script>
        @endsection
    @endif

    @if (session('success'))
    @section('script')
        <script>
            Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
            setTimeout(function (){
                   location.reload();
                }, 2000);
        </script>
        @endsection
    @endif

    @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
            @section('script')
            <script>
                Notiflix.Report.Failure( 'Error!', '{{ $errors }}', 'Dismiss' );
                setTimeout(function (){
                   location.reload();
                }, 2000);
            </script>
            @endsection
    @endforeach
@endif
        <div class="gaps-1x"></div>
        <!-- .gaps -->
        <form action="{{route('submit_electricity')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="input-item input-with-label">
                        <label class="input-item-label text-exlight">Enter Meter Number</label>
                    <input name="meter" class="input-bordered" id="meter" type="text" required>
                    <small style="color:red;">Note: The system automatically validates your meter mumber with the distributor</small>
                    </div>
                    </div>


                <div class="col-md-4">
                <div class="input-item input-with-label">
<label class="input-item-label">Meter Type</label>
<select name="type" class="select select-block select-bordered" id="type" required>
   <option value="">Select Meter Type</option>
   <option value="Prepaid">Prepaid</option>
   <option value="Postpaid">Postpaid</option>
</select>
</div>

</div>

<div class="col-md-4">
    <div class="input-item input-with-label">
<label class="input-item-label">Electricity Distributors</label>
<select name="network" class="select select-block select-bordered" id="network" required>
    <option value="">Select Distributor</option>
    <option value="ikeja-electric">IKEDC – Ikeja Electricity</option>
    <option value="eko-electric">EKEDC – Eko Electricity</option>
    <option value="kano-electric">KEDCO – Kano Electricity</option>
    <option value="portharcourt-electric">PHED – Port Harcourt Electricity</option>
    <option value="jos-electric">JED – Jos Electricity</option>
    <option value="eko-electric">IBEDC – Ibadan Electricity</option>
    <option value="kaduna-electric">KAEDCO – Kaduna Electricity</option>
    <option value="abuja-electric">AEDC – Abuja Electricity</option>
</select>
</div>

</div>
    </div>
<div id="show">
    <div class="row">
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
<label class="input-item-label">Customer's Meter Number</label>
<input name="customer_meter" class="input-bordered" id="cust_meter" type="text" required readonly>
</div>
    </div>

    <div class="col-md-6">
        <div class="input-item input-with-label">
<label class="input-item-label">Customer's Phone Number</label>
<input name="phone" class="input-bordered" type="number" required>
</div>
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
                <button class="btn btn-primary" id="elect">Submit</button>
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
     $("#elect").prop('disabled', true);
    $('#network').on('change',function(){
    var meter = $('#meter').val();
    var type = $('#type').val();
    var net = $(this).val();

   if(type==""){
           Notiflix.Report.Failure( 'Opps!', 'Please Select Meter Type', 'Ok' );
            setTimeout(function (){
            location.reload();
            }, 500);
   }

    //var net2 = $(this).children(":selected").text();
    axios.get("{{url('/validate_electricity')}}/"+meter+"/"+net+"/"+type).then(data =>{
        if(data.data.content.error == null){
            $("#show").show();
            $("#address").val(data.data.content.Address);
            $("#name").val(data.data.content.Customer_Name);
            $("#distro").val(net);
            $("#cust_meter").val(data.data.content.Meter_Number);
            $("#elect").prop('disabled', false);
        }else{
            Notiflix.Report.Failure( 'Verification Error!', data.data.content.error, 'Ok' );
            setTimeout(function (){
            location.reload();
            }, 3500);
        }
    });
});

// $(document).on('submit', '#elect', function (event){

// event.preventDefault();
// let data = $(this).serialize();
// axios.post("{{route('submit_electricity')}}", data).then(data =>{
//     if(data.data.status === 201){
//         Notiflix.Report.Success('Success', data.data.message, 'Ok' );
//         setTimeout(function (){
//         location.reload();
//         }, 7000);

//     }else{
// Notiflix.Report.Failure( 'Oops!', data.data.message, 'Ok' );
// setTimeout(function (){
//     location.reload();
// }, 7000);
//     }

// }).catch( error => {
//     console.log(error);
//     Notiflix.Report.Failure( 'Oops!', '{{(session('error'))}}', 'Ok' );
// setTimeout(function (){
//     location.reload();
// }, 7000);
// });
// });


});
</script>

@endsection
