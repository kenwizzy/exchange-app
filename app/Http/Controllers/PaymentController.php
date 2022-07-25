<?php

namespace App\Http\Controllers;
use AyubIRZ\PerfectMoneyAPI\PerfectMoneyAPI;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use App\Refill;
use App\System;
//  Paypal Details Class
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Redirect;
use Illuminate\Support\Facades\Session;
//use Session;
use URL;
use App\UserTransaction;
use App\User;
use App\Withdrwal;
use App\Notification;
use App\Account;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $_api_context;
    protected $flutter_secret_key;

    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->flutter_secret_key = getenv('RAVE_SECRET_KEY');//flutterwave secret_key

    }

    public function withdraw(Request $request){
       $user = Auth::user();
       $data = $user->account;
       $wallet = $user->getWallet('main');
       return view('dashboard.withdraw', compact('data', 'wallet'));
    }

    public function submit_withdrawal(Request $request){
        $user = Auth::user();
        $verify_pin = $request->digit1."".$request->digit2."".$request->digit3."".$request->digit4;
        $system = System::find(1);
        $charge = 100;
       $data = $user->getWallet('main');
       $system_wallet = $system->getWallet('system wallet');//system naira

        $rules = [
            'bank_code'     => 'required',
            'acc_name' => 'required|string',
            'acc_num' => 'required|numeric',
            'amount' => 'required|numeric|min:1000|max:'. $data->balance,

          ];


          $messages = [
            'bank_code.required' => 'Bank Code Field Can not be empty',
            'acc_name.required' => 'Account Name Field Can not be empty',
            'acc_name.string' => 'Invalid Format',
            'acc_num.required' => 'Account Number Field Can not be empty',
            'acc_num.string' => 'Invalid Format',

            'amount.required' => 'Please Enter Withdrawal Amount',
            'amount.numeric' => 'Invalid Format',
            'amount.min' => 'Minimum withdrawal amount is 1000.00 naira',
            'amount.max' => 'Insufficient Balance, Please try again',
         ];

        $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
        //return response()->json(['errors' => $validator->errors()], 422);
    }else{
        if($user->upin == null){
            return redirect()->back()->with('error', 'Autorization pin not set. Navigate to My Account>>Security to set your pin');
        }

        if($user->upin == $verify_pin){

        if($data->balance < 1000){
            //return response()->json(['error' => 'Your wallet balance is not sufficient for this operation'], 422);
            return redirect()->back()->with('error', 'Your balance is not sufficient for this operation');

        }else{
    $charge_amt = $request->amount - $charge;
    $query = array(
        "account_bank"=>$request->bank_code,
        "account_number"=>$request->acc_num,
        "amount"=>$charge_amt,
        "narration:",
        "currency"=>"NGN",
        "beneficiary_name"=>$request->acc_name,
        "reference"=>"CRL-".Str::random(30),
        "debit_currency"=>"NGN",
        "callback_url"=>"http://localhost/miraweb/public/dashboard"
    );

    $data_string = json_encode($query);

    $ch = curl_init("https://api.flutterwave.com/v3/transfers");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization:Bearer $this->flutter_secret_key"));

    $response = curl_exec($ch);

    curl_close($ch);
    $resp = json_decode($response,true);

    if($resp['status'] === "success" && $resp['message'] === "Transfer Queued Successfully"){

        $id = $resp['data']['id'];
        $amount = $resp['data']['amount'];
        $fee = $resp['data']['fee'];
        $total = $amount + $fee;
        $currency = $resp['data']['currency'];
        $ref = $resp['data']['reference'];

        $total_charge = $total + $charge;
        $data->withdraw($total_charge);
        $system_wallet->deposit($charge);

        $withdraw = new Withdrwal();
        $withdraw->user_id = $user->id;
        $withdraw->withdraw_id = $id;
        $withdraw->reference = $ref;
        $withdraw->amount = $request->amount;
        $withdraw->fee = $fee;
        $withdraw->total = $total_charge;
        $withdraw->save();

        return redirect()->back()->with('message', 'Withdrawal Request Submitted. Waiting Approval...');
        }

    }
}else{
    return redirect()->back()->with('error', 'Transaction Failed, InCorrect Pin, Try Again Later');

}
     return redirect()->back()->with('error', 'Transaction Failed, We Could Not Proceed with  the Request. Please Try Again Later');

}

}

    public function paywithpaypal(Request $request){


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($request->calc_amt);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');

            } else {

                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {

            Session::put('error', 'Payment failed');
            return Redirect::route('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $output = $result->transactions;
            foreach($output as $out){
                $amount = $out->amount->total;
                $currency = $out->amount->currency;
                $calc_amt = $out->description;
            }

        $user = Auth::user();
        $data = new UserTransaction();
        $data->user_id = $user->id;
        $data->amount = $amount;
        $data->calculated_amt = $calc_amt;
        $data->payment_method = $result->payer->payment_method;
        $data->status = $result->state;
        $data->payment_ref = $result->id;
        $data->admin_status = "Not Paid";
        $data->currency = $currency;
        $data->save();

        $account = Account::where('user_id', $user->id);
        $acc_bal = $user->account->balance;
        $update_acc = $acc_bal + $calc_amt;
        $user->account->update(['balance' => $update_acc]);

        return redirect()->back()->with('success', 'Payment Successful. Your account have been updated successfuly');
        }

        Session::put('error', 'Payment failed');
        return Redirect::route('dashboard.digital_asset');

    }

    public function pm_pay(){

        $PMAccountID = '2909463';      // This should be replaced with your real PerfectMoney Member ID(username that you login with).

        $PMPassPhrase = 'athanken8819.'; // This should be replaced with your real PerfectMoney PassPhrase(password that you login with).

        $PM = new PerfectMoneyAPI($PMAccountID, $PMPassPhrase);
        // $accountID = 'U25013946';

        // try{
        //     $PMname = $PM->getAccountName($accountID); // The account name(if it's valid) will return. Otherwise you have an error.
        //   } catch (Exception $exception) {
        //     return $exception->getMessage();
        //   }

        //   return $PMname;

        // $PMbalance = $PM->getBalance(); // array of all your currency wallets(as keys) and all of their balances(as values) will return.
        // return json_encode($PMbalance);

        $fromAccount = 'U25013946'; // Replace this with one of your own wallet IDs that you want to transfer currency from.

        $toAccount = 'U25013946'; // Replace this with the destination wallet ID that you want to transfer currency to.

        $amount = 250; // Replace this with the amount of currency unit(in this case 250 USD) that you want to transfer.

        $paymentID = microtime(); // Replace this with a unique payment ID that you've generated for this transaction. This can be the ID for the database stored record of this payment for example(Up to 50 characters). ***THIS PARAMETER IS OPTIONAL***

        $memo = 250; // Replace this with a description text that will be shown for this transaction(Up to 100 characters). ***THIS PARAMETER IS OPTIONAL***

        $PMtransfer = $PM->transferFund($fromAccount, $toAccount, $amount, $paymentID, $memo); // An array of previously provided data will return for a valid and successful transaction. If any error happen, an array with one item with the key "ERROR" will return.

        return json_encode($PMtransfer);
    }

    function paypalRate(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.flutterwave.com/v3/rates?from=USD&to=NGN&amount=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer FLWSECK_TEST-49052d7b39c1abd705816a44d28b8d53-X';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $result = json_decode($result);
        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }

        if($result->status == "success"){
            return number_format($result->data->rate,0);
        }
        curl_close($ch);

    }



}
