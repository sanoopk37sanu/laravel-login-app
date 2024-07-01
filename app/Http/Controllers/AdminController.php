<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login()
    {

        return view('admin_login');
    }

    function dashbord()
    {

        return view('admin_dashbord');
    }

    function logout()
    {

        auth()->guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    function do_login()
    {
        $input = ["email" => request('email'), "password" => request('password')];
        if (auth()->guard('admin')->attempt($input, true)) {
            return redirect()->route('admin_dashbord');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
