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

Route::get('/LavarelDefaultPage', function () {
    return view('welcome');
});

Route::get('/', function(){
	return view('pages/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stores', 'Catalog\StoreController@index');

Route::get('/stores/{storeId}/menu','Catalog\CategoryController@index');

Route::get('/stores/{storeId}/menu/{categoryId}/product/{productId}','Catalog\ProductController@index');

Route::get('/cart', 'Checkout\CartController@index');

Route::post('/cart', 'Checkout\CartController@addProductsToCart')->name('addToCart');