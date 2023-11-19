<?php

namespace App\traits;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

trait HasSetAddress
{
    public function setAddress()
    {
        try {
            $address =
            Auth::user()->restaurant->addresses()->update(['is_default'=>0]);
            Address::query()->where('id', request('id'))->update(['is_default'=>1]);
            return redirect("panel/addresses")->with('success', 'address set successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to set address!');
        }
    }
}
