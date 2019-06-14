<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function welcome()
    {


        if (Auth::user()) {

            if (count(Auth::user()->orders()->get()->where('status_id', 2))) {

                $orders = Auth::user()->orders()->get()->where('status_id', 2);
                return view('welcome')->with('orders', $orders);

            } else {
                return view('welcome');
            }

        } else {
            return view('welcome');
        }


    }
}
