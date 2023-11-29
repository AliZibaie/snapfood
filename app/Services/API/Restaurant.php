<?php

namespace App\Services\API;

use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Models\Restaurant as Model;
use Illuminate\Support\Facades\Auth;

class Restaurant
{
    public static function index()
    {
        $filteredRestaurants = self::filter();
        return new RestaurantCollection($filteredRestaurants);
    }

    public static function filter()
    {
        $query = Model::query();
        $query
            ->when(request('type'), function ($q, $type) {
                return $q->whereHas('restaurantCategories', function ($categoryQuery) use ($type) {
                    $categoryQuery->where('type', $type);
                });
            })
            ->when(request('score'), function ($request) use ($query) {
                dd(request('score') , self::getAverageScore($query));
                return $request <= self::getAverageScore();
            })
            ->get();
        return $query;
    }

    public static function getAverageScore($query): float|int
    {
        dd($query->first());
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
