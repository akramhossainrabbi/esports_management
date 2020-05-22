<?php

namespace App\Http\Controllers;

use App\AdminInbox;
use App\AppUser;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function notificationView(Request $request){
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        $notification = AdminInbox::orderBy('date', 'desc')->get();
        return view('Admin.notification')
            ->with('user',$User)
            ->with('notification',$notification);
    }

    public function fullNotification(Request $request,$id)
    {
        $notification = AdminInbox::where('admin_inbox_id',$id)->first();
        $user = AppUser::where('user_id', $notification->user_id)->first();
        return view('Admin.view-notification')
            ->with('user', $user)
            ->with('notification', $notification);
    }

    public function updateStatus(Request $request, $uid)
    {
        $updateStatus = AdminInbox::find($uid);
        $status = 0;
        $updateStatus->status=$status;
        $updateStatus->save();
        return redirect()->route('admin.notificationView');
    }
    public function notificationCount(Request $request)
    {
        $notification = AdminInbox::where('status', 1)->sum('status');
        $notification_data="";
        if ($notification==null) {
            $notification_data="";
        }else{
            $notification_data=$notification;
        }
        return response()->json(['success'=>$notification_data]);
    }
}
