<?php

namespace App\Http\Controllers;

use App\AppAdmin;
use App\AppUser;
use App\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function userList(Request $request)
    {
        $Admin= AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        $Users= AppUser::get();
        return view('Admin.user_list')
            ->with('Admin',$Admin)
            ->with('Users',$Users);
    }
}
