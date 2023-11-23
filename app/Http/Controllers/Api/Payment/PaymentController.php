<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Services\API\payment as Service;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Cart $cart)
    {
        try {
            return Service::store($cart);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }
}
