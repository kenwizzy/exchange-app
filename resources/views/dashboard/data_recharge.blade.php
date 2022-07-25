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
        <div class="card-head"><h6 class="card-title">Mobile Data Recharge</h6>

            @if (session('error'))
            @section('script')
            <script>
                Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
            </script>
            @endsection
        @endif

        @if (session('success'))
        @section('script')
            <script>
                Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
            </script>
            @endsection
        @endif

        </div>
        <div class="gaps-1x"></div>
        <!-- .gaps -->
        <form action="{{route('vend_data')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
<div class="input-item input-with-label">
      <label class="input-item-label">Select Network Category</label>
        <select name="network" class="select select-block select-bordered" id="network" required>
        <option value="">Select Network Provider</option>
        <option value="mtn-data" id="netbun">MTN</option>
        <option value="glo-data" id="netbun">GLO</option>
        <option value="etisalat-data" id="netbun">9MOBILE</option>
        <option value="airtel-data" id="netbun">AIRTEL</option>


         </select>
</div>
</div>

<div class="col-md-6">
    <div class="input-item input-with-label">
        <label class="input-item-label text-exlight">Enter Phone Number</label>
    <input name="phone" class="input-bordered" id="phone" placeholder="Sample 09022228880" type="number" required>

    </div>
    </div>

                </div>
                <div class="row">

    <div class="col-md-6">
        <div class="input-item input-with-label">
        <label class="input-item-label">Select Data Bundle</label>
        <select name="bundle" class="select select-block select-bordered" id="bund" required>

        </select>
        </div>
    </div>

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
    $('#network').on('change',function(){
    var phone = $('#phone').val();
    var net = $(this).val();

     fetch("{{ url('/get_data_bundle') }}/"+net)
     .then(response => response.text()
     .then(response => {
    let me = response;
    console.log(me);
     $("#bund").html(me);
     }));

});

});
</script>

@endsection
