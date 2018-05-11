<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
    	return $this->belongsTo('iEats\Model\Catalog\Category');
    }
    
    public function productOptions()
    {
    	return $this->hasMany('iEats\Model\Catalog\ProductOption');
    }

    public function ratings()
    {
    	return $this->hasMany('iEats\Model\Rating\ProductRating');
    }

    public function cooks()
    {
        return $this->hasMany('iEats\Model\Catalog\CookToProduct');
    }

}