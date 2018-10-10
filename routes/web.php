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

Route::get('/home', 'HomeController@index');





Route::resource('categories', 'categoriesController');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('statusOrders', 'status_orderController');

Route::resource('buyers', 'buyersController');

Route::resource('sellers', 'sellersController');

Route::resource('products', 'productsController');

Route::resource('stories', 'storiesController');