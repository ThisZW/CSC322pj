<?php

namespace iEats\Http\Controllers\Account;

use Illuminate\Http\Request;
use iEats\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getOrderDetailsView(){
    	return veiw('account.order_details');
    }
}
