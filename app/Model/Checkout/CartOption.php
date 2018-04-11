<?php

namespace iEats\Model\Checkout;

use Illuminate\Database\Eloquent\Model;

class CartOption extends Model
{
    public function productOption{
    	return $this->hasOne('iEats/Model/Product/ProductOption');
    }
}
