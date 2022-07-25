<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\ActivationCode;
use Illuminate\Http\Request;
use App\Mail\ActivationEmail;
use Illuminate\Support\Facades\DB;
use App\Events\ActivationCodeEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    protected $api_secret;
    protected $api_pub_key;
    //protected $version;
    protected $host;

    public function __construct()
    {
        //$this->api_secret = getenv('ROQQU_SECRET');
        //$this->api_pub_key = getenv('QUIDAX_PUBLIC_KEY');
        //$this->version = "v1"; // the API version to use
       // $this->host = "https://api.roqqu.com/prod/v1/user/";

        $this->api_secret = getenv('QUIDAX_SECRET');
        //self::$api = getenv('QUIDAX_SECRET');
        $this->api_pub_key = getenv('QUIDAX_PUBLIC_KEY');
        //$this->version = "v1"; // the API version to use
        $this->host = "https://www.quidax.com/api/v1";
    }

    public function activation(ActivationCode $code){
            $query = array( //Create a quidax sub-account
                "email"=>$code->user->email,
                "first_name"=>$code->user->firstname,
                "last_name"=>$code->user->lastname,
                "phone_number" => $code->user->phone
            );

            $data_string = json_encode($query);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->host."/users");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

            $result = curl_exec($ch);
            $resp = json_decode($result);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            if($resp->status == "success"){

       $code->delete(); //Delete the code

        $code->user()->update([ //Activates the user
            'active'=> true,
            'stage_id' => 1,
            'subaccount_id'=> $resp->data->id
        ]);

    //############ CREATE A BTC WALLET ADDRESS FOR THE USER WITH THE GENERATED USER_ID #########
$query = array( //Create a quidax sub-account wallet address
    "token"=>"btc"
);

$data_string = json_encode($query); // ROQQU https://api.roqqu.com/prod/v1/user/generate-wallet
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $this->host."/users/{$resp->data->id}/wallets/btc/addresses");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

$result = curl_exec($ch);
$output = json_decode($result, true);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $this->host."/users/{$resp->data->id}/wallets/btc/addresses/{$output['data']['id']}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json','Authorization:Bearer '.$this->api_secret));

$resulting = curl_exec($ch);
$output1 = json_decode($resulting, true);
//return $output1['message'].'<br>'.$output1['data']['id'].'<br>'.$output1['data']['address'];
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

//return  $output1['data']['address'];

DB::insert('insert into wallets (holder_type, holder_id, name, slug, description, address) values (?, ?, ?, ?, ?, ?)',
['App\User', $code->user->id, 'Bitcoin Wallet', 'btc', 'Wallet From Quidax Vendor', $output1['data']['address']]);

// $code->user->createWallet([ //Create bitcoin wallet for user
//     'name' => 'Bitcoin Wallet',
//     'slug' => 'btc',
//     'address' => $output1['data']['address'],
//     'balance' => $output1['data']['total_payments']
// ]);

                $code->user->createWallet([ //Create naira wallet for user
                    'name' => 'Main Wallet',
                    'slug' => 'main',
                ]);

                Account::create([ //create account for the user

                    'user_id' => $code->user->id,

                     ]);
                    }


        //curl_close($ch);
     // logout the user
     Auth::logout($code->user);

        return redirect('/login')->with('good','Your email have been verified and account activated, Please log in');

}


    public function coderesend(Request $request){

        $user = User::whereEmail($request->email)->firstOrFail();

        if($user->userIsActivated()){

            return redirect('dashboard');

        }

        event(new ActivationCodeEvent($user));
        //Mail::to($user)->queue(new ActivationEmail($user->userActivationCode));

        return redirect('/login')->with('success','Your activation code has been resent, please check your email');

    }


}
