<?php

namespace App\Services\API;

use App\enums\OrderStatus;
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
            $emailInfo = [
                'total_price'=>self::getTotalPrice($cart),
                'from'=>Auth::user()->addresses()->where('is_default', 1)->first()->address,
                'to'=>$cart->food->restaurant->addresses()->where('is_default', 1)->first()->address ?? '',
                'food'=>$cart->food->name,
                'count'=>$cart->count,
                'status'=>OrderStatus::PENDING,
            ];
            $order = Auth::user()->orders()->create([
                'total_price'=>self::getTotalPrice($cart),
                'food_id'=>$cart->food->id,
                'count'=>$cart->count,
                'food'=>$cart->food->name,
            ]);
            Mail::to(Auth::user()->email)->send(new OrderStatusMail($emailInfo));
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
        $food = $cart->food;
        if ($food->discount && $food->discount->label){
            $priceWithDiscount = ((int) $food->price * (100 - (int) $food->discount->label))/100 .'$';
            return ((int) $priceWithDiscount * $cart->count + $cart->food->restaurant->shipping_cost).'$';
        }
        return ((int) $cart->food->price * $cart->count + $cart->food->restaurant->shipping_cost.'$');
    }
}
