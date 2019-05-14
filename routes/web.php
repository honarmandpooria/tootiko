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

Route::get('/order', function () {
    return view('app.order');
})->name('order');

Route::get('/my-orders', function () {
    return view('app.my-orders');
})->name('my-orders');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
