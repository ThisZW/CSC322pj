<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    public function address(){
    	return $this->belongsTo('iEats\Model\Address\Address');
    }

    public function categories(){
    	return $this->hasMany('iEats\Model\Catalog\Category');
    }

    public function products(){
    	return $this->hasManyThrough('iEats\Model\Catalog\Product', 'iEats\Model\Catalog\Category');
    }
}
