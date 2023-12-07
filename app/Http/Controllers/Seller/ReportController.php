<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Report as Service;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Service::index();
        return view('panels.seller.reports.index', compact('orders'));
    }

    public function download()
    {
        try {
            Service::download();
            return redirect("panel/reports/")->with('success', 'order reports downloaded successfully!');
        }catch (\Throwable $exception){
            dd($exception->getMessage());
            return redirect("panel/reports/", 500)->with('fail', 'failed to download reports !');
        }
    }
}
