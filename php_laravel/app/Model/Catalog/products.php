<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    public function store()
    {
    	return $this->belongsTo('iEats\Model\Catalog\stores');
    }

    public function category()
    {
    	return $this->belingsTo('iEats\Model\Catalog\Categories');
    }
    
}
