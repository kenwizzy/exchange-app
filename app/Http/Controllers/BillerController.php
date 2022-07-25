<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Refill;
use App\Notification;
//use App\Account;
use Illuminate\Support\Facades\Auth;

class BillerController extends Controller
{

    protected $refillAuth;
    protected $refillUrl;
    public function __construct()
    {
        $this->refillUrl = getenv('VTPASS_BASEURL');
        $this->refillAuth = getenv('VTPASS_EMAIL') . ':' . getenv('VTPASS_PSWD');
    }


    public function airtime(){
    $user = Auth::user();

    return view('dashboard/airtime_recharge', compact('user'));
    }

    public function vendAirtime(Request $request){
        $user = Auth::user();
        $wallet = $user->getWallet('main');
        $rules = [
            'network'     => 'required',
            'phone'     => 'required|numeric',
            'amount' => 'required|numeric|min:10|max:'. $wallet->balance

          ];

          $messages = [
            'network.required' => 'Please Select Network Provider',
            'amount.required' => 'Please Enter Amount to Recharge',
            'amount.numeric' => 'Invalid Format',
            'phone.required' => 'Please Enter Phone Number',
            'amount.min' => 'Minimum Recharge Amount is 10.00 NGN',
            'amount.max' => 'Insufficient Balance. Kindly Fund Your Wallet And Try gain',
         ];

         $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
    }else{
  //return dd($request->all());
    //     $request->phone = ltrim($request->phone, $request->phone[0]);
    //     $user_phone = "234".$request->phone;
    //     if(strlen($user_phone) > 13 || strlen($user_phone) < 13){
    //        return redirect()->back()->with("error", "Incorrect Phone Number. Please Check The Number And Try Again");
    // }

    $query = array(
        "request_id"=>"Mira-".Str::random(20),
        "serviceID"=>$request->network,
        "amount"=>$request->amount,
        "phone"=>$request->phone,
   );

        $ch = curl_init("$this->refillUrl/pay");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);

        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);
        if($resp->code != null || $resp->code == "000" && $resp->response_description == "TRANSACTION SUCCESSFUL"){

            $wallet->withdraw($resp->content->transactions->amount, [
                'description' => 'Charge for '.$resp->content->transactions->product_name
            ]);
            return redirect()->back()->with('success', 'Your '.$resp->content->transactions->type.' of ₦'.$resp->content->transactions->amount.' was Successful');

        }else{
            return redirect()->back()->with('error', $resp->response_description);

        }

    }
    }

       public function data_recharge(){
        $user = Auth::user();
        return view('dashboard/data_recharge', compact('user'));
        }

        public function getDataBundle(Request $request, $net){

        //     $request->phone = ltrim($request->phone, $request->phone[0]);
        //     $user_phone = "234".$request->phone;
        //     if(strlen($user_phone) > 13 || strlen($user_phone) < 13){
        //        return redirect()->back()->with("error", "Incorrect Phone Number. Please Check The Number And Try Again");
        // }

        $ch = curl_init("$this->refillUrl/service-variations?serviceID=$net");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", $this->refillAuth));

        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);

        foreach($resp->content->varations as $result){

            echo "<option value='".$result->variation_code.'/'.$result->variation_amount."'>$result->name</option>";

           }
        }

        public function vendData(Request $request){
            $user = Auth::user();
            $wallet = $user->getWallet('main');
            $rules = [
                'network'     => 'required',
                'phone'     => 'required|numeric',
                'bundle' => 'required'

              ];

              $messages = [
                'network.required' => 'Please Select Network Provider',
                'bundle.required' => 'Please Enter Data Bundle to Subscribe',
                'phone.required' => 'Please Enter Phone Number',
             ];

             $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }else{

        //     $request->phone = ltrim($request->phone, $request->phone[0]);
        //     $user_phone = "234".$request->phone;
        //     if(strlen($user_phone) > 13 || strlen($user_phone) < 13){
        //        return redirect()->back()->with("error", "Incorrect Phone Number. Please Check The Number And Try Again");
        // }


        if($request->bundle != null){
            $output = explode('/', $request->bundle);
            $out_code = $output[0];
            $dataAmt = $output[1];
            }else{
                $request->bundle = "";
            }

                $query = array(
                    "request_id"=>"Mira-".Str::random(20),
                    "billersCode"=>$request->phone,
                    "serviceID"=>$request->network,
                    "variation_code"=>$out_code,
                    "phone"=>$request->phone
               );

            $ch = curl_init("$this->refillUrl/pay");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);

            $response = curl_exec($ch);
            curl_close($ch);
           $resp = json_decode($response);

            if($resp->code !== "000"){
                return redirect()->back()->with("error", $resp->response_description);
            }else{

                $wallet->withdraw($dataAmt,[
                    'description' => 'Charge for '.$resp->content->transactions->product_name.' data subscription'
                ]);

                return redirect()->back()->with("success", "Your ".$resp->content->transactions->product_name." Subscription of ₦".$resp->content->transactions->amount." was Successful");
            }
            //}
        }
        }

        public function electricity(){

        return view('dashboard.electricity');
        }

        public function validateElectricity(Request $request, $meter, $net, $type){

        $query = array(
            "billersCode"=> $meter,
            "serviceID"=>$net,
            "type"=>$type,
       );

       $ch = curl_init("$this->refillUrl/merchant-verify");
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);
       $response = curl_exec($ch);
        curl_close($ch);
       return $resp = json_decode($response,true);

        }

        public function submit_electricity(Request $request){
        $user = Auth::user();
        $wallet = $user->getWallet('main');

    $rules = [
        'meter'     => 'required',
        'network' => 'required|string',
        'type' => 'required',
        'amount' => 'required|numeric',
        'phone' => 'required'
      ];

      $messages = [
         'meter.required' => 'Please Provide Your Meter Number',
         'network.required'   => 'Please Choose Your Electricity Distributor',
         'amount.required' => 'Please Enter Amount the amount of electricity to purchase',
         'amount.numeric'   => 'Invalid Format',
         'phone'            => 'Customer\'s phone number is required',
         'type'            => 'Please Select your meter type'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()){
          return response()->json(['errors' => $validator->errors()], 422);
      }else{

        $query = array(
            "billersCode"=> $request->meter,
            "variation_code"=>$request->type,
            "amount"=>$request->amount,
            "serviceID"=>$request->network,
            "request_id"=>"Mira-".Str::random(20),
            "phone"=> $request->phone
       );

       $ch = curl_init("$this->refillUrl/pay");
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);

        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);

        if($resp->code !== "000"){
            return redirect()->back()->with("error", $resp->response_description);
        }else{

            $wallet->withdraw($resp->content->transactions->amount,[
                'description' => 'Charge for '.$resp->content->transactions->product_name.' Purchase'
            ]);

            return redirect()->back()->with("success", "Your ".$resp->content->transactions->product_name." Purchase of ₦".$resp->content->transactions->amount." was Successful");
        }

      }
        }

        public function television(){

            return view('dashboard.television');
        }

        public function tv_bundle(Request $request, $operator){

        $ch = curl_init("$this->refillUrl/service-variations?serviceID=$operator");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", $this->refillAuth));
            $response = curl_exec($ch);
            curl_close($ch);
           $resp = json_decode($response);

            echo '<option value="">Select Package</option>';
            foreach($resp->content->varations as $result){

                echo "<option value='".$result->variation_code.'/'.$result->variation_amount."'>$result->name</option>";

               }
        }

        public function validateTelevision(Request $request, $smartcard, $operator){

            $query = array(
                "billersCode"=>$smartcard,
                "serviceID"=>$operator
           );

                $ch = curl_init("$this->refillUrl/merchant-verify");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);

                return $response = curl_exec($ch);
                curl_close($ch);
                $resp = json_decode($response);

            }

            public function submit_television(Request $request){
                $user = Auth::user();
                $wallet = $user->getWallet('main');
                if($request->amount != null){
                    $output = explode('/', $request->amount);
                    $var_code = $output[0];
                    $Amt = $output[1];
                    }else{
                        $request->amount = "";
                    }

                $rules = [
                'operator' => 'required|string',
                'card' => 'required|string',
                'amount' => 'required'
              ];

              $messages = [
                 'card.required' => 'Please Provide Your SmartCard Number',
                 'operator.required'   => 'Please Choose Your Operator',
                 'amount.required' => 'Please Select a package',
              ];
              $validator = Validator::make($request->all(), $rules, $messages);
              if($validator->fails()){
                 // return response()->json(['errors' => $validator->errors()], 422);
                 return redirect()->back()->with('errors', $validator->errors());
              }else{
                $query = array(
                    "billersCode"=> $request->card,
                    "serviceID"=>$request->operator,
                    "phone"=>$user->phone,
                    "request_id"=>"Mira-".Str::random(20),
                    "variation_code"=>$var_code
               );

            $ch = curl_init("$this->refillUrl/pay");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);
            $response = curl_exec($ch);
            curl_close($ch);
            $resp = json_decode($response);

            if($resp->code !== "000"){
                return redirect()->back()->with("error", $resp->response_description);
            }else{

                $wallet->withdraw($Amt,[
                    'description' => 'Charge for '.$resp->content->transactions->product_name
                ]);

                return redirect()->back()->with("success", "Your ".$resp->content->transactions->product_name." of ₦".$resp->content->transactions->amount." was Successful");
            }

              }
                }

                public function getDataBundle_2(Request $request, $phone, $net){

                    $request->phone = ltrim($request->phone, $request->phone[0]);
                    $user_phone = "234".$request->phone;
                    if(strlen($user_phone) > 13 || strlen($user_phone) < 13){
                       return redirect()->back()->with("error", "Incorrect Phone Number. Please Check The Number And Try Again");
                }

                $refill = Refill::where('id', 1)->get();
                foreach($refill as $fill){
                    $token = $fill->data;
                }

                $ch = curl_init("https://clients.primeairtime.com/api/datatopup/info/".$user_phone);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_POSTFIELDS, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization:Bearer ".$token));

                $response = curl_exec($ch);
                curl_close($ch);
                return $resp = json_decode($response,true);

                }

    public function airtime_cash(Request $request){
        $user = Auth::user();
        $wallet = $user->getWallet('main');
        return view('dashboard.airtime_cash',compact('wallet'));

    }

    public function educational(Request $request){
        return view('dashboard.educational');
    }

    public function waecReg(Request $request, $serviceID){
        $ch = curl_init("$this->refillUrl/service-variations?serviceID=$serviceID");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->refillAuth);

        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);
        foreach($resp->content->varations as $var){
            return $var->variation_amount;
        }

    }
}
