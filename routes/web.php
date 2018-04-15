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

Route::post('/cart', 'Checkout\CartController@buttonAddToCartAction')->name('addToCart');

Route::get('/cart/test', 'Checkout\CartController@test');

Route::get('/myaccount', function(){
	return view('account/account');
})->name('myAccount');//'Account\AccountController@index')->name('My Account');

Route::get('/myaccount/orders', function(){
	return view('account/orders');
})->name('myOrders');

Route::get('/myaccount/orders/{orderId}','AccountController@getOrderDetailsView')->name('orderDetails');




Route::get('/checkout', function(){
	return view('checkout/checkout');
})->name('checkout');