@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">All Exchanges</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">All Exchanges </li>
            </ol>
        </div>
    </div>


     <!-- start Payment Details -->
     @if($exchanges->count() > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>All Exchanges</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                  <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30" id="example1">
                                <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Calculated Amount in &#8358;</th>
                                        <th>Payment Method</th>
                                        <th>Payment Reference</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $sn = 1; @endphp
                                @foreach($exchanges as $exchange)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$exchange->user->firstname." " .$exchange->user->lastname}}</td>
                                        <td>{{$exchange->currency."".number_format($exchange->amount,2)}}</td>
                                        <td>&#8358;{{number_format($exchange->calculated_amt,2)}}</td>
                                        <td>{{$exchange->payment_method}}</td>
                                        <td>{{$exchange->payment_ref}}</td>
                                        <td>
                                                <button data-toggle="dropdown" class="btn btn-success dropdown-toggle m-r-20" type="button">
                                                    {{$exchange->status}} <span class="caret"></span>
                                                </button>
                                        </td>
                                        <td>{{$exchange->created_at->diffForhumans()}}</td>
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
    <h4 class="text-center text-danger">No Record Found</h4>
    @endif
    <!-- end Payment Details -->



<!-- ======================= Pop-up notification with timer =================================== -->

</div>

@endsection
