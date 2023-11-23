<?php

namespace App\Http\Controllers\Seller;

use App\enums\OrderStatus;
use App\Http\Controllers\Controller;
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
}
