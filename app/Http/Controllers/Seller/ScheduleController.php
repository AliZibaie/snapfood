<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Schedule\StoreScheduleRequest;
use App\Models\Schedule;
use App\Services\Schedule as Service;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Auth::user()->restaurant->schedules;
        return view('panels.seller.schedules.index', compact('schedules'));
    }


    public function edit()
    {
        return view('panels.seller.schedules.edit');
    }

    public function update()
    {

    }

    public function create()
    {
        $days = Service::getUnselectedDays();
        return view('panels.seller.schedules.create', compact('days'));
    }

    public function store(StoreScheduleRequest $request)
    {
        try {
            Service::store($request);
            return redirect("panel/schedules")->with('success', 'schedule created successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/schedules", 500)->with('fail', 'failed to create schedule!');
        }
    }

    public function destroy(Schedule $schedule)
    {
        try {
            $schedule->delete();
            return redirect("panel/schedules")->with('success', 'schedule deleted successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/schedules", 500)->with('fail', 'failed to delete schedule!');
        }
    }
}
