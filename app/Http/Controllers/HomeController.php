<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (session()->get('order') && Auth::user()->email_verified_at){

            $input = session()->get('order');
            $input['user_id'] = Auth::user()->id;
            Order::create($input);
            session()->forget('order');

        }


        $orders = Auth::user()->orders;

        return view('home')->with('orders',$orders);
    }


    public function admin()
    {

        $orders = Order::all();
        return view('app.admin.home')->with('orders', $orders);
    }


}
