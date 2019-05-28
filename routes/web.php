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
});
Route::get('/prices', function () {
    return view('prices');
})->name('prices');

Route::get('/my-orders', function () {
    return view('app.my-orders');
})->name('my-orders');


// App Routes

//Customer Routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/customer-orders', 'OrderController');
Route::resource('/admin-orders', 'AdminOrderController');


//Admin Routes

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin-home', 'HomeController@admin')->name('admin-home');
    Route::resource('/admin-orders', 'Admin\OrderController');
    Route::resource('/transactions', 'Admin\TransactionController');

});


// payment Routes
Route::get('order/{id}', 'PayController@order');
Route::post('payment', 'PayController@addOrder')->name('payment');
Route::get('paid-success', 'PayController@paid')->name('paid-success');
Route::get('paid-failure', 'PayController@failed')->name('paid-failure');


