<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\System;
use App\AirtimeConfirmation;
class AirtimeConfirmationController extends Controller
{
    public function index()
    {
        $details = AirtimeConfirmation::all();
        return view('admin.airtime_exchange_log', compact('details'));
    }


    public function confirm(Request $request){
      $user  = Auth::user();
      if($request->confam){
    //pull out the name of the image and append time to time
        $name = time() . $request->confam->getClientOriginalName();

        //move the image to images folder. If the folder doesn't exist, it creates it
        $request->confam->move('ImageUploads', $name);
    }

      $airtimeConfirm = new AirtimeConfirmation();
      $airtimeConfirm->user_id = $user->id;
      $airtimeConfirm->from = $request->pnum;
      $airtimeConfirm->network = $request->provider;
      $airtimeConfirm->amount = $request->amt;
      $airtimeConfirm->receive = $request->receive;
      $airtimeConfirm->screenshot = $name;
      $airtimeConfirm->save();
      return redirect()->back()->with('success', 'Proof of Transaction Submitted, Waiting Approval');
    }

    public function approve(Request $request, $id){
      $data = AirtimeConfirmation::findOrFail($id);
      $comp = System::find(1);
      $company = $comp->getWallet('system wallet');
      $customerWallet = $data->user->getWallet('main');
      $data->update(['status'=>'Approved']);
      $company->transfer($customerWallet, $data->receive);
      return redirect()->back()->with('success','Transaction Approved');
    }

    public function rates(Request $request){
        return view('dashboard.rates');
    }

    public function fetchRate(){
            $ch = curl_init("https://free.currconv.com/api/v7/convert?q=USD_NGN&compact=ultra&apiKey=3755208b912566064e84");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

            $response = curl_exec($ch);
            curl_close($ch);
           return $resp = json_decode($response,true);


    }
}
