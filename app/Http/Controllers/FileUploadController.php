<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{

    public function upload(Request $request)
    {

        $file = $request->file('test_file');
        $ext = $file->getClientOriginalExtension();
        $hash = Str::random(40);
        $path = $file->move('test', $hash . '.' . $ext);
        $input['test_file'] = $path;

        File::create($input);


//        return redirect()->back()->with('Success', 'file Added');
//
//        return response('success');


    }


}
