<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment
{
    public static function index()
    {
            return DB::table('comments')
                ->join('orders', 'comments.order_id', '=', 'orders.id')
                ->join('food', 'orders.food_id', '=', 'food.id')
                ->select('comments.*')
                ->where('comments.seller_wants_delete', 1)
                ->get()
                ->sortDesc();


    }
}
