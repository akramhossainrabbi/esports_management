<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AppAdmin;
use Illuminate\Http\Request;
use Illuminate\Http\File;

class AdminHomeController extends Controller
{
    public function homeView(Request $request)
    {
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        return view('Admin.admin-home')
            ->with('admins',$Admin);
    }

    public function addGame(Request $request)
    {
        $request->validate([
            'game_name'=>'required',
            'game_image' => 'mimes:jpg,jpeg,png,tiff',
        ]);
        $AddGame = new AddGame();

        $AddGame->game_name=$request->game_name;
        if ($request->hasFile('game_image')) {
            $image = $request->file('game_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/games');
            $image->move($destinationPath, $name);
            $AddGame->game_image = $name;
        }
        $AddGame->save();
        $request->session()->flash('message','Data Inserted Successfully');
        return redirect('/esport.admin.login.panel/home');
    }

    public function gameList(Request $request){
        $game = AddGame::get();
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        return view('Admin.game-list')
            ->with('admin',$Admin)
            ->with('games',$game);


    }

    public function deleteGame(Request $request,$id){
        AddGame::where('game_id',$id)->delete();
        $request->session()->flash('message','Game has been deleted successfully!');
        return back();
    }
}
