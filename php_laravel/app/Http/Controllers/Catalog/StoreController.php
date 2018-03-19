<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\stores;

class StoreController extends Controller
{


     /**
     * Get complete store model
     *
     * @return iEats\Model
     */
    public function getAllStores()
    {
    	$data = stores::all();
    	return $data;
    }


     /**
     * Show the Store listings (first level page of catalog)
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$data = $this->getAllStores();
        return view('catalog.stores')->with('data', $data);
    }

}
