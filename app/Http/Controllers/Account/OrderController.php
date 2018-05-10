<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\User;
use Auth;

class OrderController extends Controller
{

    /**
    *get template of orders
    *
    *@return Illuminate\Http\response
    */
    public function index(){
    	if (Auth::guest()){
    		return "you are not logged in";
    	}
    	$data = $this->getOrders();
    	return view('account/orders')->with('data', $data);
    }

    /**
    *get all orders for specified customer
    *
    *@return iEats\Model
    */
    public function getOrders(){
    	$user = User::with('orders')->find(Auth::id());
    	return $user;
    }
    
}
