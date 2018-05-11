<?php

namespace iEats\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\User;
use iEats\Model\Catalog\Product;
use Auth;

class ProductController extends Controller
{
    
    /**
    * get product details.
    * @param int $storeId, int $categoryId, int $productId
    * @return iEats\Model
    */
    public function getProductData($storeId,$categoryId,$productId){

        $product = Product::with('productOptions')->find($productId);
        return $product;

    }


    /**
    * Display product details.
    * @param int $storeId, int $categoryId, int $productId
    * @return \Illuminate\Http\Response
    */
    public function index($storeId,$categoryId,$productId){
        return view('catalog.product')
                ->with('data',$this->getProductData($storeId,$categoryId,$productId))
                ->with('tier', $this->getPriceTier());

    }

    public function getPriceTier(){
        if(Auth::guest()){
            return 1;
        }
        $rating = User::find(Auth::id())->customerRatings->avg('score');
        if($rating > 4){
            $tier = 3;
        } else if ($rating > 2) {
            $tier = 2;
        } else {
            $tier = 1;
        }
        return $tier;
    }

}
