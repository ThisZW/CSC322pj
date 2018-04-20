<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getOrderDetailsView($orderId){
    	return view('account.order_details');
    }

    public function calculateAverageRating(){
    	//
    }

    public function index(){
    	//
    }
}

