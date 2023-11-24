<?php

namespace App\Services\API;

use App\Http\Resources\Address\AddressCollection;
use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Models\RestaurantCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\restaurant as Model;

class Restaurant
{
    public static function index()
    {
        return new RestaurantCollection(self::filter());
    }
    public static function filter()
    {
        $isOpen = request('is_open');
        $type = request('type');
        $scoreGreaterThan = request('score');
        $query = Model::query();

        if (isset($isOpen)) {
            $query->where('status', $isOpen);
        }

        if ($type) {
            $query->whereHas('restaurantCategories', function ($categoryQuery) use ($type) {
                $categoryQuery->where('type', $type);
            });
        }

//        if ($scoreGreaterThan) {
//            $query->where('score', '>', $scoreGreaterThan);
//        }

        return $query->get();
    }

}
