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

// App Routes

// Customer Routes

Auth::routes(['verify' => true]);
Route::get('/login-register', function () {
    return view('auth.login-and-register');
})->name('login-register');



// Users auth and verified

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/customer-orders', 'OrderController');
    Route::get('/get-order-with-status/{status_id}', 'OrderController@showOrdersWithStatus')->name('get-order-with-status');


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


// Before Register

Route::post('/before-register', 'OrderBeforeRegisterController@setOrderSession')->name('before-register.setOrderSession');


// Ajax upload file

Route::post('/translate-file', 'OrderController@ajaxFileUpload')->name('file-upload');
Route::post('/order-before-register', 'OrderBeforeRegisterController@step1')->name('order-before-register');



// Google Api Login
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');







