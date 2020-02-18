<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::get('me', 'Api\AuthController@me');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'Api\ProductsController@index');
Route::get('products/{id}','Api\ProductsController@show');
Route::post('payment','Api\OrdersController@payment');
Route::get('order','Api\OrdersController@show');
Route::post('addToCart/{id}','Api\ShoppingCartController@addToCart');
Route::get('shoppingcart','Api\ShoppingCartController@show');
Route::get('shoppingcart/delete/{id}','Api\ShoppingCartController@delete');
Route::post('shoppingcart/update','Api\ShoppingCartController@update');
Route::get('checkout','Api\ShoppingCartController@checkout');

