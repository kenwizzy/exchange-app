@extends('layouts.sub-front')
@section('content')

<div class="gradient-bg title-wrap">
    <div class="row">
        <div class="col-lg-12 col-md-12 whitecolor">
            <h3 class="float-left">About Our Company</h3>
            <ul class="breadcrumb top10 bottom10 float-right">
            <li class="breadcrumb-item hover-light"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item hover-light">About</li>
            </ul>
        </div>
    </div>
</div>
</div>
</section>

<section id="aboutus" class="padding_top padding_bottom">
    <div class="container aboutus">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 padding_bottom_half">
            <div class="image"><img alt="SEO" src="{{asset('images-current/aboutus.png')}}"></div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6 padding_bottom_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Who We <span class="defaultcolor">Are</span> & What We <span class="defaultcolor">Do</span></h2>
                <p class="bottom35"> Miraweb is one of the fastest growing Exchange Platform, registered under Nigeria’s
Corporate Affairs Commision with the name 'Miraweb Networks Limited` and RC Number 1709342. <br>
 Miraweb Networks Limited provides customer the opportunity to Send & Receive Bitcoin,  exchange or trade giftcard
, digital cards, bitcoin to Naira, and Refill airtime, data, Electricity and other Uitlity Services. <br>

 </p>

            </div>
        </div>
        <div class="row  align-items-center">
            <div class="col-lg-5  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">The Best Exchange Platform  </h2>
                <p class="bottom35">Our goal is to make life easier for our fellow Nigerians, by making Exchange & Refill transactions in one click, wherby reducing the
stress for exchanging Cards, Bitcoin and refilling in Nigeria.</p>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6 padding_top_half">
                <div class="progress-bars">
                    <div class="progress">
                        <p>Transparency</p>
                        <div class="progress-bar gradient-bg" data-value="100">
                            <span class="gradient-bg whitecolor">100%</span>
                        </div>
                    </div>
                    <div class="progress">
                        <p>Best Rates</p>
                        <div class="progress-bar gradient-bg" data-value="100">
                            <span class="gradient-bg whitecolor">100%</span>
                        </div>
                    </div>
                    <div class="progress">
                        <p>User Friendly</p>
                        <div class="progress-bar gradient-bg" data-value="100">
                            <span class="gradient-bg whitecolor">100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us ends -->

<section id="bg-counters" class="padding bg-counters parallax" style="background-image: url('images-current/counter-bg.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 71.8875px;">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                <div class="counters whitecolor  top10 bottom10">
                    <span class="count_nums font-light" data-to="2020" data-speed="2500">2020</span>
                </div>
                <h3 class="font-light whitecolor top20">Since We Started</h3>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="whitecolor top20 bottom20 font-light title"></p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                <div class="counters whitecolor top10 bottom10">
                    <span class="count_nums font-light" data-to="25" data-speed="2500">25</span>
                </div>
                <h3 class="font-light whitecolor top20">Customers</h3>
            </div>
        </div>
    </div>
</section>
<!-- Counters ends-->

<section id="our-team" class="padding_top half-section-alt teams-border">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="heading-title wow fadeInUp text-center text-md-center" data-wow-delay="300ms">
                    <span class="defaultcolor">Miraweb Management Team</span>
                    <h2 class="darkcolor bottom30 font-normal">Meet Our Experts</h2>
                </div>
            </div>
          <!--   <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                <p class="heading_space">Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. </p>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="ourteam-slider" class="owl-carousel">
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-1.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Jessica Twain</h4>
                                <p>Agency Owner</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-2.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Jason Wudex </h4>
                                <p>Designer</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box single">
                            <div class="image">
                            <img src="{{asset('images-current/team-3.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Jessica Twain</h4>
                                <p>Agency Owner</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-4.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Hayden Wood</h4>
                                <p>Marketing</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-1.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Shania Jackson </h4>
                                <p>Print Media</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-2.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Jessica Twain</h4>
                                <p>Agency Owner</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-box">
                            <div class="image">
                            <img src="{{asset('images-current/team-3.jpg')}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">Jessica Twain</h4>
                                <p>Agency Owner</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Team ends-->
@endsection
