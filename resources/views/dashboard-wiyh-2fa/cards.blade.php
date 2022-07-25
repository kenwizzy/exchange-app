@extends('layouts.dashboard')
@section('content')

<div class="page-content">
    <div class="container">

        @if (session('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <p class="text-center">{{ session('error') }}</p>
        </div>
    @endif

    @if(count($errors) > 0)

        <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $errors)
                <li class='text-center'>{{$errors}}</li>
            @endforeach
        </ul>
        </div>
        @endif

        <div class="col-lg-12">
        <div class="content-area card">
         <div class="card-innr" style="">
      <div class="row">
        <div class="col-md-6">
            <div class="card-head">
                <h1 class="">Miraweb Cards</h1>
            </div>
        <p style="float:left;">Pay your bills and make everyday purchases, without carrying cash around. Your Patricia debit cards offer you the convenience and security you need while you spend your money.</p>
        <a href="{{route('dashboard.cards')}}" class="btn btn-info kx">Physical Card</a>
        <a href="{{route('dashboard.virtual-card')}}" class="btn btn-info kx">Virtual Card</a>
         </div>
        <div class="col-md-4">

            <img src="{{asset('images/cc.png')}}" width="300px" height="auto">

        </div>
    </div></div>
    </div>
        </div>

            </div>

        <style type="text/css">
        .kx{
            margin:10px;
                background-color: #28347a;
                border-color: #28347a;

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

                .body{
                        background: #f4f5f8;
                }
                .card-innr {
                text-align: center;
                }

        </style>
@endsection

