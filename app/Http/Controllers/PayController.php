<?php

namespace App\Http\Controllers;

use App\lib\zarinpal;
use App\Order;
use Illuminate\Http\Request;
use nusoap_client;

class PayController extends Controller
{

    public function order(Request $request)
    {



        $MerchantID = '416137cc-2f9e-11e9-9245-005056a205be';
        $Authority =$request->get('Authority') ;

        //ما در اینجا مبلغ مورد نظر را بصورت دستی نوشتیم اما در پروژه های واقعی باید از دیتابیس بخوانیم
        $Amount = 125000;
        if ($request->get('Status') == 'OK') {
//            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client->soap_defencoding = 'UTF-8';

            //در خط زیر یک درخواست به زرین پال ارسال می کنیم تا از صحت پرداخت کاربر مطمئن شویم
            $result = $client->call('PaymentVerification', [
                [
                    //این مقادیر را به سایت زرین پال برای دریافت تاییدیه نهایی ارسال می کنیم
                    'MerchantID'     => $MerchantID,
                    'Authority'      => $Authority,
                    'Amount'         => $Amount,
                ],
            ]);

            if ($result['Status'] == 100) {
                return 'پرداخت با موفقیت انجام شد.';

            } else {
                return 'خطا در انجام عملیات';
            }
        }
        else
        {
            return 'خطا در انجام عملیات';
        }



    }

    public function addOrder(Request $request)
    {

        $order = Order::findOrFail($request->order);
        $price = $order->words * ($order->status_id == 1 ? '20' : ($order->status_id == 2 ? '25' : '30'));

        $order = new zarinpal();
        $res = $order->pay($price, $request->email, "0912111111");
//        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
        return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $res);


    }


}
