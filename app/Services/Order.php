<?php

namespace App\Services;

use App\enums\OrderStatus;
use App\Models\Order as Model;
class Order
{
    public static function getModifiedOrders() : array
    {
        $orders = Model::all();
        $newArrangedOrders = [];
        foreach ($orders as $order) {
            if($order->status == 'pending'){
                $newArrangedOrders[] = [
                    'status'=>['preparing', 'sent', 'delivered'],
                    'address'=>$order->address,
                    'id'=>$order->id,
                ];
                continue;
            }
            if($order->status == 'preparing'){
                $newArrangedOrders[] = [
                    'status'=>['sent', 'delivered'],
                    'address'=>$order->address,
                    'id'=>$order->id,
                ];
                continue;
            }
            if($order->status == 'sent'){
                $newArrangedOrders[] = [
                    'status'=>['delivered'],
                    'address'=>$order->address,
                    'id'=>$order->id,
                ];
            }
        }
        return $newArrangedOrders;
    }
}
