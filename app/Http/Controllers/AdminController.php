<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function show()
    {
        //get user data
        $user = auth()->user();
        return view('adminMenuPage') -> with('user', $user);
    }
}
