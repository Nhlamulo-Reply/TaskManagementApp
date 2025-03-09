<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user= (Auth::Check());

            $usertype = $user->usertype;

            if($usertype == 'user')
            {
                return view('dashboard');
            }
            else if ($usertype == 'admin')
            {
                return view('Admin.adminhome');
            }

            {
                return redirect('/login')->with('fail','You are not authorized to view this page');
            }

    }
}
