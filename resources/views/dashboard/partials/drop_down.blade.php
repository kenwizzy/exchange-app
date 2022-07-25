<?php
//namespace App\Http\Middleware;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
        $api_secret = getenv('QUIDAX_SECRET');
        $api_pub_key = getenv('QUIDAX_PUBLIC_KEY');


$user = Auth::user();
$naira = $user->getWallet('main');
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/wallets/btc");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$api_secret));

    $result = curl_exec($ch);
    $msg = json_decode($result);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    if($msg->status == "success" && $msg->message == "Successful"){
      $btc = $msg->data->balance;

    }

    curl_close($ch);

?>


<li class="topbar-nav-item relative">
    <span class="user-welcome d-none d-lg-inline-block">{{Auth::user()->firstname}}</span>
        <a class="toggle-tigger user-thumb" href="#"><em class="ti ti-user"></em></a>
        <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
            <div class="user-status">
                <h6 class="user-status-title">NGN Balance</h6>
                <div class="user-status-balance">
                    &#8358;	{{number_format($naira->balance,2)}}
                </div>
               <br>
                <h6 class="user-status-title">BTC Balance</h6>
                <div class="user-status-balance">
                    {{$btc== '0.0'?'0.00000':$btc}}
                </div>
            </div>

                <ul class="user-links">
                {{-- <li><a href="{{route('dashboard.profile', Auth::user()->id)}}"><i class="ti ti-id-badge"></i>My Profile</a></li> --}}
                    <li><a href="{{ route('dashboard.account') }}"><i class="ti ti-infinite"></i>Referral</a></li>
          
                </ul>

                <ul class="user-links bg-light">
                <li><a href="{{ route('logout') }}"><i class="ti ti-power-off"></i>Logout</a></li>
                </ul>
            </div>
        </li>
