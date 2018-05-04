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

Route::get('/', 'IndexController@index');

Route::post('/select-store', 'IndexController@ajaxStoreFront');
Route::get('/select-store', 'IndexController@ajaxStoreFront');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stores', 'Catalog\StoreController@index');

Route::get('/stores/{storeId}/menu','Catalog\CategoryController@index');

Route::get('/stores/{storeId}/menu/{categoryId}/product/{productId}','Catalog\ProductController@index');

Route::get('/cart', 'Checkout\CartController@index');

Route::post('/cart', 'Checkout\CartController@buttonAddToCartAction')->name('addToCart');

Route::post('/cart/update', 'Checkout\CartController@updateProductQuantityInSession')->name('updateCart');

Route::get('/myaccount', 'Account\AccountController@index' )->name('myAccount');

Route::get('/myaccount/orders', 'Account\OrderController@index')->name('myOrders');

Route::get('/myaccount/orders/{orderId}','Account\AccountController@getOrderDetailsView')->name('orderDetails');

Route::get('/checkout', function(){
	return view('checkout/checkout');
})->name('checkout');

Route::post('/placeOrder', 'Checkout\CheckoutController@placeOrderAction')->name('placeOrder');


Route::get('/deliveryindextest', function(){
	return view ('delivery.delivery');
});

Route::get('/deliveryjobtest', function(){
	return view ('delivery.job');
});

Route::get('/managertest', function(){
	return view ('manager.manager');
});

Route::get('/cooktest', function(){
	return view ('cook.cook');
});