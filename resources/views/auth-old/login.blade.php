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

        <div class="back-to-home rounded d-none d-sm-block">
        <a href="{{url('/')}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="mr-lg-5">
                        <img src="{{asset('images/user/login.png')}}" class="img-fluid d-block mx-auto" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card login-page bg-white shadow rounded border-0">
                            <div class="card-body">
                                <h4 class="card-title text-center">Login</h4>
                                 {{-- @include('includes.alerts') --}}

                                @if(session()->has('bubu'))
                                    <div class="alert alert-warning">
                                        {!! session()->get('bubu') !!}
                                    </div>
                                @endif

                                @if (session('sign_error'))
                                @section('script')
                                    <script>
                                        Notiflix.Report.Failure( 'Oops!', '{{ session('sign_error') }}', 'Ok' );
                                        setTimeout(function (){
                                            location.reload();
                                        }, 4000);
                                    </script>
                                @endsection

                                @endif

                                @if(session()->has('good'))
                                @section('script')
                                <script>
                                Notiflix.Report.Success( 'Success!', '{!! session()->get('good') !!}', 'Ok' );
                                </script>
                                @endsection
                                @endif

                                @if(session('success'))
                                @section('script')
                                <script>
                                Notiflix.Report.Success( 'Success!', '{{ session('success') }}', 'Ok' );
                                </script>
                                @endsection
                                @endif

                    <form method="POST" action="{{ route('login') }}" class="login-form mt-4">
                        <div class="row">
                        @csrf


                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input id="email" type="email" class="form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="password" class="text-md-right">{{ __('Password') }}<span class="text-danger">*</span></label>
                                <i data-feather="key" class="fea icon-sm icons"></i>
                                <input id="password" type="password" class="form-control pl-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-0">
                            <button type="submit" class="btn btn-primary btn-block" id="log">
                                {{ __('Sign In') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="col-12 text-center">
                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Switcher -->
<script src="{{asset('js/switcher.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('js/app.js')}}"></script>
@yield('script')
<script>
 $(document).ready(function(){
    $('#log').on('click', function(){
        Notiflix.Loading.Dots('Processing...');
        Notiflix.Loading.Remove(8000);
});

 });
</script>

</body>
</html>
