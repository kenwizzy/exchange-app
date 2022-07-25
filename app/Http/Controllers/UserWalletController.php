<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\System;
use Bavix\Wallet\Models\Wallet;
class UserWalletController extends Controller
{
    protected $api_secret;
    protected $api_pub_key;
    protected $host;
    // public $show;
    //    public  $table;

    public function __construct()
    {
        $this->api_secret = getenv('QUIDAX_SECRET');
        $this->api_pub_key = getenv('QUIDAX_PUBLIC_KEY');
        $this->host = "https://www.quidax.com/api/v1";
    }

    public function sendBitcoin(Request $request){

        $user = Auth::user();
        $wallet = $user->getWallet('btc');

    $rules = [
        'email' => 'email|exists:users',
        //'reason'    => 'string',
        'amount'    => 'required'

      ];

      $messages = [
         'email.required' => 'This field is required',
        // 'reason.string'   => 'This field is invalid',
         'email.exists' => 'User not recognised or activated. Please check the email address and try again',

         'amount.required'      => 'Please Enter Amount'
         //'amount.numeric'      => 'Amount Must Be A Number, Please Re-enter Amount'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
      }else{

            if($request->email === $user->email){
                return redirect()->back()->with("error","You can not send bitcoin to yourself");
            }

            $receiver = User::where('email', $request->email)->first();
            if($request->email != $receiver->email){
               return redirect()->back()->with("error","User not recognised or activated. Please check the email address and try again");
             }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/withdraws/?currency=btc&amount=$request->amount&fund_uid=$receiver->subaccount_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        if($msg->status != "success"){
            //$wallet->transfer($receiver->getWallet('btc'), $request->amount);
            return redirect()->back()->with("error", $msg->message);
        }

        return redirect()->back()->with("success", $msg->message);
      }

    }


    public function sendBit(Request $request){

        $user = Auth::user();
        $wallet = $user->getWallet('btc');

    $rules = [
        'address' => 'required|string',
        'amt'    => 'required|numeric'

      ];

      $messages = [
         'address.required' => 'Please Enter Wallet Address',
         'address.string' => 'Invalid Wallet',

         'amt.required'      => 'Please Enter Bitcoin Amount',
         'amt.numeric'      => 'Amount Must Be A Number, Please Re-enter Amount'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
      }else{

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/btc/$request->address/validate_address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        if($msg->data->valid != true){
              return redirect()->back()->with('error', 'Error! Invalid Wallet Address');
         }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/withdraws/?currency=btc&amount=$request->amount&fund_uid=$request->address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result1 = curl_exec($ch);
        $msg1 = json_decode($result1);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if($msg1->status != "success"){
            //$wallet->transfer($receiver->getWallet('btc'), $request->amount);
            return redirect()->back()->with("error", $msg1->message);
        }

        return redirect()->back()->with("success", "Bitcoin transfer to $request->address was successful");
      }

    }

    public function bitcoin_wallet(){
        $user = Auth::user();
        $btcwallet = $user->getWallet('btc');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/btc/$btcwallet->address/validate_address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
         $msg = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        if($msg->data->valid != true){
              return redirect()->back()->with('error', 'Wallet Address not Valid');
         }

         //$naira_wallet = $user->getWallet('main');

        $img = \QrCode::format('svg')
               ->merge('images/naira.svg', 0.5, true)
               ->size(300)->errorCorrection('H')
               ->generate($btcwallet->address);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/wallets/btc");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

    $result = curl_exec($ch);
    $msg = json_decode($result);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    if($msg->status == "success" && $msg->message == "Successful"){
      $output = $msg->data->balance;

    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/deposits?currency=btc");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

    $res = curl_exec($ch);
    $msg1 = json_decode($res);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    if($msg1->status == "success" && $msg1->message == "Successful"){
      $dataReceive2 = $msg1->data;

    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/withdraws?currency=btc");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

    $res1 = curl_exec($ch);
    $msg2 = json_decode($res1);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    if($msg2->status == "success" && $msg2->message == "Successful"){
      $results = $msg2->data;

    }

    curl_close($ch);

        return view('dashboard.bitcoin_wallet', compact('btcwallet', 'output', 'img', 'results', 'dataReceive2'));
    }

    public function transac(){

        return view('dashboard.transac');
    }

    public function getBtcPrice(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/markets/tickers");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer 2FMuxO2wcp6mlGg9iSHEEpuymnevA34c5v2BF7Li'));

        $result = curl_exec($ch);
        $msg = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        if($msg->status == "success"){
           return $msg->data->btcngn->ticker->sell;
        }

        // return $msg->data->price->amount;
        curl_close($ch);
    }

    public function buyBtc(Request $request){

        $user = Auth::user();
        $system = System::find(1);
        $user_naira_wallet = $user->getWallet('main');//user naira wallet
        $user_btc_wallet = $user->getWallet('btc');//user btc wallet

        $system_wallet = $system->getWallet('system wallet');//system naira wallet

        $rules = [
            'btc_amount'     => 'required|numeric',
            'pay_amount' => 'required|numeric|max:'. $user_naira_wallet->balance

          ];

          $messages = [
            'btc_amount.required' => 'Please Enter Amount to Buy',
            'btc_amount.numeric' => 'Invalid Format',
            'pay_amount.max' => 'Insufficient balance. Please fund your wallet and try again later',
            'pay_amount.numeric' => 'Invalid Format',
            'pay_amount.required' => 'Field can not be empty',
            ];

         $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }else{



        //Validate user btc wallet address
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/btc/$user_btc_wallet->address/validate_address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result,true);
        if (curl_errno($ch)) {

            return redirect()->back()->with('error', curl_error($ch));
        }

        if($msg['data']['valid'] != 1){
              return redirect()->back()->with('error', 'Error! Wallet Address not valid');
         }

         $user_naira_wallet->transfer($system_wallet, $request->pay_amount);

         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/me/withdraws/?currency=btc&amount=$request->btc_amount&fund_uid=$user->subaccount_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result);
        if (curl_errno($ch)) {
            return redirect()->back()->with('error', curl_error($ch));
        }

        if($msg->status != "success" && $msg->message != "Successful"){
            return redirect()->back()->with('error', $msg->message);
        }
        curl_close($ch);

        $user_btc_wallet->deposit($request->btc_amount);

        return redirect()->back()->with('success', 'Transaction Successful');

    }


    }

    public function sellBtc(Request $request){

        $user = Auth::user();
        $system = System::find(1);
        $user_naira_wallet = $user->getWallet('main');//user naira wallet
        $user_btc_wallet = $user->getWallet('btc');//user btc wallet

        $system_wallet = $system->getWallet('system wallet');//system naira wallet

        $rules = [
            'sell_amt'     => 'required|numeric',
            'receive_amt' => 'required|numeric'

          ];

          $messages = [
            'sell_amt.required' => 'Please Enter Amount to Buy',
            'sell_amt.numeric' => 'Invalid Format',
            //'sell_amt.max' => 'Insufficient balance. Please fund your bitcoin wallet and try again later',
            //'receive_amt.max' => 'Insufficient balance. Please try again later',
            'receive_amt.numeric' => 'Invalid Format',
            'receive_amt.required' => 'Field can not be empty',
            ];

         $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        redirect()->back()->with('errors', $validator->errors());
    }else{

        //Validate user btc wallet address
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/btc/$user_btc_wallet->address/validate_address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

        $result = curl_exec($ch);
        $msg = json_decode($result,true);
        if (curl_errno($ch)) {
            return redirect()->back()->with('error', curl_error($ch));
        }

        if($msg['data']['valid'] != 1){
              return redirect()->back()->with('error', 'Error! Wallet Address not valid');
         }

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/me");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
         curl_setopt($ch, CURLOPT_POSTFIELDS, false);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

         $result = curl_exec($ch);
         $msg = json_decode($result);

         if (curl_errno($ch)) {
             echo 'Error:' . curl_error($ch);
         }

         if($msg->status == "success" && $msg->message == "Successful"){
           $admin_id = $msg->data->id;

         }


         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/users/$user->subaccount_id/withdraws/?currency=btc&amount=$request->sell_amt&fund_uid=$admin_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

       $result = curl_exec($ch);
       $msg = json_decode($result);

        if (curl_errno($ch)) {
            return redirect()->back()->with('error', curl_error($ch));
        }

        if($msg->status != "success" && $msg->message != "Successful"){
            return redirect()->back()->with('error', $msg->message);
        }
        curl_close($ch);
        $system_wallet->transfer($user_naira_wallet, $request->receive_amt);

        return redirect()->back()->with('success', $msg->message);

    }

    }
}
