<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Address\StoreAddressRequest;
use App\Http\Requests\Api\Address\UpdateAddressRequest;
use App\Http\Resources\Address\AddressCollection;
use App\Http\Resources\Address\AddressResource;
use App\traits\HasSetAddress;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Services\API\Address as Service;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;use function Symfony\Component\String\u;

class AddressController extends Controller
{
    use HasSetAddress;
    public  $model_type ;
    public function setModelType(): void
    {
        $this->model_type = Auth::user();
    }


    public function index(Request $request)
    {
        return Service::index();
    }
    public function show(Address $address)
    {
        return Service::show($address);
    }
    public function store(StoreAddressRequest $request)
    {
        try {
            return Service::store($request);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        try {
            return Service::update($request, $address);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }
}
