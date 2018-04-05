<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\Category;
use iEats\Model\Catalog\Product;
//use iEats\Model\Catalog\store_products;

class CategoryController extends Controller
{

	/**
	* Get all data from categories based on selected stores
	*
	* @return iEats\Model
	*/
	public function getListings($storeId)
	{

		$categories = Category::find($storeId)->take(20)->get();
		foreach ($categories as $cat){
			#echo "???" . $cat->id;
			$products = Product::where('category_id',$cat->id)->take(20)->get();
			$cat->products = $products;
		}
		return $categories;
	}


     /**
     * Show the Category listings based on selected store
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storeId){
    	return view('catalog.category')->with('data',$this->getListings($storeId));
    }//
}
