<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Order\Order;
use iEats\Model\Order\OrderToDelivery;
use Auth;
class DeliveryController extends Controller
{
    public function index(){
    	$data = $this->getDeliveredOrders();
    	return view ('delivery.delivery');
    }

    public function getDeliveredOrders(){
    	$data = OrderToDelivery::with(['orderToDelivery' => function($query){
    		$query->where('status', 1)->where('delivery_id', Auth::id());
    	}])->get();
    	dd($data);
    	return $data;
    }

    public function getWaitingOrders(){

    }
}
