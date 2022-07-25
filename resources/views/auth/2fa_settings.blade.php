<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Miraweb - Exchange Giftcards and Bitcoin for Cash</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{asset('../../release/v2.1.7/css/unicons.css')}}"> --}}
        <!-- Main Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt">
    <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    <link href="{{asset('css/notiflix.css')}}" rel="stylesheet" type="text/css">


    </head>

    <body>
<div class="row justify-content-center">
    <div class="container"><br><br><br>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Two Factor Authentication</strong></div>
                    <div class="card-body">
                        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

             @if (session('success'))
            <script>
                //Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
                alert('{{ session('success') }}');
                setTimeout(function (){
                    window.location = "{{route('dashboard.account')}}";
                }, 500);
            </script>
            @endif

            @if (session('error'))
            <script>
                //Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' )
                alert('{{ session('error') }}');
            </script>
            @endif

                        @if($data['user']->loginSecurity == null)
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Enable 2FA
                                    </button>
                                </div>
                            </form>
                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                            1. Scan this QR code with your Google Authenticator App.
                             Alternatively, you can use the code: <code>{{ $data['secret'] }}</code>
                             <br/>
                            <img src="{{$data['google2fa_url'] }}" alt="">
                            <br/><br/>
                            2. Enter the pin from Google Authenticator app:<br/><br/>
                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                    <label for="secret" class="control-label">Authenticator Code</label>
                                    <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                                    @if ($errors->has('verify-code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Enable 2FA
                                </button>
                            </form>
                        {{-- @elseif($data['user']->loginSecurity->google2fa_enable)
                            <div class="alert alert-success">
                                2FA is currently <strong>enabled</strong> on your account.
                            </div>
                            <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="control-label">Current Password</label>
                                        <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                            </form> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div><br><br>
    </div>
</div>

{{-- <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script> --}}
<script src="{{asset('js/notiflix.js')}}"></script>
<script src="{{asset('assets/js/jquery.bundle49f7.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/scrollspy.min.js')}}"></script>

<!-- Icons -->
<script src="{{asset('js/feather.min.js')}}"></script>
{{-- <script src="{{asset('../../release/v2.1.9/script/monochrome/bundle.js')}}"></script> --}}
<!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
<!-- Main Js -->
{{-- <script src="{{asset('js/app.js')}}"></script> --}}

<script>
// $(document).ready(function(){
//     Notiflix.Report.Success( 'Success', 'Loading Good', 'Ok' );
// });

</script>
