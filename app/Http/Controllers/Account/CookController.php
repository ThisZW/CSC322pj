<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;
use iEats\Model\Catalog\Store;
use iEats\Model\Rating\ProductRating;
use iEats\Model\Catalog\Product;
use iEats\Model\Catalog\ProductOption;
use Auth;
use iEats\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class CookController extends Controller
{
    
    public function index(){
    	$data['store'] = $this->getStoreAndProducts();
    	$data['name'] = Auth::user()->name;
    	return view('cook.cook')->with('data', $data);
    }

    public function getStoreAndProducts(){
    	$store = Store::with('products')->find(Auth::user()->stores);
    	foreach($store->products as $p){
    		$p->rating = $p->ratings->avg('score');
    	}
    	return $store;
    }

    public function modifyProductView($productId){
        $product = Product::find($productId);
        $store = Store::find(Auth::user()->stores);
        return view('cook.edit-product')->with('data', $product)->with('store', $store);
    }

    public function modifyProduct(Request $request){
        $store = Store::find(Auth::user()->stores);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->price_t1 = $request->price_t1;
        $product->price_t2 = $request->price_t2;
        $product->price_t3 = $request->price_t3;
        $product->category_id = $request->category;

        $product->save();
        //dd($product);
        return view('cook.edit-product')->with('data', $product)->with('store', $store);
    }

    public function addProductView(){
        $store = Store::find(Auth::user()->stores);
        return view('cook.add-product')->with('store', $store);
    }

    public function addProduct(Request $request){
        $store = Store::find(Auth::user()->stores);
        $product = New Product;
        $product->name = $request->name;
        $product->price_t1 = $request->price_t1;
        $product->price_t2 = $request->price_t2;
        $product->price_t3 = $request->price_t3;
        $product->category_id = $request->category;
        $product->description = "default";
        $product->status = 1;
        $file = $request->file('image');
        $file->store('public/images/product-images');
        $file_name = $request->file('image')->hashName();
        $product->image = $file_name;

        $product->save();
        if($request->option){
            foreach($request->option as $o){
                $po = new ProductOption;
                $po->option_name = $o;
                $po->option_type = 'option';
                $po->add_on_price = 0;
                $product->productOptions()->save($po);
            }
        }
        if($request->size){
            foreach($request->size as $o){
                $po = new ProductOption;
                $po->option_name = $o;
                $po->option_type = 'size';
                $po->add_on_price = 0;
                $product->productOptions()->save($po);
            }
        }
        if($request->extra){
            foreach($request->extra as $o){
                $po = new ProductOption;
                $po->option_name = $o;
                $po->option_type = 'extras';
                $po->add_on_price = 0;
                $product->productOptions()->save($po);
            }
        }
        return redirect('/cook/modifyproduct/' . $product->id);
    }

    public function ajaxDeleteProduct(){
        return response()->json(array('data'=> 'Success!'), 200);
    }

}
