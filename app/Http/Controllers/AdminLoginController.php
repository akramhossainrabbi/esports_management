<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\AppAdmin;


class AdminLoginController extends Controller
{
    public function viewAdminLogin(Request $request)
    {
        $Admin = AppAdmin::where('admin_id',$request->session()->get('loggedAdmin'))->get();
        return view('Admin.admin-login')
            ->with('admins',$Admin);
    }

    public function logAdminVarify(Request $request)
    {
        $request->validate([
            'admin_username'=>'required',
            'password'=>'required',
        ]);

        $Admin = AppAdmin::where('admin_username', $request->admin_username)->first();
        if ($Admin && Hash::check($request->password, $Admin->admin_password)) {
            $request->session()->put('loggedAdmin', $Admin->admin_id);
            return redirect()->route('admin.home');
        } else {
            $request->session()->flash('message', 'Sorry Wrong Username or Password');
            return back();
        }
    }

    public function adminLogout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.login');

    }
}


