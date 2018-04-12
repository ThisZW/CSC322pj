<?php

namespace iEats\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

use iEats\Model\Checkout\CartProduct;
use iEats\Model\Checkout\CartOption;

class CartController extends Controller
{

    /**
    * add a product into cart in session
    *
    * @param Illuminate\Http\Request $request
    * @return void
    */
    public function addProductToSession(Request $request){

        $cartProduct = [
            'product_id' => $request->id,
            'price' => $request->price,
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
    * catalog/product "add to cart" post action method, add/update product in session
    *
    * @param Illuminate\Http\Request $request
    * @return void
    */
    public function buttonAddToCartAction(Request $request){

        /*session
            cart
                [product_id => xx , price => xx, quantity => xx, options => [],[],[]]

        */
        if (!$request->session()->has('cart')){     
            $this->addProductToSession($request);
        } else {
            if($index = array_search($request->id, array_column($request->session()->get('cart'), 'product_id')) !== false){
                $this->updateProductQuantityInSession($request, $index);
            } else {
                $this->addProductToSession($request);
            }
        }
        
    }

    /**
    * Display Cart page.
    *
    * @param Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){

        $data = $request->all();
        return view('checkout.cart')->with('request', $request);

    }

}
