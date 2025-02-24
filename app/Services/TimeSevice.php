<?php

namespace App\Services;

use Carbon\Carbon;

class TimeSevice
{
    public function calculateMinute()
    {
        $startTime = Carbon::today()->hour(11)->minute(0);
        $endTime = Carbon::today()->hour(21)->minute(0);
        $justNow = Carbon::now();
        $now = Carbon::now()->addHour()->addMinutes(20);
        $minutes = ceil($now->minute / 15) * 15;

        if ($minutes == 60) {
            $now->addHour();
            $minutes = 0;
        }
        if ($now->lt($startTime) || $justNow->gt($endTime)) {
            return $startTime->addHour()->addMinutes(20)->format('H:i');
        }

        return $now->copy()->minute($minutes)->format('H:i');
    }

    public function generateTimeOptions($deliveryDate)
    {
        $now = Carbon::now();
        $startTime = Carbon::today()->hour(11)->minute(0);
        $endTime = Carbon::today()->hour(21)->minute(0);

        $timeSlots = [];
        if ($deliveryDate == $now->format('Y-m-d')) {

            if ($now->lt($startTime)) {
                $startTime = Carbon::today()->hour(12)->minute(20);
            } else {
                $now->addHour();

                $minutes = ceil($now->minute / 15) * 15;
                if ($minutes == 60) {
                    $now->addHour();
                    $minutes = 0;
                }

                $startTime = $now->copy()->minute($minutes);
            }


        } else {
            $startTime = Carbon::today()->hour(12)->minute(0);
        }

        while ($startTime <= $endTime) {
            $timeSlots[] = $startTime->format('H:i');
            $startTime->addMinutes(15);
        }

        return $timeSlots;
    }
}
