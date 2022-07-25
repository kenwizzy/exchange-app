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

							</style>
				<!-- .topbar-wrap -->
				<div class="page-content">
		<div class="container">

            <div class="col-xl-10 col-lg-7" style="margin:auto;">
                <div class=" card ">
                    <div class="card-innr">
                        <div class="card-head has-aside">
                            <h4 class="card-title">Transaction</h4>

                        </div>

                               <div class="table-responsive table-hover">
                                @if(count($transactions) > 0)
                                   <table class="table table-bordered">
                                       <thead>
                                           <tr>
                                           <th>S/n</th>
                                           <th>Amount</th>
                                           <th>Type</th>
                                           <th>Status</th>
                                           <th>Date</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @php $sn = 1; @endphp
                                           @foreach($transactions as $result)
                                           <tr>
                                           <td>{{$sn++}}</td>
                                           <td>
                                            @if($result->type == 'withdraw')
                                            <p class="text-danger">{{$result->amount}}</p>
                                            @else
                                            <p>{{$result->amount}}</p>
                                            @endif
                                           </td>
                                            <td>@if($result->type == 'withdraw')
                                                <p class="text-danger">{{$result->type}}</p>
                                                @else
                                                <p>{{$result->type}}</p>
                                                @endif</td>
                                           <td>
                                               @if($result->confirmed == 1)
                                               <p class="text-success">Confirmed</p>
                                               @else
                                               <p class="text-danger">Confirmed</p>
                                               @endif
                                            </td>
                                               <td>
                                                {{ \Carbon\Carbon::parse($result->created_at)->diffForHumans()}}
                                               </td>
                                               </tr>
                                   @endforeach
                                       </tbody>
                                   </table>
                                   @else
                                   <div class="text-center">
                                    <img src="{{asset('images/no-t.svg')}}">
                                    <div class="card-head"><h4 class="card-title">You Currently Have No Transactions</h4></div>
                                 </div>
                                   @endif
                               </div>

                            </div>

                               {{-- @endif --}}

                </div>
            </div>


        </div>

				<!-- .container -->
			</div>
			<!-- .page-content -->
@endsection
