@extends('layouts.sub-front')
@section('content')
<div class="gradient-bg title-wrap">
    <div class="row">
        <div class="col-lg-12 col-md-12 whitecolor">
            <h3 class="float-left"> Digital Exchange </h3>
            <ul class="breadcrumb top10 bottom10 float-right">
                <li class="breadcrumb-item hover-light"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item hover-light">digital</li>
            </ul>
        </div>
    </div>
</div>
</div>
</section>
<!--Page Header ends -->
<!-- About us -->
<section id="aboutus" class="padding_top padding_bottom">
<div class="container aboutus">
<div class="row align-items-center">
    <div class="col-lg-6 col-md-6 padding_bottom_half">
    <div class="image"><img alt="SEO" src="{{asset('images-current/digital.png')}}"></div>
    </div>
    <div class="col-lg-5 offset-lg-1 col-md-6 padding_bottom_half text-center text-md-left">
        <h2 class="darkcolor font-normal bottom30">Digital Exchange</h2>
        <p class="bottom35"> Miraweb is one of the fastest growing Exchange Platform, registered under Nigeria’s
Corporate Affairs Commision with the name 'Miraweb Networks Limited` and RC Number 1709342. <br> <br> Our platform provides customer the opportunity to exchange digital card to naira instantly. All payouts are automated and transactions are secured from end-to-end. <br>


</p>

    </div>
</div>

</div>
</section>


<!-- WOrk Process-->
<section id="our-process" class="padding bgdarks" >
<style type="text/css">
.bgdarks {
background: url("{{asset('images-current/banner-single-2c.jpg')}}");
}
</style>
<div class="container" >
<div class="row">
    <div class="col-md-12 col-sm-12 text-center">
        <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">

            <h2 class="font-normal">Our Work Process </h2>
        </div>
    </div>
</div>
<div class="row" >
     <div class="col-md-2 col-sm-2 text-center"> </div>
    <ul class="process-wrapp" style="text-align: center;">
        <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
            <span class="pro-step bottom20">01</span>
            <p class="fontbold bottom25">Register / Login in</p>

        </li>
         <li class="whitecolor wow fadeIn" data-wow-delay="300ms">


        </li>
        <li class="whitecolor wow fadeIn" data-wow-delay="400ms">
            <span class="pro-step bottom20">02</span>
            <p class="fontbold bottom25">Select a Feature</p>

        </li>
          <li class="whitecolor wow fadeIn" data-wow-delay="300ms">


        </li>
        <li class="whitecolor wow fadeIn" data-wow-delay="500ms">
            <span class="pro-step bottom20">03</span>
            <p class="fontbold bottom25">Make a Transaction</p>

        </li>
          <li class="whitecolor wow fadeIn" data-wow-delay="300ms">


        </li>
        <li class="whitecolor wow fadeIn" data-wow-delay="600ms">
            <span class="pro-step bottom20">04</span>
            <p class="fontbold bottom25">Get paid instantly</p>

        </li>
          <li class="whitecolor wow fadeIn" data-wow-delay="300ms">


        </li>
        <li class="whitecolor wow fadeIn" data-wow-delay="700ms">
            <span class="pro-step bottom20">05</span>
            <p class="fontbold bottom25">Invite friends</p>

        </li>
    </ul>
      <div class="col-md-3 col-sm-3 text-center"> </div>
</div>
</div>
</section>
<!--WOrk Process ends-->


<!-- Mobile Apps -->
<section id="our-apps" class="padding">
<div class="container">
<div class="row align-items-center">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="heading-title bottom30 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">

            <h2 class="darkcolor font-normal text-center">Why Choose us</h2>
        </div>
    </div>

</div>
<div class="row d-flex align-items-center" id="app-feature">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="text-center text-md-right">
            <div class="feature-item mt-3 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
                <div class="icon"><i class="fas fa-lock"></i></div>
                <div class="text">
                    <h3 class="bottom15">
                        <span class="d-inline-block">Safe and Trusted</span>
                    </h3>
                    <p>Exchange your digital card with high confidence and ease, as we assure you the highest level of encryption and professionally audited exchange system.</p>
                </div>
            </div>
            <div class="feature-item mt-5 wow fadeInLeft" data-wow-delay="350ms" style="visibility: visible; animation-delay: 350ms; animation-name: fadeInLeft;">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="text">
                    <h3 class="bottom15">
                        <span class="d-inline-block">Instant Exchange</span>
                    </h3>
                    <p>Exchange your digital card to naira instantly, We pay in Naira instantly within 5 minutes.

</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="app-image top30">
            <div class="app-slider-lock-btn"></div>
            <div class="app-slider-lock">
            <img src="{{asset('images-current/iphone-slide-lock.jpg')}}" alt="">
            </div>
            <div id="app-slider" class="owl-carousel owl-theme owl-loaded owl-drag">



               <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
            <img src="{{asset('images-current/iphone.png')}}" alt="image">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="text-center text-md-left">
            <div class="feature-item mt-3 wow fadeInRight" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="text">
                    <h3 class="bottom15">
                        <span class="d-inline-block">Best Market Rates</span>
                    </h3>
                    <p> Our goal is to make life easier for our fellow Nigerians, by making  Our dealings fair and square with the best market rates.</p>
                </div>
            </div>
            <div class="feature-item mt-5 wow fadeInRight" data-wow-delay="350ms" style="visibility: visible; animation-delay: 350ms; animation-name: fadeInRight;">
                <div class="icon"><i class="far fa-folder-open"></i></div>
                <div class="text">
                    <h3 class="bottom15">
                        <span class="d-inline-block">Instant Payment </span>
                    </h3>
                    <p>Getting your money as quick as possible is our priority, you are guaranteed to get your payment sent to your account within minutes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!--Mobile Apps ends-->
@endsection
