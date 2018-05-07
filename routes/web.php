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

Route::get('/myaccount/orders/{orderId}','Account\OrderDetailController@index')->name('orderDetails');

Route::post('/myaccount/ratestore', 'Account\OrderDetailController@ajaxRateStore')->name('rateStore');

Route::post('/myaccount/ratedelivery', 'Account\OrderDetailController@ajaxRateDelivery')->name('rateDelivery');

Route::post('/myaccount/rateproduct', 'Account\OrderDetailController@ajaxRateProduct')->name('rateProduct');






Route::get('/checkout', function(){
	return view('checkout/checkout');
})->name('checkout');

Route::post('/placeOrder', 'Checkout\CheckoutController@placeOrderAction')->name('placeOrder');


Route::get('/deliveryindextest', function(){
	return view ('delivery.delivery');
})->name('myJobs');

Route::get('/deliveryjobtest', function(){
	return view ('delivery.jobs');
});

Route::get('/managertest', function(){
	return view ('manager.manager');
})->name('manager');

Route::get('/cooktest', function(){
	return view ('cook.cook');
})->name('myMenu');