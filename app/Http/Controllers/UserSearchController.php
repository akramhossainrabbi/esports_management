<?php

namespace App\Http\Controllers;

use App\AppAdmin;
use App\AppUser;
use App\AppUserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserSearchController extends Controller
{
    public function userSearchView(Request $request)
    {
        if ($request->user_username){
            $username = $request->user_username;
            $searched_user = AppUser::where('user_username', $username)->first();
            $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
            return view('Admin.user-search')
                ->with('Admin',$Admin)
                ->with('searched_user',$searched_user);

        }else{
            $username = null;
            $searched_user = AppUser::where('user_username', $username)->first();
            $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
            return view('Admin.user-search')
                ->with('Admin',$Admin)
                ->with('searched_user',$searched_user);

        }
    }

    public function addBalance(Request $request)
    {
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->first();

        if (Hash::check($request->password,$Admin->admin_password)){
            $pre_balance = AppUserBalance::where('balance_user_id',$request->user_id)->first();
            if ($pre_balance){
                $Balance = AppUserBalance::find($pre_balance->balance_id);
                $new_balance = $pre_balance->balance_amount+$request->amount;
                $request->validate([
                    'amount'=>'required',
                    'user_id'=>'required',
                ]);

                $Balance->balance_amount=$new_balance;
                $Balance->save();
                $request->session()->flash('message', 'Balance added successfully');
                return back();
            }else{
                $Balance = new AppUserBalance();
                $request->validate([
                    'amount'=>'required',
                    'user_id'=>'required',
                ]);

                $Balance->balance_user_id=$request->user_id;
                $Balance->balance_amount=$request->amount;
                $Balance->save();
                $request->session()->flash('message', 'Balance added successfully');
                return back();
            }


        }else{
            $request->session()->flash('message2', 'Sorry Wrong Password');
            return back();
        }

    }
}
