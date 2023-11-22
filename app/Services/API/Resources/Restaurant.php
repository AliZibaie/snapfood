<?php

namespace App\Services\API\Resources;

use App\Http\Resources\Restaurant\RestaurantResource;

class Restaurant
{
    public static function getDefaultAddress(RestaurantResource $resource)
    {
        return $resource->addresses()->where('is_default', 1)->select('title', 'address', 'longitude', 'latitude')->get()->toArray();
    }

    public static function getUnavailableAddresses(RestaurantResource $resource)
    {
        return $resource->addresses()->where('is_default', 0)->select('title', 'address', 'longitude', 'latitude')->get()->toArray();
    }

    public static function getCatgegories(RestaurantResource $resource)
    {
        return $resource->restaurantCategories->pluck('type')->toArray();
    }

    public static function getFoods(RestaurantResource $resource)
    {
        $foods = [];
        foreach ($resource->foods as $food) {
            $foods[] = [
                'name'=>$food->name,
                'raw_materials'=>$food->raw_materials,
                'price'=>$food->price,
                'categories'=>$food->foodCategories->pluck('type'),
            ];
        }
        return $foods;
//        return $resource->foods->select('foodCategories');
    }
}
