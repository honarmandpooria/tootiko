<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class OrderBeforeRegisterController extends Controller
{

    public function setOrderSession(CustomerOrderRequest $request)
    {

        $input = [];

        $input['operation_id'] = $request->operation_id;
        $input['category_id'] = $request->category_id;
//        $input['is_secret'] = $request->is_secret;
//        $input['quality_id'] = $request->quality_id;
        $input['remaining_days'] = $request->remaining_days;
        $input['description'] = $request->description;
        $input['translation_url'] = $request->translation_url;
        $input['code'] = $hash = Str::random(6);
        $input['status_id'] = 1;

//        this will check the incoming file type based on its content!
//        dd($request->file('translation_file')->getMimeType());

        $translate_file_path = session()->get('translate_file_path');
        $input['translation_file'] = $translate_file_path;

        //validate file exist

        if ($translate_file_path || $request->translation_url) {

            session(['order' => $input]);

        } else {

            $errors = new MessageBag();
            $errors->add('translation_file', 'لطفا یک فایل را انتخاب کنید!');
            return redirect()->back()->withInput($request->input())->withErrors($errors);

        }

        return redirect('/login-register')->with('success', ' سفارش شما ثبت شد! لطفا برای نهایی سازی سفارش وارد شوید یا ثبت نام کنید.');

    }


}
