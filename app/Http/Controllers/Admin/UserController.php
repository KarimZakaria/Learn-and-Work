<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User ;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::select('id' , 'name')->get();

        return view('Admin.User.index')->with($data) ;
    }

    public function destroy($id)
    {
        User::findOrFail($id)->forceDelete() ;
        session()->flash('success' , 'User Deleted Successfully');
        return back() ;
    }

}
