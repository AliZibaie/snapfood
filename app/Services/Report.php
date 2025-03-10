<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as Model;
use Spatie\SimpleExcel\SimpleExcelWriter;

class Report
{
    public static function index()
    {
        $ordersQuery = Model::query()
            ->when(request()->has('hour'), function ($query){
                return $query->whereBetween('created_at', [now()->subHour(), now()]);
            })
            ->when(request()->has('day'), function ($query){
                return $query->whereBetween('created_at', [now()->subDay(), now()]);
            })
            ->when(request()->has('week'), function ($query){
                return $query->whereBetween('created_at', [now()->subWeek(), now()]);
            })
            ->when(request()->has('month'), function ($query){
                return $query->whereBetween('created_at', [now()->subMonth(), now()]);
            })
            ->where('status', 'delivered')
            ->get();
        return $ordersQuery;
    }

    public static function download()
    {
        $orders = self::index();
        $excelFile = SimpleExcelWriter::streamDownload('reports.xlsx');
//            ->addHeader(['ordered_by', 'income', 'ordered_at']);
        foreach ($orders as $order) {
            $excelFile->addRow([
                'ordered_by' => $order->user->name,
                'income' => $orders->price,
                'ordered_at' => $orders->created_at,
            ]);

            $excelFile->toBrowser();

        }
    }

}
