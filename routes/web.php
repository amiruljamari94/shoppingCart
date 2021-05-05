<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');

//cart
Route::get('/cart/add/{productId}', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/list', 'CartController@CartList')->name('cart.list');
Route::post('/cart/list/update/{id}', 'CartController@updateCart')->name('cart.update');
Route::get('/cart/list/remove/{id}', 'CartController@remove')->name('cart.remove');

//order
Route::post('/order', 'OrderController@placeOrder')->name('order.placeOrder');
Route::get('/orderHistory', 'OrderController@orderHistory')->name('order.history');

//checkout
Route::get('/checkout', 'OrderController@checkout')->name('checkout');

Route::get('/cart/empty', function(){
    Cart::destroy();
});