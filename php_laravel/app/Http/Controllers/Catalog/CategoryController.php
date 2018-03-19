<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\stores;

class CategoryController extends Controller
{

	/**
	* Get all data from categories based on selected stores
	*
	* @return iEats\Model
	*/
	public function getCategoriesFromStores()
	{

	}


     /**
     * Show the Category listings based on selected store
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storeId){
    	echo $storeId;
    }//
}
