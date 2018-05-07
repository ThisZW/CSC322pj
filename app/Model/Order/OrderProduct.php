<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'name', 'options', 
        'price', 'quantity',
    ];

    public function product(){
    	return $this->belongsTo('iEats\Model\Catalog\Product');
    }

    public function ratings(){
    	return $this->hasOne('iEats\Model\Rating\ProductRating');
    }
}
