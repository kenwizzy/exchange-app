

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="utf-8">
                        <title>Miraweb - Exchange Giftcards and Bitcoin for Cash</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">

                        <!-- favicon -->
                    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
                        <!-- Bootstrap -->
                    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
                        <!-- Icons -->
                    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="{{asset('../../release/v2.1.7/css/unicons.css')}}">
                        <!-- Main Css -->
                    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt">
                    <link href="{{asset('css/notiflix.css')}}" rel="stylesheet" type="text/css">
                    <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">

                    </head>

                    <body>

                        <div class="back-to-home rounded d-none d-sm-block">
                        <a href="{{url('/')}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
                        </div>
                        <section class="bg-home d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="mr-lg-5">
                                        <img src="{{asset('images/user/signup.png')}}" class="img-fluid d-block mx-auto" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                        <div class="card login-page bg-white shadow rounded border-0">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Sign Up</h4>

                    <form method="POST" action="{{ route('register') }}" class="login-form mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label for="name" class="col-form-label text-md-right">{{ __('First name') }}<span class="text-danger">*</span></label>
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input id="firstname" type="text" class="form-control pl-5 @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label for="lastname" class="col-form-label text-md-right">{{ __('Last name') }}<span class="text-danger">*</span></label>
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input id="lastname" type="text" class="form-control pl-5 @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                        <div class="form-group position-relative">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>
                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="phone" class="col-form-label text-md-right">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                    <input id="phone" type="text" maxlength="11" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                            </div>

                        <div class="col-md-12">
                        <div class="form-group position-relative">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }} <span class="text-danger">*</span></label>
                            <i data-feather="key" class="fea icon-sm icons"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group position-relative">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <i data-feather="key" class="fea icon-sm icons"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block" id="reg">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        <div class="mx-auto">
                        <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="{{url('login')}}" class="text-dark font-weight-bold">Sign in</a></p>
                        </div>
                        </div>
                    </form>

                </div>
            </div><!---->
        </div> <!--end col-->
    </div><!--end row-->
</div> <!--end container-->
</section><!--end section-->


<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/scrollspy.min.js')}}"></script>
<script src="{{asset('js/notiflix.js')}}"></script>
<!-- Icons -->
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('../../release/v2.1.9/script/monochrome/bundle.js')}}"></script>
<!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('js/app.js')}}"></script>

<script>
$(document).ready(function(){
    $('#reg').on('click', function(){
        Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(4000);
});

});
</script>

</body>
</html>


