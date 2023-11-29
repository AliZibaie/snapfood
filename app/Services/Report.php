<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as Model;

class Report
{
    public static function index()
    {
        $filterBy = [
            'hour' => self::getLastHour(),
            'day' => self::getLastDay(),
            'week' => self::getLastWeek(),
            'month' => self::getLastMonth(),
        ];

        if (request('time')) {
            if (!in_array(request('time'), array_keys($filterBy))){
                return Auth::user()->restaurant->orders;

            }
            return $filterBy[request('time')]->get();
        }

        return Auth::user()->restaurant->orders;
    }

    public static function getLastHour()
    {
        return Model::query()->whereBetween('created_at', [now()->subHour(), now()]);
    }

    public static function getLastDay()
    {
        return Model::query()->whereBetween('created_at', [now()->subDay(), now()]);
    }

    public static function getLastWeek()
    {
        return Model::query()->whereBetween('created_at', [now()->subWeek(), now()]);
    }

    public static function getLastMonth()
    {
        return Model::query()->whereBetween('created_at', [now()->subMonth(), now()]);
    }
}
