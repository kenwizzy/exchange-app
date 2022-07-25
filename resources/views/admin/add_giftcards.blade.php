@extends('layouts.admin')
@section('content')

<style type="text/css">
    @media (min-width: 576px){
    .card-innr {
    padding: 25px 100px;
        }
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

</style>

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Add GiftCard</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Add GiftCard </li>
            </ol>
        </div>
    </div>

     {{-- <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Create Challenge </header>

                </div>
                <div class="card-body " id="bar-parent2">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Enter Challenge name</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>




                            <!-- select -->
                            <div class="form-group">
                                <label>Select Category (E.g easy, intermidate, hard)</label>
                                <select class="form-control">
                                    <option>Easy</option>
                                    <option>Intermidiate</option>
                                    <option>Hard</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                                <label>Enter #Tag</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        <div class="form-group">
                            <label>Upload Image</label><br>
                                <input type="file" class="default" multiple>
                        </div>




                    </div>

                    <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


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
    <ul style='list-style-type: none;'>
        @foreach($errors->all() as $errors)
            <li class='text-center'>{{$errors}}</li>
        @endforeach
    </ul>
    </div>
   @endif

    <div class="card mt-12 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="One" aria-selected="true">Create GiftCard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#perfect" role="tab" aria-controls="Two" aria-selected="false">Create GiftCard Category</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="paypal" role="tabpanel" aria-labelledby="one-tab">
    <form action="{{route('add_cat')}}" method="POST">
@csrf
<div class="row">
    <div class="col-md-5">
        <div class="input-item input-with-label">
            <label class="input-item-label text-exlight">Add GiftCard</label>
            <input class="input-bordered form-control" name="name" type="text" required>
        </div><br>

        <button type="submit" class="btn btn-primary">Add</button>

    </div>
</form>

@if($cats->count() > 0)
    <div class="col-md-7">
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sn = 1; @endphp
                                @foreach($cats as $item)
                                <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$item->name}}</td>
                                    <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash" style="color:red;"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

    </div>


          </div>
          <div class="tab-pane fade p-3" id="perfect" role="tabpanel" aria-labelledby="two-tab">
          <form action="{{route('add_sub')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select GiftCard</label>
                            <select name="cat_id" class="form-control">
                                <option>Select GiftCard</option>
                                 @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">GiftCard Category Name</label>
                            <input name="name" class="input-bordered form-control" type="text" required>
                        </div>

                        <div class="input-item input-with-label">
                            <label class="input-item-label text-exlight">Rate &#8358;</label>
                            <input name="rate" class="input-bordered form-control" type="number" required>
                        </div>
                        <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
             </div>
     </form>

          @if($cats->count() > 0)
             <div class="col-md-8">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>GiftCard Categories</header>
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
                                            <th>S/n</th>
                                            <th>Giftcard Category Name</th>
                                            <th>Rate in &#8358;</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sn = 1; @endphp
                                        @foreach($subcats as $data)
                                        <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{number_format($data->amount, 2)}}</td>
                                            <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash" style="color:red;"></i></a></td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

             </div>
             @endif
            </div>

          </div>

        </div>
      </div>


</div>





@endsection
