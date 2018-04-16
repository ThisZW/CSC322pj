<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use Auth;
use iEats\Model\Order\Order;
use iEats\Model\Order\OrderProduct;
class CheckoutController extends Controller
{
   
	public function index(){
		//no index yet, everything is inside the session.
	}

	public function setOrder(){
		$subtotal = session()->get('subtotal');
		$user_id = Auth::id();
		$order = new Order;

		$order->user_id = $user_id;
		$order->payment_method = "Paypal";
		$order->subtotal = $subtotal;
		$order->save();

		foreach(session()->get('cart') as $sp){
			$orderProduct = new OrderProduct([
				'product_id' => $sp['product_id'],
				'name' => $sp['name'],
				'options' => $sp['option_string'],
				'price' => $sp['price'],
				'quantity' => $sp['quantity'],
			]);
			$order->orderProducts()->save($orderProduct);
		}
	}


	public function placeOrderAction(){
		if (Auth::guest()){
			//do registration for him and do the rest
		}

		$this->setOrder();
	}

}
