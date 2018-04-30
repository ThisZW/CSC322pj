<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\User;
use Auth;

class OrderController extends Controller
{

    public function index(){
    	$data = $this->getOrders();
    	return view('account/orders')->with('data', $data);
    }

    public function getOrders(){
    	$user = User::with('orders')->find(Auth::id());
    	return $user;
    }
    
}
