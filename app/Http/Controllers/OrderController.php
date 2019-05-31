<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use App\Mail\OrderSubmited;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Auth::user()->orders()->latest()->get();
        return view('app.customer.order.index')->with('orders', $orders);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.customer.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerOrderRequest $request)
    {


        $input = $request->all();
        $input['status_id'] = 1;


//        this will check the incoming file type based on its content!
//        dd($request->file('translation_file')->getMimeType());


//        save file
//        $path = Storage::putFile('public/translation-files', $request->file('translation_file'));

        $ext = $request->file('translation_file')->getClientOriginalExtension();
        $hash = Str::random(40);
        $path = $request->file('translation_file')->storeAs('public/translation-files', $hash . '.' . $ext);

//        save file path in db
        $input['translation_file'] = $path;


        $order = Auth::user()->orders()->create($input);

//        send email to user and admin

        Mail::to($request->user())->send(new OrderSubmited($order));

        return redirect('/customer-orders');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::findOrFail($id);
        return view('app.customer.order.show')->with('order', $order);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        $order = Order::findOrFail($id);
//        return view('app.customer.order.edit')->with('order',$order);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
