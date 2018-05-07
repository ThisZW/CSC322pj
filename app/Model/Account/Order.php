<?php

namespace iEats\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function store(){
    	return $this->belongsTo('iEats\Model\Catalog\Store');
    }
}
