<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use Auth;


class CheckoutController extends Controller
{
   
	public function index(){
		//no index yet, everything is inside the session.
	}

	public function placeOrderAction(){
		if (Auth::guest()){
			//do registration for him and do the rest
		}

		

	}

}
