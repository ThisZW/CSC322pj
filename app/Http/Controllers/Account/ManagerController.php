<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Account\SalaryTransaction;
use iEats\Model\Order\Order;
use iEats\Model\Order\OrderToDelivery;
use iEats\User;
use Auth;

class ManagerController extends Controller
{

    /**
    *get data everything and return template
    *
    *@return \Illuminate\Http\Response
    */
    public function index(){
    	$data = array(
    		'cooks' => $this->getCookInfo(),
    		'deliverys' => $this->getDeliveryInfo(),
    		'orders' => $this->getStoreOrders(),
    	);
    	return view('manager.manager')->with('data', $data);
    }


    /**
    *calculate total salary for every delivery/cooks
    *
    *@param int $id
    *@return \Illuminate\Http\Response
    */
    public function getTotalSalary($id){
    	return SalaryTransaction::where('user_id', $id)->sum('salary');
    }


    /**
    *delivery information
    *
    *@return iEats\Model
    */
    public function getDeliveryInfo(){
    	$data = User::with('salary')->where('role', 'delivery')->get();
    	foreach ($data as $d){
    		$d->salaries = $this->getTotalSalary($d->id);
    	}
    	return $data;
    }


    /**
    *get cook information
    *
    *@return iEats\Model
    */
    public function getCookInfo(){
    	$data = User::with('salary')->where('role', 'cook')->get();
    	foreach ($data as $d){
    		$d->salaries = $this->getTotalSalary($d->id);
    	}
    	return $data;
    }


    /**
    *get all orders from current store
    *
    *@return iEats\Model
    */
    public function getStoreOrders(){
    	$data = Order::with('orderToDelivery')->where('store_id', Auth::user()->stores)->orderBy('id', 'desc')->get();
    	foreach($data as $d){
    		$delivery_name = User::select('name')->find($d->orderToDelivery['delivery_id']);
    		$d->delivery_name = $delivery_name['name'];
    	}
    	return $data;
    }


    /**
    *set salary transaction using ajax
    *
    *@param Request #request
    *@return json
    */
    public function ajaxSetSalary(Request $request){
    	$salary = new SalaryTransaction;
    	$salary->user_id = $request->userId;
    	$salary->salary = $request->salary;
    	$salary->save();
    	return response()->json(array('data'=> 'Success!'), 200);
    }


    /**
    *pass visitor's order after verification
    *
    *@param Request #request
    *@return json
    */
    public function ajaxVerifyVisitor(Request $request){
    	$orderToDelivery = OrderToDelivery::where('order_id', $request->orderId)->first();
    	$orderToDelivery->delivery_id = $request->deliveryId;
    	$orderToDelivery->status = 2; //send orders to delivery persons.
    	$orderToDelivery->save();
    	return response()->json(array('data'=> 'Success!'), 200);
    }


    /**
    *decline visitor's order and set status to 0
    *
    *@param Request #request
    *@return json
    */
    public function ajaxDeclineVisitor(Request $request){
    	$orderToDelivery = OrderToDelivery::where('order_id', $request->orderId)->first();
    	$orderToDelivery->status = 0; //decline orders
    	$orderToDelivery->save();
    	return response()->json(array('data'=> 'Success!'), 200);
    }


    /**
    *assign normal user's order to delivery and set status to 2
    *
    *@param Request #request
    *@return json
    */
    public function ajaxAssignToDelivery(Request $request){
    	$orderToDelivery = OrderToDelivery::where('order_id', $request->orderId)->first();
    	$orderToDelivery->delivery_id = $request->deliveryId;
    	$orderToDelivery->status = 2; //send orders to delivery persons.
    	$orderToDelivery->save();
    	return response()->json(array('data'=> 'Success!'), 200);
    }
}
