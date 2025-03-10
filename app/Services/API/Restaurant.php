<?php

namespace App\Services\API;

use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Models\Restaurant as Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

class Restaurant
{
    public static function index()
    {
        $filteredRestaurants = self::filter();
        return new RestaurantCollection($filteredRestaurants);
    }

    public static function filter()
    {
//        $isOpen = request('is_open');
//        $score = request('score_gt');
//        $type = request('type');
//        if ($type){
//            $restaurants =  Model::query()
//        }
        return self::sortByNearest(Model::all());
    }

    public static function getDistance($restaurant)
    {
        if (!Auth::user()->addresses->first()){
            return response()->json([
                'status' => false,
                'message' => 'you dont have any addresses to search the restaurant near you!',
            ], 401);
        }
        $userLatitude = Auth::user()->addresses()->where('is_default', 1)->first()->latitude;
        $userLongitude = Auth::user()->addresses()->where('is_default', 1)->first()->longitude;
        $restaurantLatitude = $restaurant->addresses()->where('is_default', 1)->first()->latitude;
        $restaurantLongitude = $restaurant->addresses()->where('is_default', 1)->first()->longitude;
        $distance = sqrt(pow(($userLatitude-$restaurantLatitude), 2) + pow(($userLongitude-$restaurantLongitude), 2));
        return  $distance;
    }

    public static function sortByNearest($restaurants)
    {
        $distances = [];
        foreach ($restaurants as $restaurant) {
            $distances[$restaurant->id] = self::getDistance($restaurant);
        }
        krsort($distances);
        $restaurants = [];
        foreach ($distances as $key => $distance) {
            $restaurants[] = Model::query()->find($key);
        }
        return $restaurants;
    }
    public static function getAverageScore($query): float|int
    {
        $scores = $query->comments->pluck('score');
        return $scores->isNotEmpty() ? $scores->avg() : 0;
    }

    public static function isOpen()
    {
        $filteredRestaurants = self::filter();
        $todaySchedule = $filteredRestaurants->first()->schedules->where('day', strtolower(now()->dayName))->first();
        return $todaySchedule->open_time  <= now()->toTimeString() && now()->toTimeString()<= $todaySchedule->close_time;
    }
}
