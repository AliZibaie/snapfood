<?php

namespace App\Services\API;

use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as Model;

class Cart
{
    use HasFail;

    public static function store($request)
    {
        $cart = Model::query()->create( [
            'count'=>$request->count ?? 1,
            'user_id'=>Auth::id(),
        ]);
        $cart->foods()->attach($request->food_id);
        $food = \App\Models\Food::query()->find($request->food_id);
        return response()->json([
            'status'=>true,
            'cart'=>[
                'cart_id'=>$cart->id,
                'food'=>$food->name,
                'count'=>$cart->count,
            ],
            'message'=>'your cart added successfully!',
        ]);
    }
}
