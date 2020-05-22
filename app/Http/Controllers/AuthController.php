<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\UserPassReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function showPasswordReminder()
    {
        return view('password.email');
    }


    public function postPasswordReminder(Request $request)
    {

        $user = AppUser::where('user_email', $request->email)->first();

        if(!$user){
            $request->session()->flash('message','There is no account associated with this email');
            return back();
        }

        $hash = Str::random(30);



        $link_exist = UserPassReset::where('userId',$user->user_id)->first();
        if (!$link_exist){
            $reset = new UserPassReset();
            $reset->userid = $user->user_id;
            $reset->email = $user->user_email;
            $reset->passwordtoken = $hash;

            if ($reset->save()){
                $name= "$user->user_first_name $user->user_last_name";
                $to_mail = $reset->email;
                $current_url = URL::current();
                $url = "$current_url/$reset->passwordtoken";
                $data=array("name"=>$name,"url"=>$url);
                Mail::send('password.mail',$data,function ($message) use ($name,$to_mail,$url){
                    $message->to($to_mail)
                        ->subject('Password Reset Email');
                });

                $request->session()->flash('message1','Your password reset link has been sent to your email. Please check your email.');

            }
        }else{
            $request->session()->flash('message','Your password reset link already been sent to your email before. Please check your email.');

        }

        return back();

    }



    public function confirmPasswordToken($id)
    {
        $reset = UserPassReset::where('passwordtoken',$id)->first();

        if($reset === null ){
            return view('password.error');
        } else {

            return view('password.reset')
                ->with('code', $id);

        }


    }

    public function resetPasswordUpdate(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
        ]);

        $token_id = UserPassReset::where('passwordtoken',$request->code)->first();

        $update_password = AppUser::find($token_id->userId);

        if ($update_password->user_email==$request->email){
            $update_password->user_password=Hash::make($request->password);
            $update_password->save();
            UserPassReset::where('passwordtoken',$request->code)->delete();
            return redirect('/login');
        }else{
            $request->session()->flash('message','This email does not exist!');
            return back();
        }
    }
}
