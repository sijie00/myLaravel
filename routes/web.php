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
// Admin
Route::group(['middleware'=>'IsAdmin','prefix'=>'admin'],function(){
// Orders
Route::get('orders','AdminOrdersController@index')->name('admin.orders');
Route::get('orders','AdminOrdersController@index')->name('admin.orders');
Route::get('order/{id}/show','AdminOrdersController@show')->name('admin.order.show');
Route::post('order/{id}/save','AdminOrdersController@save')->name('admin.order.save');
// Product
Route::get('products','AdminProductsController@index')->name('admin.products');
Route::get('products/edit/{id}','AdminProductsController@edit')->name('admin.products.edit');
Route::post('products/save/{id}','AdminProductsController@save')->name('admin.products.save');
Route::get('products/delete/{id}','AdminProductsController@delete')->name('admin.products.delete');
});

// User
Route::get('home', 'HomeController@index')->name('home');
Route::post('register','RegisterController@create')->name('register');
Route::get('error','ErrorController@index')-> name('error');
Route::get('blank','ErrorController@blank')-> name('blank');
Route::post('search','ProductsController@search')->name('search');
// Product
Route::get('products', 'ProductsController@index')->name('products');
Route::get('products/{id}','ProductsController@show')-> name('products.show');

Route::group(['middleware'=>'auth'],function(){
// Shopping Cart
Route::post('addToCart/{id}','ShoppingCartController@addToCart')->name('addToCart');
Route::get('shoppingcart','ShoppingCartController@show')->name('showCart');
Route::get('shoppingcart/delete/{id}','ShoppingCartController@delete')->name('cartItem.delete');
Route::post('shoppingcart/update','ShoppingCartController@update')->name('cartItem.update');
Route::get('checkout','ShoppingCartController@checkout')->name('checkout');
// Profile
Route::get('profile/{id}','UsersController@showProfile')->name('profile');
Route::get('profile/edit/{id}','UsersController@editProfile')->name('profile.edit');
Route::post('profile/save/{id}','UsersController@saveProfile')->name('profile.save');
// Orders
Route::post('payment','OrdersController@payment')->name('payment');
Route::get('order','OrdersController@show')->name('order');
Route::get('paid','OrdersController@paid')-> name('paid');
});


