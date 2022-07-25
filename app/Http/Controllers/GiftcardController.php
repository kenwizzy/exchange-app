<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Giftcard;
use App\Category;
use App\DigitalAsset;
use App\Notification;
use App\User;
use App\FileUpload;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\SubCategory;

//use App\Http\Requests;

class GiftcardController extends Controller
{
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
        $user = Auth::user();

        $input = $request->all();

        //validating the register form
    $rules = [
        'gift_cat'     => 'required|string',
        'sub_cat' => 'required|string',
        'amount' => 'required|numeric',
        'calc_amt' => 'required|numeric'
        // 'file' => 'required'

      ];

      $messages = [
         'gift_cat.required' => 'This field is required',
         'gift_cat.string'   => 'This field is invalid',

         'sub_cat.required' => 'This field is required',
         'sub_cat.string'   => 'This field is invalid',

         'amount.required' => 'Please Enter GiftCard Amount',
         'amount'   => 'GiftCard Amount Must Be A Number',
         'calc_amt.required'      => 'Please Enter Calculated Amount',
         'calc_amt.numeric'      => 'Calculated amount must be a number, Please re-enter giftcard amount'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()){
          return response()->json(['errors' => $validator->errors()], 422);
      }else{

        if($pic = $request->file){
            //$pic = $request->file('card_file');

            //pull out the name of the image and append time to it
            $name = time() . $pic->getClientOriginalName();

            //move the image to images folder. If the folder doesn't exist, it creates it
            $pic->move('ImageUploads', $name);

            $file = FileUpload::create(['file' => $name]);
            $input['file_id'] = $file->id;

        //return response()->json(['success' => 'Request Received successfully, Please check '.$user->email.' within 24 hrs for futher details', 'redirect_link' => route('dashboard.giftcard')]);

        }

         $data = new Giftcard();
         $data->cat     = $input['gift_cat'];
         $data->sub_category_id = $input['sub_cat'];
         $data->user_id  = $user->id;
         $data->payment_method = $input['pay_method'];
         $data->giftcard_amt = $input['amount'];
        if($request->file){
         $data->file_id = $file->id;
        }
         $data->calculated_amount = $input['calc_amt'];
         $data->comment = $input['comment'];
         $data->save();

        $notify = new notification();
        $notify->admin = 'Admin';
        $notify->seen = 0;
        $notify->content = 'Hello Admin, A user '.$user->firstname. " " .$user->lastname.' has made a giftcard upload and is awaiting your approval';
        $notify->save();

        //return response()->json(['success' => 'Request Received successfully, Please check '.$user->email.' within 24 hrs for futher details', 'redirect_link' => route('dashboard.giftcard')]);
        return redirect()->back()->with('good','Request Received successfully, Please check '.$user->email.' within 24 hrs for futher details');

      }
    }

    public function see(Request $request){
        $pay = DigitalAsset::find(1);
        $pm = DigitalAsset::find(2);
        $cash = DigitalAsset::find(3);
        $payo = DigitalAsset::find(4);
        return view('dashboard.digital_asset', compact('pay', 'pm', 'cash', 'payo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function show(Giftcard $giftcard)
    {
        $cats = Category::all();
       return view('dashboard.giftcard', compact('cats'));
    }

    public function subcat(Request $request, $id){

        $result = Category::findOrFail($id);
        $results = $result->subcats;
        //return dd($result);
        //echo '<option value="">Select Sub Category</option>';
        foreach($results as $key){

        echo '<option value="'.$key->id.'" id="'.$key->id."-".$key->amount.'">'.$key->name." &nbsp;&nbsp;&#8358;".$key->amount.' per dollar(&#36;)</option>';

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Giftcard $giftcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giftcard $giftcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giftcard $giftcard)
    {
        //
    }
}
