<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Catalog\ProductOption;
use iEats\Model\Catalog\Product;

class CartController extends Controller
{

    /**
    * add a product into cart in session
    *
    * @param Illuminate\Http\Request $request
    * @return void
    */
    public function addProductToSession(Request $request){
        $optionString = 'Options: ';
        $priceAfterAddOns = $request->price;
        if($request->option){
            foreach($request->option as $oid){
                $o = ProductOption::find($oid);
                $optionString = $optionString . $o->option_type . "," . $o->option_name . '. ';
                $priceAfterAddOns += $o->add_on_price;
            }

            if($request->input('extras')){
                
                $optionString = $optionString . ' ' . (string)$request->extras;
            }

        } else $optionString = 'No Options';
        $cartProduct = [
            'product_id' => $request->id,
            'name' => $request->name,
            'option_string' =>$optionString,
            'price' => $priceAfterAddOns,
            'quantity' => $request->quantity,
            'options' => $request->option,
            ];
        $request->session()->push('cart', $cartProduct);
    }



    /**
    * update product quantity of cart in session
    *
    * @param Illuminate\Http\Request $request, int $index
    * @return void
    */
    public function updateProductQuantityInSession(Request $request, $index){
        $cart = $request->session()->get('cart');
        $cart[$index]['quantity'] += $request->quantity;
        $request->session()->forget('cart');
        $request->session()->put('cart', $cart);
    }



    /**
    *
    *checkout/cart "delete button" get action method, delete selected product in session
    *@param Illuminate\Http\Request $request
    *@return \Illuminate\Http\Response (index)
    */
    public function buttonDeleteCartProductAction(Request $request){
        $index = array_search($request->delete_id, array_column($request->session()->get('cart'), 'product_id'));
        $cart = $request->session()->get('cart');
        unset($cart[$index]);
        return $this->index();
    }


    /**
    * catalog/product "add to cart" post action method, add/update product in session
    *
    * @param Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response (index)
    */
    public function buttonAddToCartAction(Request $request){

        /*session
            cart
                [product_id => xx , price => xx, quantity => xx, options => [],[],[]]

        */
        if (!$request->session()->has('cart')){     
            $this->addProductToSession($request);
        } 
        else {
            $index = 0;
            $hasDuplicate = false;
            foreach(session()->get('cart') as $sp){
                if($sp['product_id'] == $request->id && $sp['options'] == $request->option){
                    $this->updateProductQuantityInSession($request, $index);
                    $hasDuplicate = true;
                }
                $index++;
            }
            if (!$hasDuplicate) $this->addProductToSession($request);
            /*if($index = array_search($request->id, array_column(session()->get('cart'), 'product_id')) !== false){
                if (session()->get('cart')[$index]['options'] == $request->option)
                    $this->updateProductQuantityInSession($request, $index);*/
        } 
        return $this->index();
        
    }


    /**
    * Calculate subtotal
    *
    * @param 
    * @return null
    */
    public function getSubtotal(){
        $total = 0;
        if (session()->has('cart')){
            foreach(session()->get('cart') as $sp){
                $total += $sp['price'] * $sp['quantity'];
            }
            session()->put('subtotal', $total);
        }
        
    }

    /**
    * Display Cart pge.
    *
    * @param 
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $this->getSubtotal();
        return view('checkout.cart');   
    }

    /**
    * Test method
    *
    * @param Illuminate\Http\Ruquest $request
    * @return void
    */
    public function test(Request $request){
        //session()->flush();
        //$this->processSessionData($request);
        //dd($request);
    }
}
