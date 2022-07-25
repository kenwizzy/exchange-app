<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\SubCategory;
use App\Giftcard;

class AdminGiftcardController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cat_name' => ['required', 'string', 'unique:categories'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        return view('admin.add_giftcards', compact('cats', 'subcats'));
    }

    public function add_cat(Request $request){

        $rules = [
            'name'     => 'required|string|unique:categories',
          ];


          $messages = [
            'name.required' => 'Please Select Giftcard Name',
            'name.unique'   => 'Giftcard already Exist',
            'name.string' => 'Invalid Giftcard Format',

         ];

    $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
    }else{
        if(Auth::check()){
          Category::create(['name' => $request->name]);
          return redirect()->back()->with('success', 'Giftcard Added Successfully');

        }else{
            redirect('/');
        }
    }

    }

    public function add_sub(Request $request){
        $rules = [
            'name'     => 'required|string|unique:sub_categories',
            'cat_id'   => 'required',
            'rate'     => 'required|numeric',
          ];

          $messages = [
            'name.required' => 'Please Select Giftcard Name',
            'name.unique'   => 'Giftcard Category already Exist',
            'name.string' => 'Invalid Giftcard Category Format',

         ];

    $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()){
        return redirect()->back()->with('errors', $validator->errors());
    }else{
        if(Auth::check()){
          SubCategory::create([
              'name' => $request->name,
              'category_id' => $request->cat_id,
              'amount' => $request->rate,
              ]);
          return redirect()->back()->with('success', 'Giftcard Category Added Successfully');

        }else{
            redirect('/');
        }

    }

    }

    public function all_giftcards(){

        $giftcards = Giftcard::all();
        return view('admin.giftcards', compact('giftcards'));

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
