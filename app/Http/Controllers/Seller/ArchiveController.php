<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $orders = Order::query()->where('status', '=', 'delivered')->get();
        return view('panels.seller.orders.archives.index', compact('orders'));
    }
}
