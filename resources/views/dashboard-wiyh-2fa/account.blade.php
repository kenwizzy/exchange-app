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

    .secs{
        height:150px;
        border-radius:5px;
        margin-top:20px;
        background-color: #f0f2f5;
    }

    .sec2{
        height:180px;
        border-radius:5px;
        margin-top:20px;
        background-color: #f0f2f5;
    }

</style>
<!-- .topbar-wrap -->
<div class="page-content">
<div class="container">
<div class="row">
<div class="main-content col-lg-1"></div>
<div class="main-content col-lg-10">
    <div class="content-area card">
        <div class="card-innr">

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

            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Update Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Security</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bank">Bank Details</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#verify">Verification</a></li>
            </ul>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
                <div class="tab-pane fade show active" id="personal-data">
                    <div class="card-head">
                        <h4 class="card-title">Profile Details</h4>
                    </div><br>

                <form action="{{route('dashboard.update')}}" method="POST">
                    @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="full-name" class="input-item-label">First Name</label>
                                    <input class="input-bordered" type="text" id="full-name" name="firstname" value="{{$user->firstname}}" required>
                                </div>
                                <!-- .input-item -->
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="email-address" class="input-item-label">Last Name</label>
                                <input class="input-bordered" type="text" id="email-address" name="lastname" value="{{$user->lastname}}" required>
                                </div>
                                <!-- .input-item -->
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="email-address" class="input-item-label">Email Address</label>
                                    <input class="input-bordered" name="email" type="email" name="" id="mobile-number" value="{{$user->email}}" readonly>
                                </div>
                                <!-- .input-item -->
                            </div>

                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="phone" class="input-item-label">Phone Number</label>
                                    <input class="input-bordered" type="number" name="phone" id="mobile-number" value="{{$user->phone}}" required>
                                </div>
                                <!-- .input-item -->
                            </div>
                            <!-- .col -->
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="nationality" class="input-item-label">Nationality</label>
                                    <select class="select-bordered select-block" name="nationality" id="nationality" required>
                                    <option selected value="{{$user->national}}">{{$user->national}}</option>
                                        <option value="Nigeria">Nigeria</option>
                                        {{-- <option value="uk">United KingDom</option>
                                        <option value="fr">France</option>
                                        <option value="ch">China</option>
                                        <option value="cr">Czech Republic</option>
                                        <option value="cb">Colombia</option> --}}
                                    </select>
                                </div>
                                <!-- .input-item -->
                            </div>

                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="date-of-birth" class="input-item-label">Date of Birth</label>
                                <input class="input-bordered date-picker-dob" type="text" id="date-of-birth" name="dob" value="{{$user->DOB}}" required>
                                </div>
                                <!-- .input-item -->
                            </div>
                            <!-- .col -->
                            <hr style="font-weight:20px; background-color:gray;">
                            <div class="col-md-8">
                            <strong>Referral Link</strong>
                                <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                      </div>
                                      <input type="text" class="form-control input-bordered" value="{{ Auth::user()->referral_link }}" id="myInput" readonly>
                                        <button type="button" class="input-group-t test btn-primary kx" data-clipboard-target="#myInput">copy link</button>
                                    </div>
                            </div>

                              </div>
                              <!-- .row -->
                              <div class="gaps-1x"></div>
                              <!-- 10px gap -->
                              <div class="d-sm-flex justify-content-between align-items-center">
                                  <button class="btn btn-info kx">Update Profile</button>
                                  <div class="gaps-2x d-sm-none"></div>

                              </div>
                            </form>
                            
                            <style>
                                .kx{
                                      background-color: #28347a;
                border-color: #28347a;
                                }
                            </style>

                            <!-- form -->
                        </div>
                        <!-- .tab-pane -->
                        <div class="tab-pane fade" id="password">
                            {{-- <div class="card-head">
                                <h4 class="card-title">Reset Password</h4>
                            </div><br> --}}
                            <div class="col-md-12 secs">
                                <div class="info-box bg-b-black">
                                  <div class="info-box-content" style="padding:10px;">
                                <h3>Reset Password</h3>
                                <p>Feel like changing/resetting your password?</p>
                                <button type="button" id="pass" class="btn btn-info kx" data-toggle="modal" data-target="#exampleModal">Click Here</button>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12 secs">
                                <div class="info-box bg-b-black">
                                  <div class="info-box-content" style="padding:10px;">
                                 @if($user->upin == null)
                                <h3>Set Pin</h3>
                                <p>Haven't set your transfer pin? please set it now!</p>
                                <button type="button" id="pin" class="btn btn-info kx" data-toggle="modal" data-target="#exampleModal1">Set Pin</button>
                                @else
                                <h3>Reset Pin</h3>
                                <p>Forgot your 4 digit pin? You can reset it now!</p>
                                <button type="button" id="pin" class="btn btn-info kx" data-toggle="modal" data-target="#exampleModal2">Reset Pin</button>
                                @endif
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-12 secs">
                                <div class="info-box bg-b-black">
                                  <div class="info-box-content" style="padding:10px;">
                                <h3>Delete Account</h3>
                                <p>We do our best to give you a great experience - we’ll be sad to see you leave us.</p>
                                <button type="button" id="del" class="btn btn-info kx">Delete Account</button>
                                  </div>
                                </div>
                              </div>


                            </div>
                            <!-- .tab-pane -->
                            <div class="tab-pane fade" id="bank">
                                <form action="{{route('dashboard.bank_update')}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                            <div class="">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-item input-with-label">
                                            <label for="Account-number" class="input-item-label">Account Number</label>
                                            <input class="input-bordered setpin" maxlength="10" type="text" id="num" name="account_number" value="{{$user->account->account_number}}" required>
                                        </div>
                                        <!-- .input-item -->
                                    </div>
                                        <!-- .col -->
                                    </div>

                                <div class="row">
                                    @php
                                    if($user->account->bank_name != null){
                                    $result = $user->account->bank_name;
                                    $res = explode('-', $result);
                                    $out = $res[1];
                                    }else{
                                        $user->account->bank_name = "";
                                        $out = "";
                                    }
                                    @endphp

        <div class="col-md-8">
        <div class="input-item input-with-label">
            <label for="bankname" class="input-item-label">Bank Name</label>
            <select class="select-bordered select-block bank" name="bankname" id="" required>
            <option value="{{$user->account->bank_name}}">{{$out}}</option>
            <option value="">Select Bank</option>
            <option value="044-Access Bank">Access Bank</option>
            <option value="063-Access Bank (Diamond)">Access Bank (Diamond)</option>
            <option value="035A-ALAT by WEMA">ALAT by WEMA</option>
            <option value="401-ASO Savings and Loans">ASO Savings and Loans</option>
            <option value="50931-Bowen Microfinance Bank">Bowen Microfinance Bank</option>
            <option value="50823-CEMCS Microfinance Bank">CEMCS Microfinance Bank</option>
            <option value="023-Citibank Nigeria">Citibank Nigeria</option>
            <option value="050-Ecobank Nigeria">Ecobank Nigeria</option>
            <option value="562-Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
            <option value="50126-Eyowo">Eyowo</option>
            <option value="070-Fidelity Bank">Fidelity Bank</option>
            <option value="011-First Bank of Nigeria">First Bank of Nigeria</option>
            <option value="214-First City Monument Bank">First City Monument Bank</option>
            <option value="501-FSDH Merchant Bank Limited">FSDH Merchant Bank Limited</option>
            <option value="00103-Globus Bank">Globus Bank</option>
            <option value="058-Guaranty Trust Bank">Guaranty Trust Bank</option>
            <option value="51215-Hackman Microfinance Bank">Hackman Microfinance Bank</option>
            <option value="50383-Hasal Microfinance Bank">Hasal Microfinance Bank</option>
            <option value="030-Heritage Bank">Heritage Bank</option>
            <option value="301-Jaiz Bank">Jaiz Bank</option>
            <option value="082-Keystone Bank">Keystone Bank</option>
            <option value="50211-Lagos Building Investment Company Plc.">Kuda Bank</option>
            <option value="90052-Lagos Building Investment Company Plc. `111">Lagos Building Investment Company Plc.</option>
            <option value="565-One Finance">One Finance</option>
            <option value="526-Parallex Bank">Parallex Bank</option>
            <option value="311-Parkway - ReadyCash">Parkway - ReadyCash</option>
            <option value="076-Polaris Bank">Polaris Bank</option>
            <option value="101-Providus Bank">Providus Bank</option>
            <option value="125-Rubies MFB">Rubies MFB</option>
            <option value="51310-Sparkle Microfinance Bank">Sparkle Microfinance Bank</option>
            <option value="221-Stanbic IBTC Bank">Stanbic IBTC Bank</option>
            <option value="068-Standard Chartered Bank">Standard Chartered Bank</option>
            <option value="232-Sterling Bank">Sterling Bank</option>
            <option value="100-Suntrust Bank">Suntrust Bank</option>
            <option value="302-TAJ Bank">TAJ Bank</option>
            <option value="51211-TCF MFB">TCF MFB</option>
            <option value="102-Titan Bank">Titan Bank</option>
            <option value="032-Union Bank of Nigeria">Union Bank of Nigeria</option>
            <option value="033-United Bank For Africa">United Bank For Africa</option>
            <option value="215-Unity Bank">Unity Bank</option>
            <option value="566-VFD">VFD</option>
            <option value="035-Wema Bank">Wema Bank</option>
            <option value="057-Zenith Bank">Zenith Bank</option>
            </select>
        </div>

        </div>
     </div>
                                    <!-- .col -->
                                    <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-item input-with-label">
                                            <label for="account-name" class="input-item-label">Account Holder Name</label>
                                            <input class="input-bordered" type="text" id="bname" name="account_name" value="{{$user->account->holder_name}}" required readonly>
                                        </div>
                                        <!-- .input-item -->
                                    </div></div>

                                </div>
                                    <!-- .row -->
                                    <div class="gaps-1x"></div>
                                    <!-- 10px gap -->
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <button class="kx btn btn-info kx" id="pa1">Submit</button>
                                        <div class="gaps-2x d-sm-none"></div>
                                  </div>
                                </form>
                                </div>

                                <div class="tab-pane fade" id="verify">


                                    <div class="col-md-12 secs2">
                                        <div class="info-box bg-b-black">
                                          <div class="info-box-content" style="padding:10px;">
                                        <h4>Email Verification <small><i class="fas fa-check text-info"></i></small></h4>
                                          <p>Your email  address has been verified and your transaction limit is &#8358;{{number_format($user->stage->limit,2)}}</p>

                                        <h4>BVN Verification
                                            @if($user->bvn_verified == 1)
                                            <small><i class="fas fa-check text-info"></i></small>
                                            @endif
                                        </h4>
                                        @if($user->bvn_verified == 1)
                                        <p>Account Upgraded to Level 1</p>
                                         @else
                                        <p>Upgrade your account to level 1 by updating your BVN and increase your transaction limit to 	&#8358;1000,000.00</p>
                                        @endif

                                        @if($user->account->holder_name == null)
                                        <button type="button" id="no_bank_details" class="btn btn-info pull-right kx">Update BVN</button>
                                        @else
                                        @if($user->bvn_verified != 1 && $user->stage_id != 2)
                                        <button type="button" class="btn btn-info pull-right kx" data-toggle="modal" data-target="#exampleModal3">Update BVN</button>
                                        @endif
                                        @endif
                                    </div>
                                        </div>
                                      </div>
                                    </div>
                        </div>
                        <!-- .tab-content -->
                    </div>
                    <!-- .card-innr -->
                </div>
                <!-- .card -->
</div>
<!-- .col -->
</div>
<div class="main-content col-lg-1"></div>
<!-- .container -->
</div>
<!-- .container -->
</div>
<!-- .page-content -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('pass_update')}}" method="POST">
                @method('PATCH')
                    @csrf

                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="old-pass" class="input-item-label">Old Password</label>
                        <input class="input-bordered" type="password" id="old-pass" name="current_password" required>
                    </div>
                    <!-- .input-item -->
                </div>
                <!-- .col -->


                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="new-pass" class="input-item-label">New Password</label>
                        <input class="input-bordered" type="password" id="new-pass" name="new_password" required>
                    </div>
                    <!-- .input-item -->
                </div>
                <!-- .col -->
                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="confirm-pass" class="input-item-label">Confirm New Password</label>
                        <input class="input-bordered" type="password" id="confirm-pass" name="repeat_password" required>
                    </div>
                        <!-- .input-item -->
                    </div>
                    <!-- .col -->

                <!-- .row -->
                <div class="note note-plane note-info pdb-1x">
                    <em class="fas fa-info-circle"></em>
                    <p>Password should be minmum 8 letter characters.</p>
                </div>
                <div class="gaps-1x"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:red">Close</button>
          <button type="submit" class="btn btn-info">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- modal for set pin --}}

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Set Pin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('send_pin')}}" method="POST">
                    @csrf

                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="confirm-pass" class="input-item-label">Please confirm your password</label>
                        {{-- <input class="input-bordered" type="password" maxlength="4" id="setpin" name="verify" required> --}}
                        <input class="input-bordered" type="password" name="verify" required>
                    </div>
                    </div>

                <div class="gaps-1x"></div>

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

  {{-- modal for Resetting pin --}}

  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Reset Pin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('reset_pin')}}" method="POST">
                {{-- @method('PATCH') --}}
                    @csrf

                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="old-pass" class="input-item-label">Previous Pin</label>
                        <input class="input-bordered setpin" maxlength="4" type="password" name="current_pin" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="new-pass" class="input-item-label">New Pin</label>
                        <input class="input-bordered setpin" maxlength="4" type="password" name="new_pin" required>
                    </div>
                    <!-- .input-item -->
                </div>
                <!-- .col -->
                <div class="col-md-12">
                    <div class="input-item input-with-label">
                        <label for="confirm-pass" class="input-item-label">Confirm New Pin</label>
                        <input class="input-bordered setpin" maxlength="4" type="password" name="repeat_pin" required>
                    </div>
                        <!-- .input-item -->
                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:red">Close</button>
          <button type="submit" class="btn btn-info">Reset</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Update BVN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <div class="modal-body">
    <form action="{{route('validate_bvn')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="input-item input-with-label">
                    <label for="old-pass" class="input-item-label">BVN</label>
                    <input class="input-bordered setpin" maxlength="12" type="text" id="" name="bvn" required>
                </div>
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

@endsection

@section('script')
<script>
$(document).ready(function(){

    $("#pa1").prop('disabled', true);
    $('.setpin').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
     });

//     $('.test').tooltip({
//   trigger: 'click',
//   placement: 'top'
// });

function setTooltip(btn, message) {
  btn.tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    btn.tooltip('hide');
  }, 5000);
}

var clipboard = new ClipboardJS('.test');

clipboard.on('success', function(e) {

    var btn = $(e.trigger);
  var res = setTooltip(btn, 'Link Copied');
  hideTooltip(btn);

    e.clearSelection();
});

// clipboard.on('error', function(e) {
//   var btn = $(e.trigger);
//   var res = setTooltip(btn, 'Copied');
//   hideTooltip(btn);
// });

$('.bank').on('change',function(){
    var bnum = $('#num').val();
    var bankdetails = $(this).val();

    arr = bankdetails.split("-");
    var BankCode = arr[0];
    var BankName = arr[1];

    axios.get("{{ url('/validate_bank') }}/"+bnum+"/"+BankCode).then(data =>{

          if(data.data.status == "success"){
        $('#bname').val(data.data.data.account_name);
        $("#pa1").prop('disabled', false);
    }else{
        Notiflix.Report.Failure( 'Oops!', 'Account Verification Failed. The provided account number did not match the choosen bank.', 'Ok' );
        }
});

});
$(document).on('click', '#no_bank_details', function (){

    Notiflix.Report.Failure( 'Oops!', 'No bank account available. Please add bank details', 'Ok' );
        setTimeout(function (){
        location.reload();
    }, 3000);

});
});
</script>
@endsection
