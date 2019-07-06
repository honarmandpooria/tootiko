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

Route::get('/', 'WelcomeController@welcome')->name('welcome');


Route::get('/test', 'ShetabitController@test')->name('test');


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


    // old payment Routes
//    Route::get('order/{transaction_id}/{quality_id}', 'PayController@order');
//    Route::post('payment', 'PayController@addOrder')->name('payment');
//    Route::get('paid-success', 'PayController@paid')->name('paid-success');
//    Route::get('paid-failure', 'PayController@failed')->name('paid-failure');


    // new payment Routes
    Route::get('order/{transaction_id}/{quality_id}', 'ShetabitController@order');
    Route::post('payment', 'ShetabitController@addOrder')->name('payment');
    Route::get('paid-success', 'ShetabitController@paid')->name('paid-success');
    Route::get('paid-failure', 'ShetabitController@failed')->name('paid-failure');



    // ticket routes
    Route::resource('customer/tickets', 'TicketController');
    Route::resource('customer/tickets/messages', 'MessageController');


});




// shetabit Routes
Route::get('pay','ShetabitController@pay')->name('pay');


//Admin Routes

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin-home', 'HomeController@admin')->name('admin-home');


//     orders + trash and restore orders
    Route::resource('/admin-orders', 'Admin\OrderController');
    Route::get('/trashed-orders', 'Admin\OrderController@trashed')->name('trashed-orders');
    Route::put('/restore-order/{admin_order}', 'Admin\OrderController@restore')->name('restore-order');

    Route::resource('/transactions', 'Admin\TransactionController');
    Route::resource('/files', 'Admin\FileController');

});


// Before Register

Route::post('/before-register', 'OrderBeforeRegisterController@setOrderSession')->name('before-register.setOrderSession');


// Ajax upload file

Route::post('/translate-file', 'OrderController@ajaxFileUpload')->name('file-upload');
Route::post('/order-before-register', 'OrderBeforeRegisterController@step1')->name('order-before-register');


// Google Api Login
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');







