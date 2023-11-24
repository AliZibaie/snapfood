<?php

namespace App\Services\API;

use App\Http\Resources\Cart\CartResource;
use App\traits\HasFail;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as Model;

class Cart
{
    use HasFail;

    public static function store($request)
    {
        if (!Auth::user()->addresses->first()){
            return response()->json([
                'status'=>false,
                'message'=>'you cant add a cart without any address!',
            ], 403);
        }
        if (!Auth::user()->addresses()->where('is_default', 1)->first()){
            return response()->json([
                'status'=>false,
                'message'=>'you cant add a cart without any current address!',
            ], 403);
        }
        if (Auth::user()->carts->first()){
            return response()->json([
                'status'=>false,
                'message'=>'you cant have more than one cart!',
            ], 403);
        }
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
    public static function update($request, $cart)
    {
        if (in_array($cart->toArray(), Auth::user()->carts->toArray())){
            $cart->query()->update([
                'count'=>$request->count ?? $cart->count,
            ]);
            $cart->foods()->detach();
            $cart->foods()->attach($request->food_id);
            return response()->json([
                'status'=>true,
                'message'=>'your cart updated successfully!',
            ]);
        }
        return response()->json([
            'status'=>false,
            'message'=>'this is not your cart my bro!',
        ], 403);

    }

    public static function show($cart)
    {
        if (in_array($cart->toArray(), Auth::user()->carts->toArray())){
            return new CartResource($cart);
        }
        return response()->json([
            'status'=>false,
            'message'=>'this is not your cart my bro!',
        ], 403);
    }
}
