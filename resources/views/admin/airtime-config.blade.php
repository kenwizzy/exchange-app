@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">  </div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Airtime Config Rate </li>
            </ol>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        <p class="text-center">{{ session('success') }}</p>
    </div>
    @endif
     <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Update Exchange Rate </header>

                </div>
                <div class="card-body " id="bar-parent2">
                    <div class="col-md-9 offset-2">
                <form action="{{route('update_pay', $pay->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" name="pay_type" class="form-control" value="{{$pay->type}}" readonly>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                            <input type="number" name="pay_rate" class="form-control" value="{{$pay->rate}}" placeholder="Enter Amount" required>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="{{route('update_pm', $pm->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" name="pm_type" class="form-control" value="{{$pm->type}}" readonly>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="number" name="pm_rate" class="form-control" value="{{$pm->rate}}" placeholder="Enter Amount" required>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="{{route('update_cash', $cash->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" name="cash_type" class="form-control" value="{{$cash->type}}" readonly>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="number" name="cash_rate" class="form-control" value="{{$cash->rate}}" placeholder="Enter Amount" required>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{route('update_payo', $payo->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" name="payo_type" class="form-control" value="{{$payo->type}}" readonly>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="number" name="payo_rate" class="form-control" value="{{$payo->rate}}" placeholder="Enter Amount" required>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>

                </div>
            </div>
        </div>
    </div>




</div>





@endsection
