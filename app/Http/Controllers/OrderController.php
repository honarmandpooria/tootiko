<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use App\Mail\OrderSubmited;
use App\Order;
use App\TranslateFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\MessageBag;
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
//        $this->authorize('create');


        session()->forget('translate_file_id');
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

        $input = [];

        $input['operation_id'] = $request->operation_id;
        $input['category_id'] = $request->category_id;
        $input['is_secret'] = $request->is_secret;
        $input['quality_id'] = $request->quality_id;
        $input['remaining_days'] = $request->remaining_days;
        $input['description'] = $request->description;


        $input['status_id'] = 1;


//        this will check the incoming file type based on its content!
//        dd($request->file('translation_file')->getMimeType());


//        save file
//        $path = Storage::putFile('public/translation-files', $request->file('translation_file'));


//        $file = $request->file('translation_file');
//        $ext = $file->getClientOriginalExtension();
//        $hash = Str::random(40);
//        $path = $file->move('translation-files', $hash . '.' . $ext);
//        $input['translation_file'] = $path;
//


        $user_id = Auth::user()->id;
        $input['user_id'] = $user_id;


        $translate_file_id = session()->get('translate_file_id');
        $input['translate_file_id'] = $translate_file_id;

        //validate file exist

        if ($translate_file_id) {

            Order::create($input);

        } else {

            $errors = new MessageBag();
            $errors->add('translation_file', 'لطفا یک فایل را انتخاب کنید!');
            return redirect()->back()->withInput($request->input())->withErrors($errors);

        }


//        send email to user and admin

//        Mail::to($request->user())->send(new OrderSubmited($order));

        return redirect('/customer-orders');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {


        $order = Order::findOrFail($id);

        $this->authorize('view', $order);

        return view('app.customer.order.show')->with('order', $order);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Order $order)
    {
        //
    }
}
