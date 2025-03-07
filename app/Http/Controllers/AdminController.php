<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    // View users
    public function viewUsers()
    {

        $users = User::with('roles')->get();

        return view('Admin.view-users', compact('users'));
    }
}

