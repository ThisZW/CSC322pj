<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order;
use iEats\Model\Catalog\Store;
use iEats\Model\Catalog\Product;
use iEats\Model\Rating\StoreRating;
use Auth;

class OrderDetailController extends Controller
{
    

    public function index($orderId){
    	$data = $this->getOrderDetails($orderId);
    	$data->store = $this->getStore($data->store_id);
    	//dd($data);
    	return view('account/order_details')->with('data', $data);	
    }


    public function getOrderDetails($orderId){
    	$order = Order::with('orderProducts','orderToDelivery')->find($orderId);
        foreach($order->orderProducts as $op){
            $p = Product::with('ratings')->find($op->product_id);
            $op->rating = round($p->ratings->avg('score'),2);
        }
    	return $order;
    }


    public function getStore($storeId){
    	$store = Store::with('ratings')->find($storeId);
    	//calculate avg ratings
    	$store->rating = round($store->ratings->avg('score'),2);
    	return $store;
    }

    public function getAdditionInfo($orderId){
 
    }

    public function ajaxRateStore(Request $request){
        $storeRating = new StoreRating;
        $storeRating->store_id = $request->storeId;
        $storeRating->comment = $request->comment;
        $storeRating->score = $request->score;
        $storeRating->rater_id = Auth::id();
        $storeRating->save();
        return response()->json(array('data'=> 'success'), 200);
    }

    public function ajaxRateDelivery(){

    }

    public function ajaxRateProduct(Request $request){
    }

}