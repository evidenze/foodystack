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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/place-order', 'HomeController@processOrder')->name('placeOrder');
Route::get('/confirm-payment/{txref}', 'HomeController@confirmOrder')->name('confirmOrder');
Route::get('/confirm-order-payment/{txref}/{product_id}', 'HomeController@confirmOrderPayment')->name('confirmOrderPayment');
Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
Route::get('/cart', 'CartController@showCart')->name('showCart');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::get('/order/{id}', 'CartController@showOrderDetails')->name('orderDetails');
Route::get('/delete/{id}', 'CartController@deleteOrder')->name('deleteOrder');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
});
