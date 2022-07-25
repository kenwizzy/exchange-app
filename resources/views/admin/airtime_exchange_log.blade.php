@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">All Airtime Exchange</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="javascript:void(0)">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Airtime Exchange Details</li>
            </ol>
        </div>
    </div>

    @if (session('success'))
            @section('script')
            <script>
                Notiflix.Report.Success( 'Success', '{{ session('success') }}', 'Ok' );
                setTimeout(function (){
                   location.reload();
                }, 4000);
            </script>
            @endsection
            @endif

            @if (session('error'))
            @section('script')
            <script>
                Notiflix.Report.Failure( 'Oopps!', '{{ session('error') }}', 'Ok' );
            </script>
            @endsection
            @endif

     <!-- start Payment Details -->
     @if($details->count() > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>Airtime Exchanges</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                  <div class="table-wrap">
                        <div class="">
                            <table class="table table-responsive table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Name</th>
                                        <th>Sent From</th>
                                        <th>Network</th>
                                        <th>Transfered Amount</th>
                                        <th>Amount to Receive</th>
                                        <th>Screenshot</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $sn = 1; @endphp
                                @foreach($details as $exchange)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$exchange->user->firstname." " .$exchange->user->lastname}}</td>
                                        <td>{{$exchange->from}}</td>
                                        <td>{{$exchange->network}}</td>
                                        <td>&#8358;{{number_format($exchange->amount,2)}}</td>
                                        <td>&#8358;{{number_format($exchange->receive,2)}}</td>

                                        <td><img src="../ImageUploads/{{$exchange->screenshot}}" width="50"></td>
                                        <td>
                                            @if($exchange->status == "Submitted")
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle" type="button">
                                                   Submitted
                                                </button>
                                                <ul role="" class="dropdown-menu">
                                                <form action="{{route('approve_airtime_transfer',$exchange->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                    <li><button type="submit" class="btn btn-success">Approve</button></li>
                                                </form>
                                                    <li><button class="btn btn-danger">Decline</button></li>
                                                </ul>
                                            </div>
                                            @elseif($exchange->status == "Approved")
                                              <button data-toggle="dropdown" class="btn btn-success dropdown-toggle m-r-20" type="button">
                                                {{$exchange->status}} <span class="caret"></span>
                                             </button>

                                             {{-- @else
                                              <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle m-r-20" type="button">
                                                Declined <span class="caret"></span>
                                             </button> --}}
                                            @endif

                                        </td>
                                    </div>
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

</div>

@endsection
