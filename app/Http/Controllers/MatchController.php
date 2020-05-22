<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AddMatch;
use App\AppAdmin;
use App\MatchType;
use App\StoreMatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function matchView(Request $request)
    {
        $Games = AddGame::all();
        $Match_type = MatchType::all();
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        return view('Admin.add-match')
            ->with('admins',$Admin)
            ->with('Match_type',$Match_type)
            ->with('Games',$Games);
    }
    public function storeMatch(Request $request)
    {
        $request->validate([
            'match_game_id'=>'required',
            'win_prize'=>'required',
            'per_kill'=>'required',
            'entry_fee'=>'required',
            'type'=>'required',
            'version'=>'required',
            'map'=>'required',
            'match_start'=>'required',
            'date'=>'required',
            'match_code'=>'required',
        ]);

        $Matchs = new AddMatch();

        $Matchs->match_game_id=$request->match_game_id;
        $Matchs->win_prize=$request->win_prize;
        $Matchs->per_kill=$request->per_kill;
        $Matchs->entry_fee=$request->entry_fee;
        $Matchs->type=$request->type;
        $Matchs->version=$request->version;
        $Matchs->map=$request->map;
        $Matchs->match_start=$request->match_start;
        $Matchs->match_date=$request->date;
        $Matchs->match_code=$request->match_code;

        if ($Matchs->save()){
            $id = $Matchs->match_id;

            $store_match = new StoreMatch();

            $store_match->store_match_id=$id;
            $store_match->match_game_id=$request->match_game_id;
            $store_match->match_time=$request->match_start;
            $store_match->match_date=$request->date;
            $store_match->win_prize=$request->win_prize;
            $store_match->per_kill=$request->per_kill;
            $store_match->entry_fee=$request->entry_fee;
            $store_match->type=$request->type;
            $store_match->version=$request->version;
            $store_match->match_code=$request->match_code;
            $store_match->map=$request->map;
            $store_match->save();
            $request->session()->flash('message','Data Inserted Successfully');
            return redirect('/esport.admin.login.panel/add-match');
        }

    }

    public function matchList(Request $request){
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        $match_list = AddMatch::get();
        return view('Admin.match-list')
            ->with('admin',$Admin)
            ->with('matchs',$match_list);

    }

    public function deleteMatch(Request $request,$id){
        AddMatch::where('match_id',$id)->delete();
        $request->session()->flash('message','Match has been deleted successfully!');
        return back();
    }
}
