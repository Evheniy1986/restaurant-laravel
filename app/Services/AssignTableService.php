<?php

namespace App\Services;

use App\Enums\ReservationStatus;
use App\Models\Table;
use Carbon\Carbon;

class AssignTableService
{
    public function findAvailableTable($guest,  $date,  $time)
    {
        $reservationDuration = 4;
        $startTime = Carbon::parse($time)->format('H:i:s');
        $endTime = Carbon::parse($time)->addHours($reservationDuration)->format('H:i:s');

        return Table::query()
            ->where('guest_number', '>=', $guest)
            ->whereDoesntHave('reservations', function ($query) use ($date, $startTime, $endTime) {
                $query->where('status', '!=', ReservationStatus::CANCELED->value)
                    ->where('date', $date)
                    ->where(function ($q) use ($startTime, $endTime) {
                        $q->whereBetween('time', [$startTime, $endTime])
                            ->orWhereRaw('? BETWEEN time AND ADDTIME(time, "4:00:00")', [$startTime]);
                    });
            })
            ->orderBy('guest_number')
            ->first();
    }
}
