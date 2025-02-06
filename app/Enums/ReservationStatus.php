<?php

namespace App\Enums;

enum ReservationStatus: string
{

    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'btn-primary',
            self::CONFIRMED => 'btn-warning',
            self::CANCELED => 'btn-danger',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'В ожидании',
            self::CONFIRMED => 'Забронирован',
            self::CANCELED => 'Отменен',
        };

    }
}
