<?php

namespace App\Services\API\Resources;

use App\Http\Resources\Cart\CartResource;

class Cart
{
    public static function index(CartResource $resource) : array
    {
        $restaurant = $resource->food->first()->restaurant;
        $discount = self::getPriceWithDiscount($resource->food);
        $totalPrice = self::getTotalPrice($resource);
        $carts = [
            'id'=>$resource->id,
            'restaurant'=>[
                'title'=>$restaurant->name,
                'image'=>asset($restaurant->image->url),
            ],
            'foods'=>[
                'id'=>$resource->food->id,
                'title'=>$resource->food->title,
                'count'=>$resource->count,
                'food_price'=>$resource->food->price,
                'discount'=>$discount,
                'total_price'=>$totalPrice,
                'image'=>asset($resource->food->image->url),
            ],
        ];
        return $carts;
    }

    public static function getPriceWithDiscount($food): array|null
    {
        if ($food->discount && $food->discount->label){
            $result = ((int) $food->price * (100 - (int) $food->discount->label))/100 .'$';
            return [
                'off'=>$food->discount->label,
                'price_with_discount'=>$result,
            ];
        }
        return null;
    }

    public static function getTotalPrice($resource)
    {
       if ($price = self::getPriceWithDiscount($resource->food)){
           return ((int) $price['price_with_discount'] * $resource->count + $resource->food->restaurant->shipping_cost).'$';
       }
        return ((int) $resource->food->price * $resource->count + $resource->food->restaurant->shipping_cost.'$');
    }
}
