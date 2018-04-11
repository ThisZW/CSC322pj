<?php

namespace iEats\Model\Checkout;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'quantity', 'price',
    ];

    public function cartOption(){
    	return $this->hasMany('iEats/Model/Checkout/CartOption');
    }

    public function product(){
    	return $this->hasONe('iEats/Model/Checkout/Product');
    }
}
