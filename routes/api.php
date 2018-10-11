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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::group(['namespace' => 'API'], function() {

Route::resource('categories', 'categoriesAPIController');
Route::resource('status_orders', 'status_orderAPIController');
Route::post('login_buyer', 'buyersAPIController@login');
Route::resource('buyers', 'buyersAPIController');
Route::resource('sellers', 'sellersAPIController');
Route::resource('products', 'productsAPIController');
Route::resource('stories', 'storiesAPIController');
});









Route::resource('settings', 'settingsAPIController');