<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AddMatch;
use App\AppMatchJoinedPlayer;
use App\AppUser;
use App\AppUserBalance;
use Illuminate\Http\Request;

class SubmitJoiningReqController extends Controller
{
    public function joinView(Request $request,$id)
    {
        $Match=AddMatch::where('match_id', $id)->first();
        $datas = AddGame::where('game_id',$Match->match_game_id)->first();
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        return view('User.submit-joining')
            ->with('users',$User)
            ->with('Match',$Match)
            ->with('datas',$datas);
    }
    public function saveJoinReq(Request $request,$id)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        $match_type = AddMatch::where('match_id',$request->match_id)->first();
        $CountUser = AppMatchJoinedPlayer::where('match_id', $request->match_id)->count();
        if ($match_type->type==1){
            $full = 100;
        }elseif($match_type->type==2){
            $full = 50;
        }else{
            $full = 25;
        }

        if ($CountUser==$full){
            $request->session()->flash('message2','The Room is full ! Please Join another match');
            return back();
        }else{
            $Match=AddMatch::where('match_id', $request->match_id)->first();
            $pre_balance = AppUserBalance::where('balance_user_id',$User->user_id)->first();

            if ($pre_balance==null){
                $request->session()->flash('message3','You did not added any money to your account');
                return back();
            }else{
                $Balance = AppUserBalance::find($pre_balance->balance_id);
                if ($Match->type==1){
                    $new_balance = $pre_balance->balance_amount-$Match->entry_fee;
                    $entry_fee = $Match->entry_fee;
                }elseif ($Match->type==2){
                    $new_balance = $pre_balance->balance_amount-($Match->entry_fee*2);
                    $entry_fee = $Match->entry_fee*2;
                }else{
                    $new_balance = $pre_balance->balance_amount-($Match->entry_fee*4);
                    $entry_fee = $Match->entry_fee*4;
                }


                if ($pre_balance->balance_amount<$entry_fee){
                    $request->session()->flash('message3','You have insufficient Balance.');
                    return back();
                }else{
                    $already_in = AppMatchJoinedPlayer::where('joined_user_id',$User->user_id)->first();
                    if (!$already_in) {
                       $JoinMatch = new AppMatchJoinedPlayer();

                        $JoinMatch->joined_user_id=$User->user_id;
                        $JoinMatch->match_id=$request->match_id;
                        $JoinMatch->game_user_name_one=$request->game_user_name_one;
                        $JoinMatch->game_user_name_two=$request->game_user_name_two;
                        $JoinMatch->game_user_name_three=$request->game_user_name_three;
                        $JoinMatch->game_user_name_four=$request->game_user_name_four;
                        if ($JoinMatch->save()){
                            $Balance->balance_amount=$new_balance;
                            $Balance->save();
                            $match_id =$request->match_id;
                            $request->session()->flash('message','You joined the match successfully');
                            return redirect()->to('/wait/'.$match_id);
                        } 
                    }else{
                        $request->session()->flash('message4',"Don't be greedy!");
                        return redirect()->back();
                    }
                    
                }
            }

        }

    }
}
