<?php

namespace App\Http\Controllers;

use App\lib\zarinpal;
use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use nusoap_client;

class PayController extends Controller
{

    public function order(Request $request, $transaction_id, $quality_id)
    {


        $MerchantID = 'c5830bd8-9a6b-11e9-a53b-000c29344814';
        $Authority = $request->get('Authority');

        $transaction = Transaction::findOrFail($transaction_id);

        //ما در اینجا مبلغ مورد نظر را بصورت دستی نوشتیم اما در پروژه های واقعی باید از دیتابیس بخوانیم

        if ($quality_id == 1) {

            $Amount = $transaction->quality_1_price;

        } elseif ($quality_id == 2) {

            $Amount = $transaction->quality_2_price;

        } elseif ($quality_id == 3) {

            $Amount = $transaction->quality_3_price;

        }


        if ($request->get('Status') == 'OK') {
//            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client->soap_defencoding = 'UTF-8';

            //در خط زیر یک درخواست به زرین پال ارسال می کنیم تا از صحت پرداخت کاربر مطمئن شویم
            $result = $client->call('PaymentVerification', [
                [
                    //این مقادیر را به سایت زرین پال برای دریافت تاییدیه نهایی ارسال می کنیم
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ],
            ]);

            if ($result['Status'] == 100) {

                $transaction->update(['isPaid' => 1, 'quality_id' => $quality_id]);

                $order = $transaction->order;

                $order->update(['status_id' => 3]);

                return redirect('/customer-orders/'.$order->id)->with('success',' مبلغ با موفقیت پرداخت شد و سفارش شما در حال ترجمه است!');

            } else {

                $order = $transaction->order;
                return redirect('/customer-orders/'.$order->id)->with('error','پرداخت با موفقیت انجام نشد! لطفا دوباره تلاش کنید یا با پشتیبانی تماس بگیرید.');

            }

        } else {

            $order = $transaction->order;
            return redirect('/customer-orders/'.$order->id)->with('error','پرداخت با موفقیت انجام نشد! لطفا دوباره تلاش کنید یا با پشتیبانی تماس بگیرید.');

        }


    }

    public function addOrder(Request $request)
    {


//        get transaction
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
//        send user to zarinpal
        $order = new zarinpal();
        $res = $order->pay($Amount, $transaction->order->user->email, "09121111111", $CallbackURL);
//        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
        return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $res);


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
