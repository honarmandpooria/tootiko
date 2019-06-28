<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminOrderRequest;
use App\Mail\OrderTranslated;
use App\Order;
use App\Quality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        $orders = Order::latest()->get();
        return view('app.admin.order.index')->with('orders', $orders);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'this is show method';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::findOrFail($id);

        $qualities = Quality::all();

        return view('app.admin.order.edit')->with(['order' => $order, 'qualities' => $qualities]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminOrderRequest $request, $id)
    {


        $input = $request->all();
        $order = Order::findOrFail($id);

        if ($request->translated_file) {
            // save file
//            $path = Storage::putFile('public/translated-files', $request->file('translated_file'));
//            $input['translated_file'] = $path;

            $file = $request->file('translated_file');
            $ext = $file->getClientOriginalExtension();
            $hash = Str::random(40);
            $path = $file->move('translated-files', $hash . '.' . $ext);
            $input['translated_file'] = $path;


            $input['status_id'] = 4;

            Mail::to($order->user->email)->send(new OrderTranslated($order));


        } else {

        }


        $order->update($input);


        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect('/admin-orders')->with('success','سفارش با موفقیت حذف شد.');
    }
}
