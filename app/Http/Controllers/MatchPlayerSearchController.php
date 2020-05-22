<?php

namespace App\Http\Controllers;

use App\AddMatch;
use App\AppAdmin;
use App\AppMatchJoinedPlayer;
use App\AppUser;
use App\AppUserBalance;
use App\GameResult;
use App\RoomPassword;
use App\TotalEarn;
use App\TotalKill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MatchPlayerSearchController extends Controller
{
    public function matchPlayerSearchView(Request $request)
    {
        if ($request->match_code){
            $match_date = $request->match_code;
            $match = AddMatch::where('match_code', $match_date)->first();
            if ($match){
                $joined_player = AddMatch::leftjoin('users_joined_in_match','users_joined_in_match.match_id','match.match_id')
                    ->leftjoin('user_info', 'users_joined_in_match.joined_user_id','user_info.user_id')
                    ->where('match.match_id',$match->match_id)->get();
            }else{
                $joined_player = null;
            }
            $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
            return view('Admin.joined_player')
                ->with('Admin',$Admin)
                ->with('match',$match)
                ->with('joined_player',$joined_player);
        }else{
            $match = 0;
            $joined_player = AddMatch::leftjoin('users_joined_in_match','users_joined_in_match.match_id','match.match_id')
                ->leftjoin('user_info', 'users_joined_in_match.joined_user_id','user_info.user_id')
                ->where('match.match_id',$match)->get();
            $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
            return view('Admin.joined_player')
                ->with('Admin',$Admin)
                ->with('match',$match)
                ->with('joined_player',$joined_player);

        }
    }

    public function savePassword(Request $request)
    {

        $request->validate([
            'username'=>'required',
            'password'=>'required',
            'match_id'=>'required',
        ]);

        $room = new RoomPassword();

        $room->room_password_match_id=$request->match_id;
        $room->room_username=$request->username;
        $room->room_password=$request->password;
        $room->save();
        $request->session()->flash('message','You successfully give the room username and password');
        return back();

    }

    public function addKillView(Request $request,$id){
        $player_resut = AppUser::leftjoin('users_joined_in_match','users_joined_in_match.joined_user_id','user_info.user_id')
            ->where('user_id',$id)->first();
        $match = AddMatch::where('match_id', $player_resut->match_id)->first();
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
            return view('Admin.add-result')
                ->with('player_resut',$player_resut)
                ->with('match',$match)
                ->with('Admin',$Admin);

    }

    public function addKillSave(Request $request)
    {

        $match_result = new GameResult();

        $match_result->player_one_username=$request->player_one_username;
        $match_result->player_one_kill=$request->player_one;
        $match_result->player_two_username=$request->player_two_username;
        $match_result->player_two_kill=$request->player_two;
        $match_result->player_three_username=$request->player_three_username;
        $match_result->player_three_kill=$request->player_three;
        $match_result->player_four_username=$request->player_four_username;
        $match_result->player_four_kill=$request->player_four;
        $match_result->winner=$request->winner;
        $match_result->result_match_id=$request->match_id;

        if ($match_result->save()){
            $match = AddMatch::where('match_id', $request->match_id)->first();
            $pre_balance = AppUserBalance::where('balance_user_id',$request->joined_user_id)->first();
            $Balance = AppUserBalance::find($pre_balance->balance_id);
            $kills = $request->player_one+$request->player_two+$request->player_three+$request->player_four;
            if ($request->winner!=null){
                $new_balance = $pre_balance->balance_amount+($match->per_kill*$kills)+$match->win_prize;
            }else{
                $new_balance = $pre_balance->balance_amount+($match->per_kill*$kills);
            }

            $Balance->balance_amount=$new_balance;

            if ($Balance->save()){
                $total_kill = TotalKill::where('user_id_of_kill',$request->joined_user_id)->first();
                if ($total_kill){
                    $Kills = TotalKill::find($total_kill->total_kill_id);

                    $new_kill = $total_kill->kills+$kills;
                    $total_match_played = $total_kill->total_match+1;

                    $Kills->kills=$new_kill;
                    $Kills->total_match=$total_match_played;
                    if ($Kills->save()){
                        $total_earn = TotalEarn::where('player_id',$request->joined_user_id)->first();
                        if ($total_earn){
                            $update_amount = TotalEarn::find($total_earn->earn_id);

                            if ($request->winner!=null){
                                $new_amount =$update_amount->total_earn_amount+($match->per_kill*$kills)+$match->win_prize;
                            }else{
                                $new_amount =$update_amount->total_earn_amount+($match->per_kill*$kills);
                            }

                            $update_amount->total_earn_amount=$new_amount;
                            $update_amount->save();
                            AppMatchJoinedPlayer::where('users_joined_in_match_id', $request->users_joined_in_match_id)->delete();
                            $request->session()->flash('message', 'Data inserted successfully');
                            $url = $request->url;
                            return redirect($url);
                        }else{
                            $update_amount = new TotalEarn();
                            
                            if ($request->winner!=null){
                                $new_amount =($match->per_kill*$kills)+$match->win_prize;
                            }else{
                                $new_amount =$match->per_kill*$kills;
                            }

                            $update_amount->player_id=$request->joined_user_id;
                            $update_amount->total_earn_amount=$new_amount;
                            $update_amount->save();
                            AppMatchJoinedPlayer::where('users_joined_in_match_id', $request->users_joined_in_match_id)->delete();
                            $request->session()->flash('message', 'Data inserted successfully');
                            $url = $request->url;
                            return redirect($url);
                        }
                    }
                }else{
                    $Kills = new TotalKill();

                    $Kills->user_id_of_kill=$request->joined_user_id;
                    $Kills->kills=$kills;
                    $Kills->total_match=1;

                    if ($Kills->save()){
                        $total_earn = TotalEarn::where('player_id',$request->joined_user_id)->first();
                        if ($total_earn){
                            $update_amount = TotalEarn::find($total_earn->player_id);

                            $new_amount =$update_amount->total_earn_amount+($match->per_kill*$kills);

                            $update_amount->total_earn_amount=$new_amount;
                            $update_amount->save();
                            AppMatchJoinedPlayer::where('users_joined_in_match_id', $request->users_joined_in_match_id)->delete();
                            $request->session()->flash('message', 'Data inserted successfully');
                            $url = $request->url;
                            return redirect($url);
                        }else{
                            $update_amount = new TotalEarn();

                            $new_amount =$match->per_kill*$kills;

                            $update_amount->player_id=$request->joined_user_id;
                            $update_amount->total_earn_amount=$new_amount;
                            $update_amount->save();
                            AppMatchJoinedPlayer::where('users_joined_in_match_id', $request->users_joined_in_match_id)->delete();
                            $request->session()->flash('message', 'Data inserted successfully');
                            $url = $request->url;
                            return redirect($url);
                        }
                    }

                }
            }
        }

    }
}
