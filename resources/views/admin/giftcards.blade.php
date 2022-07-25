@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">GiftCards</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">GiftCards</li>
            </ol>
        </div>
    </div>


     @if($giftcards->count() > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>GiftCards</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                  <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30" id="support_table5">
                                <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Giftcard Name</th>
                                        <th>Giftcard Category Name</th>
                                        <th>Client Name</th>
                                        <th>Giftcard Amount</th>
                                        <th>Calculated Amount in &#8358;</th>
                                        <th>Giftcard Image</th>
                                        <th>Giftcard E-code</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $sn = 1; @endphp
                                @foreach($giftcards as $card)
                                    <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$card->cat}}</td>
                                    <td>{{$card->SubCategory->name}}</td>
                                        <td>{{$card->user->firstname." " .$card->user->lastname}}</td>
                                        <td>{{number_format($card->giftcard_amt,2)}}</td>
                                        <td>&#8358; {{number_format($card->calculated_amount,2)}}</td>
                                        <td>{{$card->file_id}}</td>
                                        <td>{{$card->comment}}</td>
                                        <td>
                                        @if($card->status == "Waiting Approval")
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle m-r-20" type="button">
                                                   Waiting Approval <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li><a class="btn btn-success" href="#">Approve</a></li>
                                                    <li><a class="btn btn-danger" href="#">Decline</a></li>
                                                </ul>
                                            </div>
                                            @elseif($card->status == "Approved")
                                              <button data-toggle="dropdown" class="btn btn-success dropdown-toggle m-r-20" type="button">
                                                {{$card->status}} <span class="caret"></span>
                                             </button>

                                             @else
                                              <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle m-r-20" type="button">
                                                Declined <span class="caret"></span>
                                             </button>
                                            @endif
                                        </td>

                                        <td>{{$card->created_at->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h3 class="text-danger text-center">Records Not Found</h3>
    @endif

</div>

@endsection
