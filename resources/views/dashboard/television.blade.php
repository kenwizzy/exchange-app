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

        <div class="card-head"><h6 class="card-title">Pay TV Subscriptions</h6></div>

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
        <form action="{{route('submit_television')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-item input-with-label">
                        <label class="input-item-label text-exlight">Enter SmartCard Number </label>
                    <input name="smartcard" class="input-bordered" id="smartcard" type="number" required>
                    <small style="color:red;">Note: The system automatically validates your SmartCard mumber with the TV Operator</small>
                    </div>
                    </div>


                <div class="col-md-6">
                <div class="input-item input-with-label">
<label class="input-item-label">TV Operators</label>
<select name="operator" class="select select-block select-bordered bund" id="operator" required>
    <option value="">Select TV Operator</option>
    <option value="dstv">DSTV</option>
    <option value="gotv">GOTV</option>
    <option value="startimes">StarTimes</option>
</select>
</div>

</div>
    </div>

    <div class="row" id="startimes">
        <div class="col-md-6">
            <div class="input-item input-with-label">
            <label class="input-item-label">Customer Name</label>
            <input name="" class="input-bordered" id="name" type="text" required readonly>
            </div>
        </div>

                        <div class="col-md-6">
                        <div class="input-item input-with-label">
    <label class="input-item-label">Operator</label>
    <input name="" class="input-bordered" id="operate" type="text" required readonly>


    </div>
                    </div>

                    </div>
                    <div id="dstv">
                        <strong>Account Info</strong> <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-item input-with-label">
                            <label class="input-item-label">Customer Name</label>
                            <input name="" class="input-bordered" id="name2" type="text" required readonly>
                            </div>
                        </div>

                                        <div class="col-md-4">
                                        <div class="input-item input-with-label">
                    <label class="input-item-label">Operator</label>
                    <input name="" class="input-bordered" id="operate2" type="text" required readonly>

                    </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-item input-with-label">
                    <label class="input-item-label">Smartcard Number</label>
                    <input name="card" class="input-bordered" id="status" type="text" required readonly>

                    </div>
                </div>

                <div id="stab" class="col-md-4">
                    <div class="input-item input-with-label">
<label class="input-item-label">Balance</label>
<input name="" class="input-bordered" id="sta" type="text" required readonly>

</div>
</div>
                                    </div>
                                    {{-- <div class="row" id="">
                                        <div class="col-md-4">
                                            <div class="input-item input-with-label">
                                            <label class="input-item-label">Primary Product</label>
                                            <input name="product" class="input-bordered" id="product" type="text" required readonly>
                                            </div>
                                        </div>

                                                        <div class="col-md-4">
                                                        <div class="input-item input-with-label">
                                    <label class="input-item-label">Balance Due</label>
                                    <input name="balance" class="input-bordered" id="balance" type="text" required readonly>

                                    </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="input-item input-with-label">
                                    <label class="input-item-label">Date Due</label>
                                    <input name="due" class="input-bordered" id="due" type="text" required readonly>

                                    </div>
                                </div>
                        </div> --}}
                        {{-- <div class="row">
                <input type="button" class="btn btn-success" id="info" style="margin:auto;">
            </div> --}}
            <hr>
<br>
{{-- <strong>Account Upgrades</strong> <hr> --}}
</div>
                <div class="row">
                    <div class="col-md-6" id="gotv">
                        <div class="input-item input-with-label">
    <label class="input-item-label">Packages</label>
    <select name="amount" class="select select-block select-bordered bundle" id="bundle2">

    </select>
    </div>
</div>

{{-- <div class="col-md-6" id="tup">
    <div class="input-item input-with-label">
    <label class="input-item-label">Top-up Amount</label>
    <input name="amount" class="input-bordered" id="amount2" placeholder="" type="number" required>
    </div>
</div> --}}

                    <div class="col-md-6">
                    <div class="input-item input-with-label">
<label class="input-item-label">Payment Method</label>
<select class="select select-block select-bordered">
<option value="selected">Naira Wallet</option>

</select>
</div>
                </div>
                </div>

                <div class="gaps-1x"></div>
                <button class="btn btn-primary" id="pay_tv">Pay Now</button>
            </form>
        </div><!-- .card-innr -->
    </div><!-- .card -->
</div>
    </div></div></div>
@endsection
@section('script')
<script>

$(document).ready(function(){
    $("#pay_tv").prop('disabled', true);
     $("#startimes").hide();
     $("#gotv").hide();
     $("#bundle2").attr('disabled','disabled');
     $("#dstv").hide();

        var smartcard;
        var operator;
    $('#operator').on('change',function(){
    smartcard = $('#smartcard').val();
    operator = $(this).val();
    var operator2 = $(this).children(":selected").text();

    axios.get("{{url('validate_television')}}/"+smartcard+"/"+operator).then(data =>{
        if(data.data.content.error == null){
$("#pay_tv").prop('disabled', false);
$("#startimes").hide();
$("#tup").hide();
$("#gotv").show();
$("#dstv").show();
$("#amount2").attr('disabled','disabled');
$("#bundle2").removeAttr('disabled');

$("#name2").val(data.data.content.Customer_Name);
$("#operate2").val(operator2);
if(operator2 == "StarTimes"){
$("#sta").val(data.data.content.Balance);
$("#status").val(data.data.content.Smartcard_Number);
$("#stab").show();
}else{
    $("#status").val(data.data.content.Customer_ID);
    $("#stab").hide();
}
//$("#info").val("Pay for Existing Product()");
fetch("{{ url('/tv_bundle') }}/"+operator)
     .then(response => response.text()
     .then(response => {
    let mer = response;
    //console.log(mer);
     $(".bundle").html(mer);
     }));

        }else{

            Notiflix.Report.Failure( 'Validation Error!', data.data.content.error, 'Ok' );
            setTimeout(function (){
            location.reload();
            }, 3500);
        }

});

// $(document).on('submit', '#pay_tv', function (event){

// event.preventDefault();
// let data = $(this).serialize();
// axios.post("{{route('submit_television')}}", data).then(data =>{
//  console.log(data);
//     if(data.data.code == "000"){
//         Notiflix.Report.Success('Success',data.data.response_description, 'Ok' );
//     }else{
//         Notiflix.Report.Failure('error',data.data.response_description, 'Ok' );
//     }

// }).catch( error => {

//     Notiflix.Report.Failure( 'Oops!', '{{(session('error'))}}', 'Ok' );

//  });
// });

    });
});
</script>

@endsection
