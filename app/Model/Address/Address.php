<?php

namespace iEats\Model\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user(){
    	return $this->belongsTo('User');
    }

    public function store(){
    	return $this->belongsTo('iEats\Model\Catalog\Store');
    }
}
