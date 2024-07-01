<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class APiController
{
    function profile()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return response()->json([
            'status' => 200,
            "data" => $user,
            "message" => "Done"
        ]);
    }


    function login()
    {
        $user = User::where('email', request('email'))->first();
        if (Hash::check(request('password'), $user->password)) {
            $token = $user->createToken('mobile-app')->plainTextToken;
            return response()->json([
                "email" =>  request('email'),
                "password" =>  request('password'),
                "message" =>  "Login success",
                'token' => $token,
                "status" => 200,
            ]);
        } else {
            return response()->json([
                "email" =>  request('email'),
                "password" =>  request('password'),
                "message" =>  "Invalid credentials",
                "status" => 250,
            ]);
        }
    }



    function logout()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->tokens()->delete();
        return response()->json([
            "message" =>  "Logout Succesfully",
            "status" => 250,
        ]);
    }
}
