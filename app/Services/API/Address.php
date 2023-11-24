<?php

namespace App\Services\API;

use App\Http\Resources\Address\AddressCollection;
use App\Http\Resources\Address\AddressResource;
use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;
use App\Models\Address  as Model;

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

    public static function index()
    {
        return new AddressCollection(Auth::user()->addresses);
    }

    public  static  function show($address)
    {
        if (in_array($address->toArray(), Auth::user()->addresses->toArray())){
            return new AddressResource($address);
        }
        return response()->json([
            'status'=>false,
            'message'=>'this is not your address my bro!',
        ], 403);
    }

    public static function update($request, $address)
    {
        $exists = Auth::user()->addresses()->where('addressable_id', $address->addressable_id)->first();
        if (!$exists){
            return response()->json([
                'status'=>false,
                'message'=>'this is not your address my bro!',
            ], 403);
        }
        $address->update($request->validated());
        if (Auth::user()->tokens()->first()){
            return response()->json([
                'status'=>true,
                'message'=>'this address updated successfully!',
            ], 200);
        }
    }

}
