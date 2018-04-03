<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\products;
use iEats\Model\Catalog\product_options;
use iEats\Model\Catalog\product_option_types;
class ProductController extends Controller
{
    
    public function getProductData($storeId,$categoryId,$productId){
    	$product = products::where('id',$productId)->first();
    	$product->store_id = $storeId;
    	$productOptions = product_options::with('product_option_types')->where('product_id',$productId)->get();

    	$product->options = $productOptions;
    	return $product;
    }


    public function index($storeId,$categoryId,$productId){
    	return view('catalog.product')->with('data',$this->getProductData($storeId,$categoryId,$productId));
    }
}
