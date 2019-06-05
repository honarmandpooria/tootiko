<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/prices', function () {
    return view('prices');
})->name('prices');
Route::get('/file-upload-test', function () {
    return view('file-upload-test');
})->name('/file-upload-test');


// App Routes

//Customer Routes

Auth::routes(['verify' => true]);


//users auth and verified

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/customer-orders', 'OrderController');


    // payment Routes
    Route::get('order/{id}', 'PayController@order');
    Route::post('payment', 'PayController@addOrder')->name('payment');
    Route::get('paid-success', 'PayController@paid')->name('paid-success');
    Route::get('paid-failure', 'PayController@failed')->name('paid-failure');


});


//Admin Routes

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin-home', 'HomeController@admin')->name('admin-home');
    Route::resource('/admin-orders', 'Admin\OrderController');
    Route::resource('/transactions', 'Admin\TransactionController');

});




// test upload progress bar


Route::post('/file-upload-test-post', 'FileUploadController@upload' )->name('upload-file');




// real upload progress bar


Route::post('/translate-file', 'TranslateFileController@store' )->name('translate-file');











