<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AppUser;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function userHomeView(Request $request)
    {
        $Games = AddGame::all();
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        return view('User.user-home')
            ->with('users',$User)
            ->with('Games',$Games);

    }
}
