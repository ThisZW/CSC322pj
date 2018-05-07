<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order;
use iEats\Model\Catalog\Store;
use iEats\Model\Catalog\Product;

class OrderDetailController extends Controller
{
    

    public function index($orderId){
    	$data = $this->getOrderDetails($orderId);
    	$data->store = $this->getStore($data->store_id);
    	//dd($data);
    	return view('account/order_details')->with('data', $data);	
    }


    public function getOrderDetails($orderId){
    	$order = Order::with('orderProducts')->find($orderId);
        foreach($order->orderProducts as $op){
            $p = Product::with('ratings')->find($op->product_id);
            $op->rating = $p->ratings->avg('score');
        }
    	return $order;
    }


    public function getStore($storeId){
    	$store = Store::with('ratings')->find($storeId);
    	//calculate avg ratings
    	$store->rating = $store->ratings->avg('score');
    	return $store;
    }

}