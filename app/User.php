<?php

namespace iEats;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        return $this->hasMany('iEats\Model\Order\Order');
    }
    
    public function salary(){
        return $this->hasMany('iEats\Model\Account\SalaryTransaction');
    }

    public function customerRatings(){
        return $this->hasMany('iEats\Model\Rating\CustomerRating', 'customer_id')->orderBy('id', 'desc');
    }

    public function deliveryRatings(){
        return $this->hasMany('iEats\Model\Rating\DeliveryRating', 'delivery_id')->orderBy('id', 'desc');
    }

}
