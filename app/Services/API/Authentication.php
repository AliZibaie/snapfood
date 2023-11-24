<?php

namespace App\Services\API;

use App\Models\User;
use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    use HasFail;
    public static function login($request)
    {
        if (Auth::attempt($request->input())){
            $token = Auth::user()->createToken('Personal Access Token')->plainTextToken;
            return response()->json([
                'status' => true,
                'user'=>Auth::user(),
                'token'=>$token,
                'message'=>'you logged in successfully!'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'your password is invalid',
        ], 401);
    }

    public static function register($request)
    {
        $user = User::create($request->input());
        Auth::login($user);
        $token = Auth::user()->createToken('Personal Access Token')->plainTextToken;
        return response()->json([
            'status' => true,
            'user'=>Auth::user(),
            'token'=>$token,
            'message'=>'you are registered successfully!'
        ]);
    }

    public static function logout()
    {
        if (Auth::check()){
            Auth::user()->tokens()->delete();
            return response()->json([
                'status' => true,
                'message' => 'you logged out successfully!',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'you are not logged in so you cant logout!',
        ], 401);
    }
}
