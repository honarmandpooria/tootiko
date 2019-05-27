<?php

namespace App\Http\Controllers;

use App\lib\zarinpal;
use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use nusoap_client;

class PayController extends Controller
{

    public function order(Request $request, $id)
    {


        $MerchantID = '416137cc-2f9e-11e9-9245-005056a205be';
        $Authority = $request->get('Authority');

        $transaction = Transaction::findOrFail($id);

        //ما در اینجا مبلغ مورد نظر را بصورت دستی نوشتیم اما در پروژه های واقعی باید از دیتابیس بخوانیم
        $Amount = $transaction->price;
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

                $order = $transaction->order;

                $order->update(['status_id' => 3]);


                return redirect('/paid-success');


            } else {
                return 'خطا در انجام عملیات';
            }
        } else {
            return 'خطا در انجام عملیات';
        }


    }

    public function addOrder(Request $request)
    {


//        get transaction
        $transaction = Transaction::findOrFail($request->transaction_id);

        $CallbackURL = url('/order/' . $transaction->id); // Required
//        send user to zarinpal
        $order = new zarinpal();
        $res = $order->pay($transaction->price, $transaction->order->user->email, "0912111111", $CallbackURL);
//        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
        return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $res);


    }


    public function paid()
    {
        return view('app.customer.order.paid-success');
    }


}
