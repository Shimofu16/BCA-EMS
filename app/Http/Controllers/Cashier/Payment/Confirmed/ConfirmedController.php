<?php

namespace App\Http\Controllers\Cashier\Payment\Confirmed;

use App\Http\Controllers\Controller;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\SchoolYear;
use Illuminate\Http\Request;

class ConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('status','=',1)->get();
        /* try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();

            $payments = Payment::where('sy_id','=', $currentSy->id)->where('status','=',1)->get();
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $payments = PaymentLog::where('sy_id','=', $currentSy->id)->where('status','=',1)->get();
        }*/
        return view('BCA.Admin.cashier-layout.payments.confirmed.index',compact('payments')); 
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
