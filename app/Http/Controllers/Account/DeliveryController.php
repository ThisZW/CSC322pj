<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function index(){
    	return view ('delivery.delivery');
    }

    public function getDeliveryJobDetails(){
    	return view('delivery.jobs');
    }
}
