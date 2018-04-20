<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

class OrderProductController extends Controller
{
    
    public function index($orderId){
    	return view('account/order_details');	
    }
}
