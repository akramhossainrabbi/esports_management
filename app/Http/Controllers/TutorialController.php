<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function tutorialCotroller(Request $request)
    {
    	return view ('User.tutorial');
    }
}