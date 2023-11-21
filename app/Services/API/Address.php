<?php

namespace App\Services\API;

use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;

class Address
{
    use HasFail;
    public static function store($request)
    {
        $address = Auth::user()->addresses()->create($request->input());
        return response()->json([
            'status'=>true,
            'address'=>$address,
            'message'=>'your address added successfully!',
        ]);
    }

}
