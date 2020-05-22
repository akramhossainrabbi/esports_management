<?php

namespace App\Http\Controllers;

use App\AppAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddAdminController extends Controller
{
    public function viewAddAdmin(Request $request)
    {
        return view('Admin.add-admin');
    }
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'admin_name'=>'required',
            'admin_username'=>'required|regex:/^[A-Z.a-z0-9_-]{3,20}$/',
            'admin_email'=>'required',
            'admin_password'=>'required',
            'confirm_password'=>'required|same:admin_password',
        ]);
        $Admin = new AppAdmin();

        $Admin->admin_name=$request->admin_name;
        $Admin->admin_username=$request->admin_username;
        $Admin->admin_email=$request->admin_email;
        $Admin->admin_password=Hash::make($request->admin_password);
        $Admin->save();
        $request->session()->flash('message1','Data Inserted Successfully');
        return redirect('/esport.admin.login.panel/add-admin');
    }
}
