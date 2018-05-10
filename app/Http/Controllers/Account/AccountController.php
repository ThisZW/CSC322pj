<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order; 
use Auth;

class AccountController extends Controller
{


    /**
    *Calculate avg rating from rating table and return to the customer
    *
    *@return double
    */
    public function calculateAverageRating(){
    	return 5; //not done yet
    }


    /**
    *get last order information for user account page
    *
    *@return array[]
    */
    public function getLastOrderInfo(){
    	if (Order::where('user_id', Auth::id())->count() > 0){
	    	$order = Order::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
            //dd($order);
	    	return [
	    		"phone_number" => $order->phone_number,
	    		"name"		  => $order->order_name,
	    		"address"	  => $order->address_id, 
	    	];
	    } 
	    else {
	    	return [
	    		"phone_number" => "Please make your first order to save your phone number information.",
	    		"address"	  => "Please make your first order to save your address information",
	    	];
	    }
    }


    /**
    *get data from auth and return template
    *
    *@return \Illuminate\Http\Response
    */
    public function index(){
    	$data = [
    		"userId"		=> Auth::id(),
    		"email"  		=> Auth::user()->email,
    		"rating"		=> $this->calculateAverageRating(),
    		"role"			=> Auth::user()->role,
    		"vip"			=> Auth::user()->vip_level,
    		"name"			=> Auth::user()->name,
    	];
    	//dd(array_merge( $data, $this->getLastOrderInfo()));
    	return view('account.account')->with('data', (object) array_merge( $data, $this->getLastOrderInfo()));
    }

}

