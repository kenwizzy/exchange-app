<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DigitalAsset;
use App\UserTransaction;

class AdminDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = DigitalAsset::find(1);
        $pm = DigitalAsset::find(2);
        $cash = DigitalAsset::find(3);
        $payo = DigitalAsset::find(4);
        return view('admin.exchange_rate', compact('pay', 'pm', 'cash', 'payo'));
    }

    public function update_pay(Request $request, $id){

      $paypal = DigitalAsset::findOrFail($id);
      $paypal->update(['rate' => $request->pay_rate]);

      return redirect()->back()->with('success', 'Paypal Rate Updated Successfully');

    }

    public function update_pm(Request $request, $id){

        $pm = DigitalAsset::findOrFail($id);
        $pm->update(['rate' => $request->pm_rate]);

        return redirect()->back()->with('success', 'Perfect Money Rate Updated Successfully');

      }

      public function update_cash(Request $request, $id){

        $cash = DigitalAsset::findOrFail($id);
        $cash->update(['rate' => $request->cash_rate]);

        return redirect()->back()->with('success', 'Cash App Rate Updated Successfully');

      }

      public function update_payo(Request $request, $id){

        $payo = DigitalAsset::findOrFail($id);
        $payo->update(['rate' => $request->payo_rate]);

        return redirect()->back()->with('success', 'Payoneer Rate Updated Successfully');

      }


      public function get_all_exchanges(){

        $exchanges = UserTransaction::all();
        return view('admin.all_exchanges', compact('exchanges'));

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
