<?php

namespace iEats\Http\Controllers;

use Illuminate\Http\Request;
use iEats\Model\Address\Address;

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


}
