<?php

namespace App\traits;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

trait HasSetAddress
{
    public function setAddress(Address $address)
    {
        try {
            $this->setModelType();
            $this->model_type->addresses()->update(['is_default'=>0]);
            $exists = $this->model_type->addresses()->where('addressable_id', $address->addressable_id)->first();
            if (!$exists){
                return response()->json([
                    'status'=>false,
                    'message'=>'this is not your address my bro!',
                ], 403);
            }
            $address->update(['is_default'=>1]);
            if (Auth::user()->tokens()->first()){
                return response()->json([
                    'status'=>true,
                    'message'=>'this address has set current address successfully!',
                ], 200);
            }

            return redirect("panel/addresses")->with('success', 'address set successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to set address!');
        }
    }
}
