<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\Product;
use iEats\Model\Catalog\ProductOptionType;

class ProductController extends Controller
{
    
    public function getProductData($storeId,$categoryId,$productId){
    	$product = Product::find($productId)->first();
 		$product->productOptions = Product::find($productId)->productOptions;

    	return $product;
    }


    public function index($storeId,$categoryId,$productId){
    	return view('catalog.product')->with('data',$this->getProductData($storeId,$categoryId,$productId));
    }
}
