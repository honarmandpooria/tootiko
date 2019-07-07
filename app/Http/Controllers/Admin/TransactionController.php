<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderWaitingForPayment;
use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactions = Transaction::latest()->get();
        return view('app.admin.transaction.index')->with('transactions', $transactions);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $order = Order::findOrFail($request->order_id);




        //get price


        $transaction = [];
        $transaction['quality_1_price'] = $request->quality_1_price;
        $transaction['quality_2_price'] = $request->quality_2_price;
        $transaction['quality_3_price'] = $request->quality_3_price;


        $order->transaction()->create($transaction);

        $order->update(['status_id' => 2]);

//        Send Email After status changed
        Mail::to($order->user->email)->send(new OrderWaitingForPayment($order));


        return redirect('/transactions');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect()->back()->with('success','صورت حساب با موفقیت آپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
