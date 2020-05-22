<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\AppUser;

class LoginController extends Controller
{
    public function loginView(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        return view('User.index')
            ->with('users',$User);
    }
    public function logUserVarify(Request $request)
    {
        $request->validate([
            'user_username'=>'required',
            'password'=>'required',
        ]);

        $email = $request->user_username;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $User= AppUser::where('user_email',$request->user_username)->first();
        } else {
            $User= AppUser::where('user_username',$request->user_username)->first();
        }
        
        if ($User && Hash::check($request->password,$User->user_password)){
            $request->session()->put('loggedUser',$User->user_id);
            return redirect('/play');
        }else{
            $request->session()->flash('message','Sorry Wrong Username or Password');
            return back();
        }
    }
    public function userLogout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('guest.home');

    }
}
