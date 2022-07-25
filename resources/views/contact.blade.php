@extends('layouts.sub-front')
@section('content')

<div class="gradient-bg title-wrap">
    <div class="row">
        <div class="col-lg-12 col-md-12 whitecolor">
            <h3 class="float-left">Help Center</h3>
            <ul class="breadcrumb top10 bottom10 float-right">
                <li class="breadcrumb-item hover-light"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item hover-light">Contact</li>
            </ul>
        </div>
    </div>
</div>
</div>
</section>
<!--Page Header ends -->
<!-- Contact US -->
<section id="stayconnect1" class="bglight position-relative padding noshadow">
<div class="container whitebox">
<div class="widget py-5">
    <div class="row">
        <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
            <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact</span> Us
                <span class="divider-center"></span>
            </h2>
        </div>

        <div class="col-md-8 col-sm-8" style="margin:auto;">
            @if(Session::has('success'))
              <div class="alert alert-success">
        	    {{ Session::get('success') }}
               </div>
           @endif
            <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
            <form action="contact" method="POST" >
                @csrf
                    <div class="row px-2">
                        <div class="col-md-12 col-sm-12" id="result1"></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name1" class="d-none"></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name:" name="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="email1" class="d-none"></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"  placeholder="Email:" name="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="email1" class="d-none"></label>
                                <input class="form-control @error('subject') is-invalid @enderror" type="text" placeholder="Subject:" name="subject">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="message1" class="d-none"></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Message:" name="message"></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="button btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-1 col-md-1">

    </div>
    <div class="col-lg-3 col-md-3">
        <div class="widget text-center top60 w-100">
            <div class="contact-box">
                <span class="icon-contact defaultcolor"><i class="fas fa-mobile-alt"></i></span>
                <p class="bottom0"><a href="tel:08058585859">08075757575</a></p>
                <p class="d-block"><a href="tel:07686858585">080474747474</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="widget text-center top60 w-100">
            <div class="contact-box">
                <span class="icon-contact defaultcolor"><i class="fas fa-map-marker-alt"></i></span>
                <p class="bottom0">Lagos, Nigeria </p>
                <p class="d-block">Lagos, Nigeria </p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="widget text-center top60 w-100">
            <div class="contact-box">
                <span class="icon-contact defaultcolor"><i class="far fa-envelope"></i></span>
                <p class="bottom0"><a href="mailto:admin@website.com">admin@miraweb.ng</a></p>
                <p class="d-block"><a href="mailto:email@website.com">info@miraweb.ng</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-1 col-md-1">

    </div>
</div>
</div>
</section>
<!-- Contact US ends -->
@endsection
