<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function show()
    {
        //get user data
        $user = auth()->user();
        return view('admin.adminMenuPage') -> with('user', $user);
    }
    public function userList()
    {
        return view('admin.userlist');

    }
}
