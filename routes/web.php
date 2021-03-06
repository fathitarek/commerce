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
 //Route::get('contact','mailController@getContact');

// Route::POST('/category','mailController@postContact');
// Route::get('/category', function () {
//     return view('front.category');
// });


Auth::routes();

Route::get('/', 'IndexFrontController@indexRender');
Route::get('/stories', 'StoriesFrontController@storiesRender');
Route::get('/products', 'ProductsFrontController@productsRender');
Route::get('/contacts', 'ContctsFrontController@contactsRender');
Route::get('/category', 'CategoriesFrontController@categoriesRender');
Route::get('/sellers', 'SellersFrontController@sellersRender');
Route::get('/vendor/{id}', 'VendorFrontController@vendorRender');
Route::get('/product/{id}', 'ProductFrontController@productRender');

Route::POST('/fat', 'ContctsFrontController@formSections');



Route::group(['prefix' => 'Admin'], function() {
Route::resource('categories', 'categoriesController');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('statusOrders', 'status_orderController');
Route::resource('buyers', 'buyersController');
Route::resource('sellers', 'sellersController');
Route::post('products/search', 'productsController@search');
Route::resource('products', 'productsController');
Route::resource('stories', 'storiesController');
Route::resource('settings', 'settingsController');
Route::resource('indexControls', 'index_controlController');


});


