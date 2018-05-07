<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderProducts(){
    	return $this->hasMany('iEats\Model\Order\OrderProduct');
    }

    protected $fillable = [
        'user_id', 'payment_method', 'subtotal'
    ];

    public function store(){
    	return $this->belongsTo('iEats\Model\Catalog\Store');
    }

    public function orderToDelivery(){
    	return $this->hasOne('iEats\Model\Order\OrderToDelivery');
    }
}
