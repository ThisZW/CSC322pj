<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\Category;
use iEats\Model\Catalog\Product;

class CategoryController extends Controller
{

	/**
	* Get all data from categories based on selected stores
	*
	* @param int $storeId
	* @return iEats\Model
	*/
	public function getListings($storeId)
	{
		$categories = Category::with('products')->where('store_id', $storeId)->get();
		return $categories;	
	}


    /**
    * Show the Category listings based on selected store
    *
    * @param int $storeId
    * @return \Illuminate\Http\Response
    */
    public function index($storeId){
    	return view('catalog.category')->with('data',$this->getListings($storeId));
    }

}
