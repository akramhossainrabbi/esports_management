<?php

namespace App\Http\Controllers;

use App\AddMatch;
use App\AppMatchJoinedPlayer;
use App\AppUser;
use App\RoomPassword;
use Illuminate\Http\Request;

class PlayerWaitController extends Controller
{
    public function waitView(Request $request,$id){
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        $joyned_list = AppMatchJoinedPlayer::where('match_id',$id)->get();
        $room_password = RoomPassword::where('room_password_match_id',$id)->first();
        $match = AddMatch::where('match_id',$id)->first();
        return view('User.match_waiting')
            ->with('user',$User)
            ->with('player_list',$joyned_list)
            ->with('match',$match)
            ->with('room_password',$room_password);
    }
}
