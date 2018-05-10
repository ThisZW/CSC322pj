<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order;
use iEats\Model\Catalog\Store;
use iEats\Model\Catalog\Product;
use iEats\Model\Rating\StoreRating;
use iEats\Model\Rating\DeliveryRating;
use iEats\Model\Rating\ProductRating;
use Auth;
use iEats\User;
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
        if ($deliveryName = User::find($order->orderToDelivery->delivery_id))
            $order->deliveryName = $deliveryName->name;
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

    public function ajaxRateStore(Request $request){
        $storeRating = new StoreRating;
        $storeRating->store_id = $request->storeId;
        $storeRating->comment = $request->comment;
        $storeRating->score = $request->score;
        $storeRating->rater_id = Auth::id();
        $storeRating->save();
        return response()->json(array('data'=> 'Success!'), 200);
    }

    public function ajaxRateDelivery(){
        $deliveryRating = new DeliveryRating;
        $deliveryRating->delivery_id = $request->deliveryId;
        if($request->comment)
            $deliveryRating->comment = $request->comment;
        else
            $deliveryRating->comment = "Not required";
        $deliveryRating->score = $request->score;
        $deliveryRating->rater_id = Auth::id();
        $deliveryRating->save();
        return response()->json(array('data'=> 'Success!'), 200);
    }


    public function ajaxRateProduct(Request $request){
        $productRating = new ProductRating;
        $productRating->order_product_id = $request->orderProductId;
        $productRating->score = $request->score;
        if($request->comment)
            $productRating->comment = $request->comment;
        else
            $productRating->comment = "Not required";
        $productRating->rater_id = Auth::id();
        $productRating->product_id = $request->productId;
        $productRating->save();
        return response()->json(array('data'=> 'Success!'), 200);
    }

}