<?php

namespace App\Http\Controllers;

use App\lib\zarinpal;
use App\Order;
use Illuminate\Http\Request;

class PayController extends Controller
{

    public function order()
    {


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
