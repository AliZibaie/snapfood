<?php

namespace App\Services\API;

use App\Mail\OrderStatusMail;
use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class payment
{
    use HasFail;
    public static function store($cart)
    {
        if (in_array($cart->toArray(), Auth::user()->cart->toArray())){
            $order = Auth::user()->orders()->create([
                'amount'=>self::getTotalPrice($cart),
                'address'=>Auth::user()->addresses()->where('is_default', 1)->first()->address,
                'food'=>$cart->foods->pluck('name'),
//                'restaurant'=>$cart->foods->pluck('name'),
            ]);

            $cart->delete();
            Mail::to(Auth::user()->email);
            new OrderStatusMail();
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
