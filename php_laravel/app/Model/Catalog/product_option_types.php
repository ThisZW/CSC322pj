<?php

namespace iEats\Model\Catalog;

use Illuminate\Database\Eloquent\Model;

class product_option_types extends Model
{
    
    public function productOptions(){
    	return $this->belongsTo('iEats\Model\Catalog\product_options');
    }
}
