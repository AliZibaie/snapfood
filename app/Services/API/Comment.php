<?php

namespace App\Services\API;

use App\Models\Comment as Model;
use App\traits\HasFail;
use Illuminate\Support\Facades\DB;

class Comment
{
    use HasFail;

    public static function store($request)
    {
        $newRecord = [
            'order_id'=>$request->order_id,
            'message'=>$request->message,
            'score'=>$request->score,
        ];
        $comment = Model::query()->create($newRecord);
        return response()->json([
            'status'=>true,
            'comment'=>[
                'message'=>$comment->message,
            ],
            'message'=>'your comment has been sent successfully',
        ]);
    }

    public static function index()
    {
        if ($foodId = request('food_id') && !request('restaurant_id')){
            return Model::query()
                ->join('orders', 'comments.order_id', '=', 'orders.id')
                ->join('food', 'orders.food_id', '=', 'food.id')
                ->select('comments.*')
                ->where('comments.is_accepted', 1)
                ->where('food.id', '=', $foodId)
                ->get()
                ->sortDesc();
        }
        if ($restaurantId = request('restaurant_id') && !request('food_id')){
            return Model::query()
                ->join('orders', 'comments.order_id', '=', 'orders.id')
                ->join('food', 'orders.food_id', '=', 'food.id')
                ->join('restaurants', 'food.restaurant_id', '=', 'restaurants.id')
                ->select('comments.*')
                ->where('comments.is_accepted', 1)
                ->where('restaurants.id', '=', $restaurantId)
                ->get()
                ->sortDesc();
        }
        if ($foodId = request('food_id') && $restaurantId = request('restaurant_id')){
            return Model::query()
                ->join('orders', 'comments.order_id', '=', 'orders.id')
                ->join('food', 'orders.food_id', '=', 'food.id')
                ->join('restaurants', 'food.restaurant_id', '=', 'restaurants.id')
                ->select('comments.*')
                ->where('comments.is_accepted', 1)
                ->where('restaurants.id', '=', $restaurantId)
                ->where('food.id', '=', $foodId)
                ->get()
                ->sortDesc();
        }
        return Model::query()
            ->where('is_accepted', 1)->get()->sortDesc();
    }
}
