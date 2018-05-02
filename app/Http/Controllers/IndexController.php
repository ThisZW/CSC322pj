<?php

namespace iEats\Http\Controllers;

use Illuminate\Http\Request;
use iEats\Model\Address\Address;
use iEats\Model\Catalog\Store;

class IndexController extends Controller
{

    /**
     * return to the index page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $stores = Address::all()->load('stores');
        return view('pages.index')->with('data', $stores);
    }

    public function ajaxStoreFront(Request $request){
        $data = $this->getSelectedStore($request->coord);
    	return response()->json(array('data'=> $data), 200);
    }

    public function getSelectedStore($coord){
        $addr = Address::where('x_grid', $coord[0])
                    ->where('y_grid', $coord[1])
                    ->first();
        $store = Store::with('products')->find($addr->id); //determined by rating & customer choices not done yet.
        return $store;
    }
}
