<?php

namespace App\Services\API\Resources;

use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\RestaurantCategory;

class Restaurant
{
    public static function getDefaultAddress(RestaurantResource $resource) : array
    {
        return $resource->addresses()->where('is_default', 1)->select('title', 'address', 'longitude', 'latitude')->get()->toArray();
    }

    public static function getUnavailableAddresses(RestaurantResource $resource) : array
    {
        return $resource->addresses()->where('is_default', 0)->select('title', 'address', 'longitude', 'latitude')->get()->toArray();
    }

    public static function getCatgegories(RestaurantResource $resource) : array
    {
        return $resource->restaurantCategories->pluck('type')->toArray();
    }

    public static function getFoods(RestaurantResource $resource) : array
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
    }

    public static function getSchedules(RestaurantResource $resource) : array
    {
        return $resource->schedules()->select('day', 'open_time', 'close_time')->get()->toArray();
    }

    public static function isOpen(RestaurantResource $resource)
    {
        return 'bolbol';
    }
}
