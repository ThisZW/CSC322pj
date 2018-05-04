<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use Auth;
use iEats\User;
use iEats\Model\Order\Order;
use iEats\Model\Order\OrderProduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class CheckoutController extends Controller
{
   
	public function index(){
		//no index yet, everything is inside the session.
	}


	/**
	*store order details into database from session of cart
	*@param  Request $request
	*@return void
	*/
	public function setOrder(Request $request){
		$subtotal = session()->get('subtotal');
		$store_id = session()->get('store');
		
		$order = new Order;
		if (Auth::guest()){
			$user_id = 0;
			$file = $request->file('verification');
			//dd($file);
			$request->verification->store('public/uploads');
			$file_name = $request->file('verification')->hashName();
			$order->file = $file_name;
		}	
		else {
			$user_id = Auth::id();
			$user = User::find(Auth::id());
			$user_stores = explode(',', $user->stores);
			if (!in_array( $store_id, $user_stores, false)){
				array_push($user_stores, $store_id);
				sort($user_stores);
				$user->stores = implode( "," , $user_stores);
				$user->save();
			}
		}
		$order->user_id = $user_id;
		$order->store_id = $store_id;
		$order->payment_method = "Paypal";
		$order->subtotal = $subtotal;
		$order->order_name = $request->name;
		$order->phone_number = $request->phone_number;
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

	/**
	*set order after registration/logged in customer
	*@param none
	*@return void
	*/
	public function placeOrderAction(Request $request){
		$this->setOrder($request);
		return view('checkout.success');
	}

	public function validateRegistration($data){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'username' =>$data['username'],
        ]);
    }

}
