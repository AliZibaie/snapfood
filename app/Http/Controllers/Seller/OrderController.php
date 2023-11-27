<?php

namespace App\Http\Controllers\Seller;

use App\enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Order\UpdateOrderRequest;
use App\Models\Order;
use App\Services\Order as Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Service::getModifiedOrders();
        return view('panels.seller.orders.index', compact('orders'));
    }

    public function update(UpdateOrderRequest $request, Order $order )
    {
        try {
            $order->update(['status'=>$request->status]);
            return redirect("panel/orders/")->with('success', 'order status updated successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/orders/", 500)->with('fail', 'failed to update order status!');
        }
    }

}
