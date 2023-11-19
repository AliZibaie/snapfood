<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Address\StoreAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('panels.seller.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('panels.seller.addresses.create');
    }
    public function edit()
    {
        return view('panels.seller.addresses.edit');
    }

    public function destroy()
    {

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

    public function update()
    {

    }
}
