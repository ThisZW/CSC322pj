<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

class OrderToDelivery extends Model
{
	public function delivery(){
		return $this->belongsTo('User', 'delivery_id');
	}
}
