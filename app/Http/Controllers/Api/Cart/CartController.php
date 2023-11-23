<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\StoreCartRequest;
use App\Http\Requests\Api\Cart\UpdateCartRequest;
use App\Http\Resources\Cart\CartCollection;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\API\Cart as Service;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return new CartCollection(Cart::all());
    }

    public function store(StoreCartRequest $request)
    {

        try {
            return Service::store($request);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        try {
            return Service::update($request, $cart);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }
}
