<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment
{
    public static function index()
    {
        return DB::table('comments')
            ->join('orders', 'comments.order_id', '=', 'orders.id')
            ->join('food', 'orders.food_id', '=', 'food.id')
            ->where('food.restaurant_id', '=', Auth::user()->restaurant->id)
            ->select('comments.*')
            ->where('comments.is_accepted', 0)
            ->where('comments.seller_wants_delete', 0)
            ->whereNull('comments.comment_id')
            ->get()
            ->sortDesc();
    }

    public static function indexAccepteds()
    {
        return DB::table('comments')
            ->join('orders', 'comments.order_id', '=', 'orders.id')
            ->join('food', 'orders.food_id', '=', 'food.id')
            ->where('food.restaurant_id', '=', Auth::user()->restaurant->id)
            ->select('comments.*')
            ->where('comments.is_accepted', 1)
            ->whereNull('comments.comment_id')
            ->get()
            ->sortDesc();
    }
}
