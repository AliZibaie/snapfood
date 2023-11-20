<?php

namespace App\Services\API;

use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;

class Profile
{
    use HasFail;
    public static function destroy()
    {
        if (Auth::check()){
            $user = Auth::user();
            Auth::user()->tokens()->delete();
            $user->delete();
            return response()->json([
                'status' => true,
                'message'=>'your information deleted successfully!'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'you are not logged in so you cant logout!',
        ], 401);
    }

    public static function update()
    {
        
    }
}
