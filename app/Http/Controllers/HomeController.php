<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AddMatch;
use App\AppUser;
use App\MatchType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView(Request $request,$id)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        $datas=AddGame::leftjoin('match', 'match.match_game_id', 'all_games.game_id')->where('game_id', $id)->get();
        return view('User.home')
            ->with('users',$User)
            ->with('datas',$datas);
    }
}
