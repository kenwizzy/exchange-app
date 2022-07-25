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
    <link href="{{asset('css/notiflix.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('../../release/v2.1.7/css/unicons.css')}}">
        <!-- Main Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt">
    <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">

    </head>

    <body>
<div class="row justify-content-center">

    <div class="col-md-6"><br><br><br>
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('verify.store') }}">
                        {{ csrf_field() }}
                        <h2>Verify Your Identity</h2>
                        <p class="text-muted">
                            We sent you a mail containing your verification code. Kindly paste the code in the form below<br>
                            If you haven't received it, click <a href="{{ route('verify.resend') }}">here</a>.
                        </p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock text-primary" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input name="two_factor_code" type="text" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Enter Code Here...">
                            @if($errors->has('two_factor_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('two_factor_code') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">
                                    Verify
                                </button>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a class="btn btn-danger px-4" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                    {{ trans('global.logout') }}
                                </a>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form> --}}


<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/scrollspy.min.js')}}"></script>
<script src="{{asset('js/notiflix.js')}}"></script>
<!-- Icons -->
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('../../release/v2.1.9/script/monochrome/bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('js/app.js')}}"></script>
