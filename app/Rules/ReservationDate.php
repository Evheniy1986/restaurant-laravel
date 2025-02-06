<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ReservationDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dateNow = Carbon::now()->startOfDay();
        $lastDate = Carbon::now()->addDays(7)->endOfDay();

        $reservationDate = Carbon::parse($value);

        if ($reservationDate->lt($dateNow) || $reservationDate->gt($lastDate)) {
            $fail("The :attribute must be between today and one week ahead.");
        }
    }
}
