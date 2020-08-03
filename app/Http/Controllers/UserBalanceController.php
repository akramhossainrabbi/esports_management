<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUserBalance; 
use App\AdminInbox;
use App\AppUser;

class UserBalanceController extends Controller
{
    public function userBalanceView()
    {
    	$user_balance = AppUserBalance::sum('balance_amount');
    	$withdraw = AdminInbox::where([['admin_inbox_subject','withdraw'],['status', '1']])->sum('amount');
    	$user = AppUser::count();
    	$balance = ($user_balance + $withdraw) - ($user*.25);
    	return view('Admin.user_balance')
    		->with('balance', $balance);
    }
}
