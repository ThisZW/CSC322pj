<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Checkout\CartProduct;

class CartController extends Controller
{
    
    public function index(){
    	return view('checkout.cart');
    }

    
    public function addProductsToCart(Request $request){
    	$data = $request->all();

    	$cp = new CartProduct([
    		'product_id' => $data['id'],
    		'price' => $data['price'],
    		'quantity' => $data['quantity'],
    	]);

    	foreach ($data as $d){
    		echo $d;
    	}
    	dd($cp);
    }
}
