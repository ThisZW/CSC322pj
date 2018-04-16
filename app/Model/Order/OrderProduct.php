<?php

namespace iEats\Model\Order;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'name', 'options', 
        'price', 'quantity',
    ];
}
