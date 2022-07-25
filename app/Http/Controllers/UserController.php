<?php

namespace App\Http\Controllers;
use App\Notifications\SetPin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Transaction;
use App\Refill;
use App\Account;
use Illuminate\Support\Str;


class UserController extends Controller
{
    protected $api_secret;
    protected $api_pub_key;
    protected $host;
    static $api;

    public function __construct()
    {
        $this->api_secret = getenv('QUIDAX_SECRET');
        self::$api = getenv('QUIDAX_SECRET');
        $this->api_pub_key = getenv('QUIDAX_PUBLIC_KEY');
        //$this->version = "v1"; // the API version to use
        $this->host = "https://www.quidax.com/api/v1";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    $user = User::findOrFail($id);
      return view('dashboard.profile', compact('user'));

    }
   public function account(){
     $user = Auth::user();

    //  $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, "https://www.quidax.com/api/v1/markets/tickers/dashngn");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

    //     $result = curl_exec($ch);
    //     return $msg = json_decode($result,true);
    //     if (curl_errno($ch)) {
    //         echo 'Error:' . curl_error($ch);
    //     }

    //     if($msg->status == "success"){
    //        $price = $msg->data->btcngn->ticker->sell;
    //     }

    //     curl_close($ch);


    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, 'https://www.quidax.com/api/v1/users/bcdo3sdg/wallets/btc/addresses');
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    // curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

    // $result = curl_exec($ch);
    //  $output = json_decode($result);
    // if (curl_errno($ch)) {
    //     echo 'Error:' . curl_error($ch);
    // }
    // curl_close($ch);
   // if($output->status == "success" && $output->message == "Successful"){
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://www.quidax.com/api/v1/users/bcdo3sdg/wallets/btc/address');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//     curl_setopt($ch, CURLOPT_POSTFIELDS, false);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

//     $result = curl_exec($ch);
//     $msg = json_decode($result);
//     if (curl_errno($ch)) {
//         echo 'Error:' . curl_error($ch);
//     }
//     curl_close($ch);
//     if($msg->status == "success" && $msg->message == "Successful"){

//  return $msg->data->address;

//     }

     return view('dashboard.account', compact('user'));
   }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = Auth::user();

         $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'phone' => $request->phone,
        'DOB' => $request->dob,
        'national' => $request->nationality,
        'email' => $request->email

         ]);

        return redirect()->back()->withSuccess('Profile Updated Successfully!');;
    }


    public function bankUpdate(Request $request)
    {

        $user = Auth::user();
        $account = Account::where('user_id', $user->id);

         $account->update([
          'bank_name' => $request->bankname,
          'account_number' => $request->account_number,
          'holder_name' => $request->account_name
         ]);

        return redirect()->back()->withSuccess('Account Details Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function wallets(){
        $user = Auth::user();
        //$btc_wallet = $user->getWallet('btc');
        $naira_wallet = $user->getWallet('main');
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
      $btc_wallet = $msg->data->balance;

    }

    curl_close($ch);

        return view('dashboard.wallets', compact('user', 'naira_wallet', 'btc_wallet'));
    }


    public function naira_wallet(){
        $user = Auth::user();
        $na_wallet = $user->getWallet('main');
        $results = DB::table('transactions')->where('payable_id', $user->id)->get();

        return view('dashboard.naira_wallet', compact('na_wallet', 'user', 'results'));
    }



    public function transfer_wall(Request $request){

        $user = Auth::user();
        $wallet = $user->getWallet('main');

         $user2 = User::where('email', $request->email)->first();
         $receiver = $user2->getWallet('main');

        $rules = [
            'email'     => 'required|string|exists:users',
            'amount' => 'required|numeric|min:1000|max:'. $wallet->balance
            //'rate'     => 'required|numeric',
          ];

          $messages = [
            'email.required' => 'Please Enter the correct user\'s email address',
            'email.exists' => 'User not recognised or activated. Please check the email address and try again',
            'amount.required' => 'Field Can not be empty',
            'amount.numeric' => 'Invalid Format',
            'amount.min' => 'Minimum transfer amount is 1000.00',
            'amount.max' => 'Insufficient wallet balance. Kindly fund your wallet and try again',
         ];

         $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
    }else{

        $wallet->transfer($receiver, $request->amount);

        return redirect()->back()->with('success', 'You have successfully transfered '.number_format($request->amount, 2).' naira to '.$user2->firstname.' '.$user2->lastname.' wallet');

    }

    }

    public function dashhome(){
    $user = Auth::user();
    $naira = $user->getWallet('main');

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
      $btc = $msg->data->balance;

    }
    curl_close($ch);

        $transactions = Transaction::orderBy('created_at', 'desc')
        ->where('payable_id', $user->id)->take(3)->get();

        return view('dashboard.index', compact('naira','btc','transactions'));

    }

    public function Transactions(Request $request){
        $user = Auth::user();
        $transactions = Transaction::orderBy('created_at', 'desc')
        ->where('payable_id', $user->id)->get();
        return view('dashboard.transactions', compact('transactions'));

    }

    public function resend_token(){

        $refill = Refill::where('id', 1)->get();
        foreach($refill as $fill){
            $token = $fill->data;
        }
        $query = array(
            "username"=> "psalmwelloladokun@gmail.com",
            "password"=>"Miraweb3345@"
       );

        $data_string = json_encode($query);
        $ch = curl_init("https://clients.primeairtime.com/api/auth");
        //$ch = curl_init("https://clients.primeairtime.com/api/reauth");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization:Bearer ".$token));

        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);
        $token1 = htmlspecialchars($resp->token);
        $fixed = date('Y-m-d h:i:s', strtotime($resp->expires));
        Refill::where('id', 1)->update(['data' => $token1, 'expiry' => $fixed]);

    }

    public function update_pass(Request $request){

        $user = Auth::user();
        $old_password = $user->password;
        $input = $request->all();
        $new_password = $request->input('new_password');
        $repeat_password = $request->input('repeat_password');


         if($new_password == $repeat_password){

        if(Hash::check($request->current_password, $user->password)){
           $changed_password = Hash::make($new_password);
           $user->update(['password' => $changed_password]);

           return redirect()->back()->with('success', 'Password changed successfully!');
            }

          }
         return redirect()->back()->with('error', 'Sorry your credentials do not match!');

       }

    function verify(){
        return view('verifi');
    }

    public function sendPin(Request $request){

        $user = Auth::user();
        $input = $request->all();

        if(Hash::check($request->verify, $user->password)){

            $user->setPin();
            $user->notify(new SetPin());

            return redirect()->back()->with('success', 'Please check your email for your pin.');
        }
        return redirect()->back()->with('error', 'Incorrect Password');

    }

    public function resetPin(Request $request){

        $user = Auth::user();
        $old_pin = $user->upin;

         if($request->current_pin == $user->upin){

        if($request->new_pin == $request->repeat_pin){
           $user->upin = $request->new_pin;
           $user->save();

           return redirect()->back()->with('success', 'Pin Reset Successful');
            }

            return redirect()->back()->with('error', 'Repeat pin do not match');

          }
         return redirect()->back()->with('error', 'Previous Pin Do Not Match');

       }

     function valBank(Request $request, $bnum, $BankCode){
        $query = array(
            "account_number"=> $bnum,
            "account_bank"=>$BankCode
        );

        $data_string = json_encode($query);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/accounts/resolve");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        return $resp = json_decode($result,true);
        curl_close($ch);

       }

       function validateBvn(Request $request){

       $user = Auth::user();
       $account_name = $user->account->holder_name;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/kyc/bvns/$request->bvn");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $resp = json_decode($result);

           if($resp->status == "success"){
            $res = explode(" ", $account_name);
            $res[0];
            $res[1];

            if(($resp->data->first_name == $res[0] || $resp->data->first_name ) && ($resp->data->last_name == $res[1] || $resp->data->last_name == $res[1])){
                $user->bvn_verified = true;
                $user->stage_id = 2;
                $user->save();

                return redirect()->back()->with('success', 'Verification Successful. Account Upgraded to Level 1');
            }
           }else{
                 return redirect()->back()->with('error', $resp->message);
           }
        curl_close($ch);

       }
}

