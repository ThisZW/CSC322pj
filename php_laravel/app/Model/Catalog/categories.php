<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function store()
    {
    	return $this->belongsTo('iEats\Model\Catalog\stores');
    }
}
