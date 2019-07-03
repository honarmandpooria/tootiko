<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use nusoap_client;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;

class ShetabitController extends Controller
{
    public function test()
    {

        $invoice = new Invoice;

        $invoice->amount(1000);

        $payment = Payment::callbackUrl('tootiko.test/order/')->purchase($invoice, function ($driver, $transactionId) {

        })->pay();

        dd($payment);

    }


    public function order(Request $request, $transaction_id, $quality_id)
    {

        $transaction = Transaction::findOrFail($transaction_id);

        if ($quality_id == 1) {

            $Amount = $transaction->quality_1_price;

        } elseif ($quality_id == 2) {

            $Amount = $transaction->quality_2_price;

        } elseif ($quality_id == 3) {

            $Amount = $transaction->quality_3_price;

        }

        $zarinTransactionId = session()->get('zarinTransactionId');


        try {

            Payment::amount($Amount)->transactionId($zarinTransactionId)->verify();
            $transaction->update(['isPaid' => 1, 'quality_id' => $quality_id]);

            $order = $transaction->order;

            $order->update(['status_id' => 3]);

            return redirect('/customer-orders/' . $order->id)->with('success', ' مبلغ با موفقیت پرداخت شد و سفارش شما در حال ترجمه است!');


        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified , it throw an exception.
             * we can catch the excetion to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/

            $order = $transaction->order;
            return redirect('/customer-orders/'.$order->id)->with('error','پرداخت با موفقیت انجام نشد! لطفا دوباره تلاش کنید یا با پشتیبانی تماس بگیرید.');

        }

    }

    public function addOrder(Request $request)
    {

        $transaction = Transaction::findOrFail($request->transaction_id);

//        get price
        if ($request->quality_id == 1) {

            $Amount = $transaction->quality_1_price;

        } elseif ($request->quality_id == 2) {

            $Amount = $transaction->quality_2_price;

        } elseif ($request->quality_id == 3) {

            $Amount = $transaction->quality_3_price;

        }

        $CallbackURL = url('/order/' . $transaction->id . '/' . $request->quality_id); // Required


        $invoice = new Invoice;
        $invoice->amount($Amount);

        return Payment::callbackUrl($CallbackURL)->purchase($invoice, function ($driver, $zarinTransactionId) {

            session(['zarinTransactionId' => $zarinTransactionId]);

        })->pay();


    }


    public function paid()
    {
        return view('app.customer.order.paid-success');
    }

    public function failed()
    {
        return view('app.customer.order.paid-failure');
    }


}
