@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Admin Notifications</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.index')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Admin Notifications</li>
            </ol>
        </div>
    </div>


    @if($results->count() > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>Admin Notifications</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                  <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30 table-striped table-bordered" id="support_table5">
                                <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Message</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sn = 1; @endphp
                                    @foreach($results as $result)
                                    <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$result->content}}</td>
                                        <td>{{$result->created_at->diffForHumans()}}</td>

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
