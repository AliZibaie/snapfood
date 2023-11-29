<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->restaurant->orders;
        return view('panels.seller.reports.index', compact('orders'));
    }
}
