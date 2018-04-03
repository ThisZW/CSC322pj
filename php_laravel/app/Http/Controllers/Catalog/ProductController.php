<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\products;

class ProductController extends Controller
{
    
    public function getProductData($storeId,$categoryId,$productId){
    	$product = products::where('id',$productId)->first();
    	$product->store_id = $storeId;
    	return $product;
    }


    public function index($storeId,$categoryId,$productId){
    	return view('catalog.product')->with('data',$this->getProductData($storeId,$categoryId,$productId));
    }
}
