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

Route::get('/my-orders', function () {
    return view('app.my-orders');
})->name('my-orders');



// App Routes

    //Customer Routes

Route::resource('/customer-orders', 'OrderController');
Route::resource('/admin-orders', 'AdminOrderController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
