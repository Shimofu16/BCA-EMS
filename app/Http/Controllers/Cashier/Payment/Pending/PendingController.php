<?php

namespace App\Http\Controllers\Cashier\Payment\Pending;

use App\Http\Controllers\Controller;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first();
        $payments = PaymentLog::where('sy_id','=', $sy->id)->where('status','=',0)->get();
        return view('BCA.Admin.cashier-layout.payments.pending.index',compact('payments'));
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
        $payment_log = PaymentLog::find($id);
        $payment_log->amount = $request->input('amount');
        $payment_log->status = 1;
        $payment_log->updated_at = now();
        $payment_log->updated_by = Auth::guard('registrar')->user()->name;
        $payment = Payment::find($payment_log->payment_id);
        $payment->balance = $payment->balance -  $payment_log->amount;
        $payment->save();
        $payment_log->save();
        toast()->success('SYSTEM MESSAGE', 'Payment was successfully confirmed.')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
        return redirect()->route('cashier.payment.confirmed.index');
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
