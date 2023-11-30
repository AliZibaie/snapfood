<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->restaurant->orders->where('status', '=', 'delivered');
        return view('panels.seller.orders.archives.index', compact('orders'));
    }
}
