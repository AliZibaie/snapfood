<?php

namespace App\Services\API;

use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;

class payment
{
    use HasFail;
    public static function store($cart)
    {
        if (in_array($cart->toArray(), Auth::user()->carts->toArray())){
            Auth::user()->payments()->create([ 'amount'=>self::getTotalPrice($cart)]);
            $cart->foods()->detach();
            $cart->delete();
            return response()->json([
                'status'=>true,
                'message'=>'you paid your cart my bro thank you! now check your email to track your order.',
            ]);
        }
        return response()->json([
            'status'=>false,
            'message'=>'this is not your cart my bro!',
        ], 403);
    }

    public static function getTotalPrice($cart)
    {
        $totalPrice = 0;
        foreach ($cart->foods as $food) {
            $totalPrice += $food->price * $cart->count;
        }
        return $totalPrice;
    }
}
