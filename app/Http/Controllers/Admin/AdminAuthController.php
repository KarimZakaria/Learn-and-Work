<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('Admin.Auth.login') ;
    }
    public function confirm(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:30' ,
            'password' => 'required|string'
        ]);
        if(!auth()->guard('admin')->attempt(['email' => $data['email'] , 'password' => $data['password']]))
        {
            session()->flash('error' , 'Your Data Doesnot Access Our ADMINS , You Are Not Allowed To go Dashboard') ;
            return back();
        }
        else
        {
            return redirect(route('AdminDashboard'));
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('Admin.Login'));
    }
}

