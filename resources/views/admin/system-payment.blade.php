@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">User Withdrawals</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">User Withdrawals</li>
            </ol>
        </div>
    </div>


     <!-- start Payment Details -->
     @if($results->count() > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>User Withdrawals</header>
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
                                        <th>Name</th>
                                        <th>Bank Name</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Amount in &#8358;</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sn = 1; @endphp
                                @foreach($results as $data)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$data->user->firstname." " .$data->user->lastname}}</td>
                                        <td>{{$data->bank_name}}</td>
                                        <td>{{$data->account_name}}</td>
                                        <td>{{$data->account_number}}</td>
                                        <td>&#8358;{{number_format($data->amount,2)}}</td>
                                        <td>
                                            @if($data->status != "Paid")
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle m-r-20" type="button">
                                                    {{$data->status}} <span class="caret"></span>
                                                </button>

                                            </div>
                                            @else

                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-success dropdown-toggle m-r-20" type="button">
                                                    Paid <span class="caret"></span>
                                                </button>

                                            </div>

                                            @endif
                                        </td>

                                        <td>{{$data->created_at->diffForhumans()}}</td>
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


</div>

@endsection
