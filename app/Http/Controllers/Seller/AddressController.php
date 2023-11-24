<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Address\StoreAddressRequest;
use App\Http\Requests\Seller\Address\UpdateAddressRequest;
use App\Models\Address;
use App\traits\HasSetAddress;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    use HasSetAddress;
    private  $model_type ;


    public function setModelType(): void
    {
        $this->model_type = Auth::user()->restaurant;
    }


    public function index()
    {
        $addresses = Auth::user()->restaurant->addresses;
        return view('panels.seller.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('panels.seller.addresses.create');
    }
    public function edit(Address $address)
    {
        return view('panels.seller.addresses.edit', compact('address'));
    }

    public function destroy(Address $address)
    {
        try {
            $address->delete();
            return redirect("panel/addresses")->with('success', 'address deleted successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to delete address!');
        }
    }

    public function store(StoreAddressRequest $request)
    {
        try {
            Auth::user()->restaurant->addresses()->create($request->validated());
            return redirect("panel/addresses")->with('success', 'address created successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to create address!');
        }
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        try {
            $address->update($request->validated());
            return redirect("panel/addresses")->with('success', 'address updated successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/addresses", 500)->with('fail', 'failed to update address!');
        }
    }

}
