<?php

namespace App\Services;

use App\enums\Day;
use App\Models\Schedule as Model;
use Illuminate\Support\Facades\Auth;

class Schedule
{
    public static function getUnselectedDays() : array
    {
        $selectedDays = Auth::user()->restaurant->schedules->pluck('day')->toArray();
        $unselectedDays = [];
        foreach (Day::getValues() as $day) {
            if (!in_array($day, $selectedDays)){
                $unselectedDays[] = $day;
            }
        }
        return $unselectedDays;
    }

    public static function store($request)
    {
        if (count(Auth::user()->restaurant->schedules) == 7){
            return redirect("panel/schedules")->with('fail', 'you cant create more than 7 schedules!');
        }
        foreach (Auth::user()->restaurant->schedules as $schedule) {
            if (count(Auth::user()->restaurant->schedules->pluck($schedule->day))  >1){
                return redirect("panel/schedules")->with('fail', 'you cant create more than 1 day of the week!');
            }
        }
        foreach ($request->validated('day') as $day){
            $newInfo = ['open_time'=>$request->validated('open_time'), 'close_time'=>$request->validated('close_time'), 'day'=>$day];
            Auth::user()->restaurant->schedules()->create($newInfo);
        }
    }


}
