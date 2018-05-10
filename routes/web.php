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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*******************************************Index page*****************************************************/
Route::get('/', 'IndexController@index');

Route::post('/select-store', 'IndexController@ajaxStoreFront');


/*******************************************Catalog pages*****************************************************/
Route::get('/stores', 'Catalog\StoreController@index');

Route::get('/stores/{storeId}/menu','Catalog\CategoryController@index');

Route::get('/stores/{storeId}/menu/{categoryId}/product/{productId}','Catalog\ProductController@index');



/*******************************************Cart/Checkout pages*****************************************************/
Route::get('/cart', 'Checkout\CartController@index');

Route::post('/cart', 'Checkout\CartController@buttonAddToCartAction')->name('addToCart');

Route::post('/cart/update', 'Checkout\CartController@updateProductQuantityInSession')->name('updateCart');

Route::get('/checkout', function(){
	return view('checkout/checkout');
})->name('checkout');

Route::post('/placeOrder', 'Checkout\CheckoutController@placeOrderAction')->name('placeOrder');



/*******************************************Customer Account/Order pages*****************************************************/
Route::get('/myaccount', 'Account\AccountController@index' )->name('myAccount');

Route::get('/myaccount/orders', 'Account\OrderController@index')->name('myOrders');

Route::get('/myaccount/orders/{orderId}','Account\OrderDetailController@index')->name('orderDetails');

Route::post('/myaccount/ratestore', 'Account\OrderDetailController@ajaxRateStore')->name('rateStore');

Route::post('/myaccount/ratedelivery', 'Account\OrderDetailController@ajaxRateDelivery')->name('rateDelivery');

Route::post('/myaccount/rateproduct', 'Account\OrderDetailController@ajaxRateProduct')->name('rateProduct');





/*******************************************Delivery management Pages*****************************************************/
Route::get('/delivery', 'Account\DeliveryController@index')->name('myJobs');

Route::get('/delivery/{orderId}', 'Account\DeliveryController@getDeliveryJobDetails');





/*******************************************Manager management page*****************************************************/
Route::get('/manager', 'Account\ManagerController@index')->name('manager');

Route::post('/manager/sendsalary', 'Account\ManagerController@ajaxSetSalary');

Route::post('/manager/verifyvisitor', 'Account\ManagerController@ajaxVerifyVisitor');

Route::post('/manager/declinevisitor', 'Account\ManagerController@ajaxDeclineVisitor');

Route::post('/manager/assigntodelivery', 'Account\ManagerController@ajaxAssignToDelivery');


/*******************************************Cook management page*****************************************************/
Route::get('/cooktest', function(){
	return view ('cook.cook');
})->name('myMenu');