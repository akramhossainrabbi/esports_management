<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\AppUserBalance;
use App\TotalEarn;
use App\TotalKill;
use App\Suport;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        
        $balance = AppUserBalance::where('balance_user_id',$User->user_id)->first();
        $kills = TotalKill::where('user_id_of_kill',$User->user_id)->first();
        $earns = TotalEarn::where('player_id',$User->user_id)->first();
        return view('User.profile')
            ->with('users',$User)
            ->with('kills',$kills)
            ->with('earns',$earns)
            ->with('balance',$balance);
    }
    public function suportSend(Request $request)
    {
        if ($request->ajax()) {
            $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
            $contact = new Suport();

            $contact->suport_user_id=$User->user_id;
            $contact->suport_subject=$request->contact_subject;
            $contact->suport_messege=$request->contact_messege;
            $contact->save();
            return response()->json(['success'=>'Your message has been sent. Thank you!']);
        }

    }
}
