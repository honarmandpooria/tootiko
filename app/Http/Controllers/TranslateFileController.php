<?php

namespace App\Http\Controllers;

use App\TranslateFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TranslateFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file = $request->file('translation_file');
        $ext = $file->getClientOriginalExtension();
        $hash = Str::random(40);
        $path = $file->move('t-files', $hash . '.' . $ext);
        $input['translation_file'] = $path;

        TranslateFile::create($input);


    }

    /**
     * Display the specified resource.
     *
     * @param \App\TranslateFile $translateFile
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateFile $translateFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TranslateFile $translateFile
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateFile $translateFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TranslateFile $translateFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateFile $translateFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TranslateFile $translateFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateFile $translateFile)
    {
        //
    }
}
