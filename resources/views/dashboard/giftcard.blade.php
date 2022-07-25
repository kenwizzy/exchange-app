@extends('layouts.dashboard')
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
    .has-error{
        border: 1px solid red;
    }

    .error-input{
        font-size: 10px;
        margin-top: 10px;
        color:    red;
    }

</style>
<!-- .topbar-wrap -->
<div class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
        <div class="content-area card">
        <div class="card-innr card-innr-fix">

            {{-- @if (session('success'))
        <div class="alert alert-success">
        <p class="text-center">{{ session('success') }}</p>
        </div>
        @endif --}}

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

            @if(count($errors) > 0)
        <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $errors)
                <li class='text-center'>{{$errors}}</li>
            @endforeach
        </ul>
        </div>
        @endif

            <div class="card-head"><h6 class="card-title">Gift Card Exchange</h6>
            </div>
            <div class="gaps-1x"></div>
            <!-- .gaps -->
            <form action="{{route('submit_giftcard')}}" id="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-item input-with-label">
<label class="input-item-label">Select Giftcard Category</label>
<select name="gift_cat" id="my_select" class="select select-block select-bordered giftcard-input" required>
    <div id="giftcard-field"></div>
<option value="">Select Category</option>

    @foreach($cats as $data)
    <option value="{{$data->name}}" id="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>
</div>
 </div>
<div class="col-md-6">
<div class="input-item input-with-label">
<label class="input-item-label">Select Sub Category</label>
<select name="sub_cat" class="select select-block select-bordered chinko" id="putsub" required>
    <div id="subcat-field"></div>
<option value="">Select Sub Category</option>
</select>
</div>
                    </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-item input-with-label">
                                <label class="input-item-label text-exlight">Gift Card Amount $</label>
                                <input name="amount" id="gift_amt" value="" class="input-bordered amount-input" type="text" required>
                                <div id="amount-field"></div>
                                <span class="input-note">Input your Gift Card Amount. </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="input-item input-with-label">
<label class="input-item-label">Payment Method</label>
<select name="pay_method" class="select select-block select-bordered">
<option value="Naira">Naira</option>
</select>
</div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-item input-with-label">
                                <label class="input-item-label text-exlight">Calculated Amount 	&#8358;</label>
                                <input name="calc_amt" id="calc_amt" class="input-bordered calcamt-input" type="text" value="" readonly required>
                                <div id="calcamt-field"></div>
                                <span class="input-note">Estimated Amount to receive. </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Gift Card image Upload</label>
                            <div class="relative">
                                <em class="input-file-icon fas fa-upload"></em>
                                <input type="file" name="file" class="form-control" id="file-01">
                                {{-- <div id="file-field"></div> --}}
                                {{-- class:file-input; --}}
                               </div></div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-item input-with-label">
                                <label class="input-item-label">Comment</label>
                                <textarea name="comment" class="input-bordered input-textarea comment-input" placeholder="Enter Code(s) here if you are trading e-code or if your card is not clear"></textarea>
                                <div id="comment-field"></div>
                            </div></div>
                        </div>
                    <div class="gaps-1x"></div>
                    <button class="btn btn-primary form_login_action">Submit</button>
                </form>
            </div><!-- .card-innr -->
        </div><!-- .card -->
    </div>
        </div></div></div>

@stop
@section('script')
<script>
$(document).ready(function(){
$("#my_select").change(function() {
  var id = $(this).children(":selected").attr("id");
     fetch("{{ url('/dashboard/get_subcat') }}/"+id)
     .then(response => response.text()
     .then(response => {
    let me = response;
     $("#putsub").html(me);
     })

     );
});

let arr, amt, sub_id;
$("#putsub").change(function() {
  var id = $(this).children(":selected").attr("id");
    arr = id.split("-");
    sub_id = arr[0];
    amt = arr[1];

});

$("#gift_amt").keyup(function(){
    change = $('#gift_amt').val();
    let compute = (change * amt).toFixed(2);
    //let out = "Total: "+compute;
    rec = $('#calc_amt').val(compute);

  });

});


$(document).on('submit', '#RegForm', function (event){

//loadSpinner('.form_login_action');
event.preventDefault(event);
let data = $(this).serialize();
axios.post("{{route('submit_giftcard')}}", data).then(data =>{
   Notiflix.Report.Success( 'Success', data.data.success, 'Ok' );
      setTimeout(function (){
     window.location = data.data.redirect_link;
    }, 6000);

}).catch( error => {
    printErrorMsg(error.response.data.error); //a custom method to convert the json error response to html and display all errors to the screen

});
});

   function printErrorMsg(msg){
       if(msg != undefined){
           var obj = Object.keys(msg);
         processError(msg, obj, 'amount', '.amount-input', '#amount-field');
         processError(msg, obj, 'gift_cat', '.giftcard-input', '#giftcard-field');
         processError(msg, obj, 'sub_cat', '.subcat-input', '#subcat-field');
         processError(msg, obj, 'calc_amt','.calcamt-input', '#calcamt-field');
         processError(msg, obj, 'comment', '.comment-input', '#comment-field');
        // processError(msg, obj, 'file', '.file-input', '#file-field');
       }
   }

   function processError(msg, obj, name, input, validation_field){
    if(jQuery.inArray(name, obj) == '-1'){// 0 means it is in array. and -1 means it is not
            $(input).removeClass('has-error');
            $(validation_field).html('');
           }else{

               $(input).addClass('has-error');
               $(validation_field).html('<div class="error-input">'+msg[name][0]+'</div>');
           }
   }

</script>
@endsection
