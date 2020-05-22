<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeController extends Controller
{
    public function saveSubscribe(Request $request)
    {
    	if ($request->ajax()) {
    		
    		$sabscribe = new Subscribe();

	    	$sabscribe->subscribed_email=$request->subscribed_email;
	        $sabscribe->save();
	        return response()->json(['success'=>'Subscribed successfully!']);
    	}

    }
}
