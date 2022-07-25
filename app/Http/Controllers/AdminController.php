<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Giftcard;
use App\UserTransaction;
use App\SubCategory;
use App\Withdrwal;
use App\Notification;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $withdraws = Withdrwal::all();
        $giftcards = Giftcard::where('status', 'approved');
        $assets = UserTransaction::all();

        return view('admin.index', compact('users', 'withdraws', 'giftcards', 'assets'));
    }

    public function view_notification(){
        $notify = Notification::where('admin','Admin')
                                ->where('seen', '0');
        $notify->update(['seen' => '1']);

        $results = Notification::all();
        return view('admin.notification', compact('results'));

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
