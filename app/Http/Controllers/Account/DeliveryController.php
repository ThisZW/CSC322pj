<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order;
use iEats\Model\Order\OrderToDelivery;
use iEats\Model\Rating\CustomerRating;
use iEats\Model\Catalog\Store;
use iEats\Model\Address\Address;
use Auth;
class DeliveryController extends Controller
{

    public function index(){
    	$data['delivered'] = $this->getDeliveredOrders();
        $data['waiting'] = $this->getWaitingOrders();
    	return view ('delivery.delivery')->with('data', $data);
    }

    public function getDeliveredOrders(){
    	$data = OrderToDelivery::where('status', 3)->where('delivery_id', Auth::id())->get();
        foreach($data as $d){
            if(CustomerRating::where('order_id', $d->order_id)->count() > 0){
                $d->has_rating = true;
                $d->rating = round(CustomerRating::where('customer_id', $d->order->user_id)->avg('score'), 2);
            }
            else $d->has_rating = false;
    	}
        return $data;
    }

    public function getWaitingOrders(){
        $data = OrderToDelivery::where('status', 2)->where('delivery_id', Auth::id())->get();
        return $data;
    }

    public function ajaxRateCustomer(Request $request){
        $customerRating = new CustomerRating;
        $customerRating->score = $request->score;
        if($request->comment)
            $customerRating->comment = $request->comment;
        else
            $customerRating->comment = "Not required";
        $customerRating->order_id = $request->orderId;
        $customerRating->customer_id = $request->customerId;
        $customerRating->rater_id = Auth::id();
        $customerRating->save();
        return response()->json(array('data'=> 'Success!'), 200);
    }

    public function getDeliveryJobDetails($order_id){
        $order = Order::find($order_id);
        $data['order'] = $order;
        $data['user'] = Address::find($order->address_id);
        $store = Store::find($order->store_id);
        $data['store'] = Address::find($store->address_id);
        return view('delivery.jobs')->with('data',$data);
    }

    public function confirmDelivery($order_id){
        $order = Order::find($order_id);
        $order->orderToDelivery->status = 3;
        $order->orderToDelivery->save();
        return $this->getDeliveryJobDetails($order_id);
    }
}
