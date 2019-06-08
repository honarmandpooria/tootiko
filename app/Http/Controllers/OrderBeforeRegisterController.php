<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class OrderBeforeRegisterController extends Controller
{

    public function postStep1(Request $request)
    {


        $input = [];

        $input['operation_id'] = $request->operation_id;
        $input['category_id'] = $request->category_id;
        $input['is_secret'] = $request->is_secret;
        $input['quality_id'] = $request->quality_id;
        $input['remaining_days'] = $request->remaining_days;
        $input['description'] = $request->description;
        $input['translation_url'] = $request->translation_url;


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



        return redirect('/register-fast');


    }


    public function createStep2()
    {


        return view('order-validation');

    }

    public function postStep2(Request $request)
    {


        $input['email'] = $request->email;
        $input['role_id'] = 3;
        session(['user' => $input]);

        return redirect('/profile-edit-fast');


    }


    public function createStep3(Request $request)
    {


        return view('user-edit');

    }


    public function postStep3(Request $request)
    {
        $input = session()->get('user');
        $input['name'] = $request->name;
        $input['password'] = $request->password;

        $user = User::create($input);
        $user->orders()->create(session()->get('order'));

        Auth::login($user);

        return redirect('/customer-orders');

    }

}
