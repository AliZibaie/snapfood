<?php

namespace App\Services\API\Resources;

use App\Http\Resources\Cart\CartResource;

class Cart
{
    public static function index(CartResource $resource) : array
    {
        $restaurant = $resource->foods->first()->restaurant;
        $carts = [
            'id'=>$resource->id,
            'restaurant'=>[
                'title'=>$restaurant->name,
                'image'=>asset($restaurant->image->url),
            ],
            'foods'=>[],
        ];
        foreach ($resource->foods as $food) {
            $carts['foods'] = [
                    'id'=>$food->id,
                    'title'=>$food->name,
                    'count'=>$resource->count,
                    'price'=>$food->price,
            ];
        }
        return $carts;
    }
}
