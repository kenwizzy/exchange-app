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

        #blink {
            font-weight: bold;
            transition: 0.5s;
        }

</style>

<div class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-8" style="margin:auto">
    <div class="content-area card">
    <div class="card-innr card-innr-fix">

        @if (session('success'))
            @section('script')
            <script>
                Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
                setTimeout(function (){
                   location.reload();
                }, 4000);
            </script>
            @endsection
            @endif

            @if (session('error'))
            @section('script')
            <script>
                Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
            </script>
            @endsection
            @endif

        <div class="card-head"><h6 class="card-title">Have Airtime you don't need? Trade it for cash now</h6>
        </div>
        <div class="gaps-1x"></div>
        {{-- modal --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">To complete this request, follow the instructions below.</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                </div>
              </div>
            </div>
          </div>



        <!-- .gaps -->
        <form action="#" method="POST">
            @csrf

            <div class="col-md-12">
                <div class="input-item input-with-label">
                    <label class="input-item-label text-exlight">Enter Phone Number</label>
                <input name="phone" class="input-bordered" id="number" type="number" required>

                </div>
                </div>
 <div class="col-md-12">
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
                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Airtime Amount</label>
                            <input name="amount" class="input-bordered" id="amt" type="number" required>
                            <span id="show" class="input-note text-danger"></span>
                            <small>Wallet Bal: ₦<span class="bal">{{$wallet->balance}}</span></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Rate(%)</label>
                            <input class="rate input-bordered" readonly>
                       </div>
                        </div>

                    <div class="col-md-12">
                <div class="input-item input-with-label">
                    <label class="input-item-label">You will receive</label>
                    <input class=" receive input-bordered" readonly>
               </div>
                </div>

                <div class="gaps-1x"></div>
                <button id="btn" type="button" class="btn btn-primary">Submit</button>
            </form>
        </div><!-- .card-innr -->
    </div><!-- .card -->
</div>
    </div></div></div>
@endsection
@section('script')
<script>
$(document).ready(function(){
    var amount;var receive;var net;var res;var phone;var compute;
    var bal = parseInt($('.bal').html());// convert to number type
    $("#btn").prop('disabled', true);
    $('.select').on('change',function(){
    phone = $('#number').val();
    $(".rate").val(30);
    net = $(this).val();

    axios.get("{{ url('/get_data_bundle_2') }}/"+phone+"/"+net).then(data =>{
        res = data.data.opts.operator;
        if(res == net){
        console.log(res);

    }else{
        Notiflix.Report.Failure( 'Oops!', 'Invalid Network Operator Selected.', 'Ok' );
        setTimeout(function (){
        location.reload();
    }, 2000);
        }
});

});

    $(document).on('keyup', '#amt', function(){
   amount = parseInt($("#amt").val());
   compute = (amount - (amount * 0.3)).toFixed(2);
//console.log(jQuery.type(amount)); to know the data type
    if(amount == '' || net == ''){
    $("#btn").prop('disabled', true);
    receive = $('.receive').val('');
}else{
   $("#btn").prop('disabled', false);
   receive = $('.receive').val('₦'+compute);
}

// else{
//         $("#show").html('');
//     }

if(amount < 200){
     $("#show").html('Amount can not be below ₦200');
     $("#btn").prop('disabled', true);
    }else{
        $("#show").html('');
    }

    if(amount > bal){
     $("#btn").prop('disabled', true);
     $("#show").html('Insufficient Balance');
}

  });

  $("#btn").on('click', function(){
    $("#exampleModal").modal({show:true});
    if(res == "MTN"){
     $(".modal-body").html(`
       <form action="{{route('submit_confirm')}}" enctype="multipart/form-data"" method="POST">
                    @csrf
        <div class="text-center">
        <p>transfer ₦${amount} worth of airtime to this phone number below:</p>
        <h1><b>09035460244</b></h1>
        <small class="text-danger">PLEASE WE DO NOT ACCEPT VTU OR RECHARGE PIN</small>
        </div>
       <h4>How to transfer MTN Airtime</h4>
       <p>Dial *600*09035460244*${amount}*PIN#</p><br>
       <h4>How to change your Pin</h4>
       <p>Your default Pin is 0000 <small>You are advised to change your default pin to the desired one.</small></p>
       <p>To change your pin,
       <span>Dial: *600*Default-pin*Newpin*Newpin#</span>
       <p><b id="blink" style='color:red;'>NOTE: Ensure you have transfered the exact amount to the number above before uploading confirmation</b></p><br>
       <div class="">
                    <div class="input-item input-with-label">
                        <label for="confirmation" class="input-item-label">Confirmation</label>
                        <input class="input-bordered pnum" type="hidden" name="pnum" required>
                        <input class="input-bordered amut" type="hidden" name="amt" required>
                        <input class="input-bordered rece" type="hidden" name="receive" required>
                        <input class="input-bordered prov" type="hidden" name="provider" required>
                        <input class="input-bordered" type="file" name="confam" required>
                    </div>
                </div>

     <button type="submit" class="btn btn-info">Upload Confirmation</button>
</form>
     `);
  }else if(res == "Globacom"){

      $(".modal-body").html(`
       <form action="{{route('submit_confirm')}}" enctype="multipart/form-data" method="POST">
                    @csrf
        <div class="text-center">
        <p>transfer ₦${amount} worth of airtime to this phone number below:</p>
        <h1><b>08058765410</b></h1>
        <small class="text-danger">PLEASE WE DO NOT ACCEPT VTU OR RECHARGE PIN</small>
        </div>
       <h4>How to transfer Glo Airtime</h4>
       <p>Before you send an airtime, you Must have a 5 digit pin</p>
       <p>Dial *132*08058765410*${amount}*PIN#</p><br>
       <h4>How to change your Pin</h4>
       <p>Your default Pin is 00000 <small>You are advised to change your default pin to the desired one.</small></p>
       <p>To change your pin,
       <span>Dial: *132*Default-pin*Newpin*Newpin#</span>
       <p><b id="blink" style='color:red;'>NOTE: Ensure you have transfered the exact amount to the number above before uploading confirmation</b></p><br>
       <div class="">
                    <div class="input-item input-with-label">
                        <label for="confirmation" class="input-item-label">Confirmation</label>
                        <input class="input-bordered pnum" type="hidden" name="pnum" required>
                        <input class="input-bordered amut" type="hidden" name="amt" required>
                        <input class="input-bordered rece" type="hidden" name="receive" required>
                        <input class="input-bordered prov" type="hidden" name="provider" required>
                        <input class="input-bordered" type="file" name="confam" required>
                    </div>
                </div>

     <button type="submit" class="btn btn-info">Upload Confirmation</button>
</form>
     `);
  }else if(res == "9mobile"){
    $(".modal-body").html(`
       <form action="{{route('submit_confirm')}}" enctype="multipart/form-data" method="POST">
                    @csrf
        <div class="text-center">
        <p>transfer ₦${amount} worth of airtime to this phone number below:</p>
        <h1><b>08099945666</b></h1>
        <small class="text-danger">PLEASE WE DO NOT ACCEPT VTU OR RECHARGE PIN</small>
        </div>
       <h4>How to transfer 9Mobile Airtime</h4>
       <p>Before you send an airtime, you Must have a 4 digit pin</p>
       <p>Dial *223*PIN*${amount}*08099945666#</p><br>
       <h4>How to change your Pin</h4>
       <p>Your default Pin is 0000 <small>You are advised to change your default pin to the desired one.</small></p>
       <p>To change your pin,
       <span>Dial: *247*Default-pin*Newpin#</span>
       <p><b id="blink" style='color:red;'>NOTE: Ensure you have transfered the exact amount to the number above before uploading confirmation</b></p><br>
       <div class="">
                    <div class="input-item input-with-label">
                        <label for="confirmation" class="input-item-label">Confirmation</label>
                        <input class="input-bordered pnum" type="hidden" name="pnum" required>
                        <input class="input-bordered amut" type="hidden" name="amt" required>
                        <input class="input-bordered rece" type="hidden" name="receive" required>
                        <input class="input-bordered prov" type="hidden" name="provider" required>
                        <input class="input-bordered" type="file" name="confam" required>
                    </div>
                </div>

     <button type="submit" class="btn btn-info">Upload Confirmation</button>
</form>
     `);
  }else if(res == "Airtel"){

    $(".modal-body").html(`
       <form action="{{route('submit_confirm')}}" enctype="multipart/form-data" method="POST">
                    @csrf
        <div class="text-center">
        <p>transfer ₦${amount} worth of airtime to this phone number below:</p>
        <h1><b>08088845888</b></h1>
        <small class="text-danger">PLEASE WE DO NOT ACCEPT VTU OR RECHARGE PIN</small>
        </div>
       <h4>How to transfer Airtel Airtime</h4>
       <p>Before you send an airtime, you Must have a 4 digit pin</p>
       <p>Send a message containing 2u [08088845888] [${amount}] [PIN] to 432</p>
       <h4>How to change your Pin</h4>
       <p>Your default Pin is 0000 <small>You are advised to change your default pin to the desired one.</small></p>
       To change your pin,
       <p>In a text message, write PIN – default PIN – new PIN. That is, PIN Default-Pin New-Pin, then send to 432</p>
       <p><b id="blink" style='color:red;'>NOTE: Ensure you have transfered the exact amount to the number above before uploading confirmation</b></p><br>
       <div class="">
                    <div class="input-item input-with-label">
                        <label for="confirmation" class="input-item-label">Confirmation</label>
                        <input class="input-bordered pnum" type="hidden" name="pnum" required>
                        <input class="input-bordered amut" type="hidden" name="amt" required>
                        <input class="input-bordered rece" type="hidden" name="receive" required>
                        <input class="input-bordered prov" type="hidden" name="provider" required>
                        <input class="input-bordered" type="file" name="confam" required>
                    </div>
                </div>

     <button type="submit" class="btn btn-info">Upload Confirmation</button>
</form>
     `);
  }

  $(".pnum").val(phone);
  $(".amut").val(amount);
  $(".rece").val(compute);
  $(".prov").val(res);
  });

//   var blink = document.getElementById('blink');
//         setInterval(function() {
//             blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
//         }, 1500);
});
</script>

@endsection
