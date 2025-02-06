<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ReservationTime implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $startTime = Carbon::createFromTime(11, 0, 0);
        $endTime = Carbon::createFromTime(21, 0, 0);

        try {
            $reservationTime = Carbon::parse($value);
        } catch (\Exception $e) {
            $fail("The :attribute is not a valid time.");
            return;
        }

        if ($reservationTime->lt($startTime) || $reservationTime->gt($endTime)) {
            $fail("The :attribute must be between 11:00 and 21:00.");
        }
    }
}
