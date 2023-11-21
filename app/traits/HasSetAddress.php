<?php

namespace App\traits;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

trait HasSetAddress
{
    public function setAddress()
    {
        try {
            $this->setModelType();
            $this->model_type->addresses()->update(['is_default'=>0]);
            $address = Address::query()->find( request()->id);
            $address->update(['is_default'=>1]);
//            dd($address);
            return redirect("panel/addresses")->with('success', 'address set successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to set address!');
        }
    }
}
