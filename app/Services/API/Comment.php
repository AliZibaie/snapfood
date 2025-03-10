<?php

namespace App\Services\API;

use App\Models\Comment as Model;
use App\traits\HasFail;

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

            $ordersQuery =  Model::query()
                ->join('orders', 'comments.order_id', '=', 'orders.id')
                ->join('food', 'orders.food_id', '=', 'food.id')
                ->join('restaurants', 'food.restaurant_id', '=', 'restaurants.id')
                ->when(request()->has('food_id'), function ($query) {
                    $foodId = request('food_id');
                    return $query->where('food.id', '=', $foodId);
                })
                ->when(request()->has('restaurant_id'), function ($query){
                    $restaurantId = request('restaurant_id');
                    return $query->where('restaurants.id', '=', $restaurantId);
                })
                ->where('comments.is_accepted', 1)
                ->get()
                ->sortDesc();
            return $ordersQuery;
    }
}
