<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

/*
Status ids:
1: waiting for approval
2: waiting for deliveries
3: delivered
0: declined 
*/

class OrderToDelivery extends Model
{
	public function delivery(){
		return $this->belongsTo('User', 'delivery_id');
	}

	public function order(){
		return $this->belongsTo('iEats\Model\Order\Order');
	}

	protected $fillable = [
        'store_id', 'order_id', 'delivery_id', 'status'
    ];

}
