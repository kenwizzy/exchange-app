<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rave;
use Illuminate\Support\Str;
use App\System;

class RaveController extends Controller
{
    /**
   * Initialize Rave payment process
   * @return void
   */
  public function initialize()
  {
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    Rave::initialize(route('callback'));
  }

  /**
   * Obtain Rave callback information
   * @return void
   */

  public function callback(Request $request) {

    $charge = 100;
    $user = Auth::user();
    $comp = System::find(1);
    $company = $comp->getWallet('system wallet');
    $mywallet = $user->getWallet('main');
    $resp = $request->resp;
    $body = json_decode($resp, true);
    $txRef = $body['tx']['txRef'];

    $data = Rave::verifyTransaction($txRef);
    $chargeresponsecode = $data->data->chargecode;
    $chargeAmount = $data->data->amount - $charge;
    $chargecurrency = $data->data->currency;
    $currency = "NGN";

    if($chargeresponsecode == "00" || $chargeresponsecode == "0" && $chargecurrency == $currency){

        $mywallet->deposit($chargeAmount);
        $company->deposit($charge);
        return redirect('/dashboard/naira_wallet')->with('success', 'You have successfully funded your wallet.');
    }else{
        return redirect('/dashboard/naira_wallet')->with('error', 'Transaction failed, Try again later');
    }
}

}
