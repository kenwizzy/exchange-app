<?php
//namespace App\Http\Middleware;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
        $api_secret = getenv('QUIDAX_SECRET');
        $api_pub_key = getenv('QUIDAX_PUBLIC_KEY');


// $user = Auth::user();
// $naira = $user->getWallet('main');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/markets/tickers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        if($msg->status == "success"){
           $price = $msg->data->btcngn->ticker->sell;
        }

        curl_close($ch);

        //₦

?>
{{number_format($price,2)}}
