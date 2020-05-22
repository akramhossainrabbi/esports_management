<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUserBalance; 

class UserBalanceController extends Controller
{
    public function userBalanceView()
    {
    	$balance = AppUserBalance::sum('balance_amount');
    	return view('Admin.user_balance')
    		->with('balance', $balance);
    }
}
