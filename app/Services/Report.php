<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as Model;

class Report
{
    public static function index()
    {
        $ordersQuery = Model::query()
            ->when(request()->has('hour'), function ($query){
                return $query->whereBetween('created_at', [now()->subHour(), now()]);
            })
            ->when(request()->has('day'), function ($query){
                return $query->whereBetween('created_at', [now()->subDay(), now()]);
            })
            ->when(request()->has('week'), function ($query){
                return $query->whereBetween('created_at', [now()->subWeek(), now()]);
            })
            ->when(request()->has('month'), function ($query){
                return $query->whereBetween('created_at', [now()->subMonth(), now()]);
            })
            ->where('status', 'delivered')
            ->get();
        return $ordersQuery;
    }

}
