<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return view('panels.admin.orders.index', compact('restaurants'));
    }
}
