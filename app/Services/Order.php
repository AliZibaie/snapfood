<?php

namespace App\Services;

use App\enums\OrderStatus;
use App\Models\Order as Model;
use Illuminate\Support\Facades\Auth;

class Order
{
    public static function getModifiedOrders() : array
    {
        $orders = Auth::user()->restaurant->orders;
        $newArrangedOrders = [];
        foreach ($orders as $order) {
            $address = $order->user->addresses->where('is_default', true)->first()->address;
            $id = $order->id;
            if($order->status == 'pending'){
                $newArrangedOrders[] = [
                    'status'=>['preparing', 'sent', 'delivered'],
                    'address'=>$address,
                    'id'=>$id,
                ];
                continue;
            }
            if($order->status == 'preparing'){
                $newArrangedOrders[] = [
                    'status'=>['sent', 'delivered'],
                    'address'=>$address,
                    'id'=>$id,
                ];
                continue;
            }
            if($order->status == 'sent'){
                $newArrangedOrders[] = [
                    'status'=>['delivered'],
                    'address'=>$address,
                    'id'=>$id,
                ];
            }
        }
        return $newArrangedOrders;
    }
}
