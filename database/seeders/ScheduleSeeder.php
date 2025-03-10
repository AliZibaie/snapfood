<?php

namespace Database\Seeders;

use App\enums\Day;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Day::getValues() as $day) {
         Schedule::query()->create([
             'day'=>$day,
             'restaurant_id'=>1,
             'open_time'=>Carbon::createFromTime(6, 00, 00),
             'close_time'=>Carbon::createFromTime(12, 00, 00),
         ]);
        }
    }
}
