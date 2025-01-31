<?php

namespace App\Enums;

enum TableStatus: string
{
    case AVAILABLE ='available';
    case RESERVED = 'reserved';
    case UNAVAILABLE = 'unavailable';

    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Доступен',
            self::RESERVED => 'Забронирован',
            self::UNAVAILABLE => 'Недоступен',
        };

    }

    public function color(): string
    {
        return match ($this) {
            self::AVAILABLE => 'btn-primary',
            self::RESERVED => 'btn-warning',
            self::UNAVAILABLE => 'btn-danger',
        };
    }
}
