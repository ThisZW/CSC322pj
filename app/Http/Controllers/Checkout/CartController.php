<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

class CartController extends Controller
{
    
    public function index(){
    	return view('checkout.cart');
    }

    
    public function addProductsToCart(){

    }
    
}
