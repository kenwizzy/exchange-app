@section('script')
@if(session()->has('success'))

<script>
    Notiflix.Report.Success( 'One more step!', '{!! session()->get('success') !!}', 'Ok' );
</script>
 @endif

 @if(session()->has('bug'))

<script>
    Notiflix.Report.Failure( 'Oops!', '{!! session()->get('bug') !!}', 'Ok' );
</script>
 @endif

 @if(count($errors) > 0)
            @foreach($errors->all() as $errors)

            <script>
                Notiflix.Report.Failure( 'Opps', '{{ $errors }}', 'Dismiss' );
                setTimeout(function (){
                    //window.location = "{{route('dashboard.withdraw')}}";
                    location.reload();
                }, 5000);
            </script>

            @endforeach
@endif

 @if(session()->has('message'))
<script>
    Notiflix.Loading.Hourglass('Processing...');
    setTimeout(function (){
        var load = location.reload();
         //window.location = "{{route('dashboard.withdraw')}}";
        if(load){
        Notiflix.Report.Success( 'Success', '{!! session()->get('message') !!}', 'Ok' );
    }
    }, 5000);
</script>
 @endif

 @if(session()->has('error'))
<script>
    Notiflix.Report.Failure( 'Error', '{!! session()->get('error') !!}', 'Ok' );
</script>
 @endif

 @if(session()->has('good'))

<script>
    Notiflix.Report.Success( 'Success!', '{!! session()->get('good') !!}', 'Ok' );
</script>

 @endif

 @if(session()->has('error'))
    <div class="alert alert-danger">
        {!! session()->get('error') !!}
    </div>
@endif

 {{-- @if(session()->has('email'))

<script>

    swal({
    title: "Your account is not yet activated",
    text: "click OK to resend activation code",
    type: "error",
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true
    }, function () {
    setTimeout(function () {

        $.get('/resend/code', {email: "{!! session()->get('email') !!}"});

        swal("The mail has been resent!");
    }, 3000);
    });

</script>

@endif --}}
@endsection

