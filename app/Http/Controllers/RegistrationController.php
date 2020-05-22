<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\AppUser;

class RegistrationController extends Controller
{
    public function registrationView(Request $request)
    {
        return view('User.registration');
    }

    public function storeUser(Request $request)
    {
      $request->validate([
          'image' => 'mimes:jpg,jpeg,png,tiff',
          'first_name'=>'required',
          'last_name'=>'required',
          'username'=>'required|regex:/^[A-Z.a-z0-9_-]{3,20}$/',
          'email'=>'required',
          'mobile'=>'required',
          'password'=>'required',
          'confirm_password'=>'required|same:password',
      ]);
      $User = new AppUser();

      if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user_image');
            $image->move($destinationPath, $name);
            $User->image = $name;
        }
      $User->user_first_name=$request->first_name;
      $User->user_last_name=$request->last_name;
      $User->user_username=$request->username;
      $User->user_email=$request->email;
      $User->mobile=$request->mobile;
      $User->user_password=Hash::make($request->password);
      $User->save();
      $request->session()->flash('message2','Registration successful. Login here.');
      return redirect('/login');
    }
    public function usernameCheck(Request $request)
    {
        $user=AppUser::where('user_username',$request->user_name)->first();
        if($user){
            echo "Unique";
        }else{
            echo "Not Unique";
        }
    }

    public function emailCheck(Request $request)
    {
        $user=AppUser::where('user_email',$request->email)->first();
        if($user){
            echo "Unique";
        }else{
            echo "Not Unique";
        }
    }
}
