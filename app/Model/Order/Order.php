<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderProducts(){
    	return $this->hasMany('iEats\Model\Order\OrderProduct');
    }

    public function address(){
    	return $this->belongsTo('iEats\Model\Address\Address');
    }
    
    protected $fillable = [
        'user_id', 'payment_method', 'subtotal'
    ];
}
