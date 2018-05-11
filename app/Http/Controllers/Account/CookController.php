<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Catalog\Store;
use Auth;
use iEats\User;
use iEats\Model\Rating\ProductRating;

class CookController extends Controller
{
    
    public function index(){
    	$data['store'] = $this->getStoreAndProducts();
    	$data['name'] = Auth::user()->name;
    	return view('cook.cook')->with('data', $data);
    }

    public function getStoreAndProducts(){
    	$store = Store::with('products')->find(Auth::user()->stores);
    	foreach($store->products as $p){
    		$p->rating = $p->ratings->avg('score');
    	}
    	return $store;
    }

}
