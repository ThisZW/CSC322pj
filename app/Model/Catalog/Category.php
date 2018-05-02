<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function store()
    {
    	return $this->belongsTo('iEats\Catalog\Store');
    }

    public function products()
    {
    	return $this->hasMany('iEats\Catalog\Product');
    }

}