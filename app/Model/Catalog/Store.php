<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    public function address(){
    	return $this->belongsTo('iEats\Model\Address\Address');
    }
}
