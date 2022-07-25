<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Card;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $api_secret;
    protected $api_pub_key;
    protected $host;

    public function __construct()
    {
        $this->api_secret = getenv('QUIDAX_SECRET');
        $this->api_pub_key = getenv('QUIDAX_PUBLIC_KEY');
        //$this->version = "v1"; // the API version to use
        $this->host = "https://www.quidax.com/api/v1";
    }

public function index(){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.quidax.com/api/v1/users/me/wallets/btc');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_POSTFIELDS, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

$result = curl_exec($ch);
$msg = json_decode($result,true);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

        return view('dashboard.cards');
    }

    public function virtual(){

        $user = Auth::user();
        $cards = Card::where('user_id', $user->id)->get();

        return view('dashboard.virtual-card', compact('cards'));
    }

    function createCard(Request $request){

        $user = Auth::user();
        $wallet = $user->getWallet('main');
        $rules = [

            'name'        => 'required|string',
            'amount'      => 'required|numeric|max:'. $wallet->balance,
            'currency'    => 'required|string',
            'address'     => 'required|string',
            'city'        => 'required|string',
            'state'       => 'required|string',
            'postal_code' => 'required|numeric',
            'country'     => 'required|string'
          ];

          $messages = [
            'name.string' => 'Invalid name format',
            'currency.string' => 'Invalid name format',
            'amount.required' => 'Amount Can not be empty',
            'amount.numeric' => 'Invalid Format',
            'postal_code.numeric' => 'Invalid Postal Code',
            'city.string' => 'Invalid City Format',
            'state.string' => 'Invalid State Format',
            'address.string' => 'Invalid Address Format',
            'country.string' => 'Invalid Country Format',
            'amount.max' => 'Insufficient wallet balance. Kindly fund your wallet and try again',
         ];

         $validator = Validator::make($request->all(), $rules, $messages);
         if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }else{

            $query = array(
                "currency" => $request->currency,
                "amount" => $request->amount,
                "billing_name" => $request->name,
                "billing_address" => $request->address,
                "billing_city" => $request->city,
                "billing_state" => $request->state,
                "billing_postal_code" => $request->postal_code,
                "billing_country" => $request->country
            );

        $data_string = json_encode($query);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/virtual-cards");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $resp = json_decode($result);

           if($resp->status == "success"){
             $vcard = new Card();
             $vcard->user_id = $user->id;
             $vcard->card_account_id = $resp->data->account_id;
             $vcard->card_id = $resp->data->id;
             $vcard->billing_name = $resp->data->name_on_card;
             $vcard->balance = $resp->data->amount;
             $vcard->expiration = $resp->data->expiration;
             $vcard->save();

             return redirect()->back()->with('success', $resp->message);

           }else{
                 return redirect()->back()->with('error', $resp->message);
           }
        curl_close($ch);


        }
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
    public function show(Request $request, $id){
        $user = Auth::user();
        $card = Card::findOrFail($id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/virtual-cards/$card->card_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

       $resp = json_decode($result);

        $card = $resp->data;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/virtual-cards/$card->id/transactions?from=2020-12-15&to=2021-02-15&index=0&size=20");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    $resp = json_decode($result);

    $details = $resp->data;
    return view('dashboard.card', compact('card','details'));

    }

    function fund(Request $request){

        $user = Auth::user();
        $virtual_card = Card::where('card_id', $request->id)->first();
        $user_wallet = $user->getWallet('main');
        $rules = [

            'amt'      => 'required|numeric|max:'. $user_wallet->balance,
            'currency'    => 'string'
          ];

          $messages = [
            'amt.max' => 'Insufficient balance. Kindly fund your naira wallet and try again',
         ];

         $validator = Validator::make($request->all(), $rules, $messages);
         if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }else{

            $query = array(
                "debit_currency" => $request->currency,
                "amount" => $request->amt,
            );

        $data_string = json_encode($query);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/virtual-cards/$virtual_card->card_id/fund");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $resp = json_decode($result);

           if($resp->status == "success"){
            $user_wallet->withdraw($request->amt);
            $updatedBalance = $virtual_card->balance + $request->amt;
            $virtual_card->update(['balance' => $updatedBalance]);

             return redirect()->back()->with('success', $resp->message);

           }else{
                 return redirect()->back()->with('error', $resp->message);
           }
        curl_close($ch);
        }
    }

    public function updateCard(Request $request, $card_id, $status){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/virtual-cards/$card_id/status/$status");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer FLWSECK-48da203e7ca4819b4f80ad0efc79b26e-X'));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        return $resp = json_decode($result,true);

        //    if($resp->status == "success"){

        //      return

        //    }else{
        //          return redirect()->back()->with('error', $resp->message);
        //    }
        curl_close($ch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
