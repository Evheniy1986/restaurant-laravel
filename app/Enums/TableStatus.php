<?php

namespace App\Enums;

enum TableStatus: string
{
    case AVAILABLE ='available';
    case RESERVED = 'reserved';
    case UNAVAILABLE = 'unavailable';



    public function color(): string
    {
        return match ($this) {
            self::AVAILABLE => 'btn-primary',
            self::RESERVED => 'btn-warning',
            self::UNAVAILABLE => 'btn-danger',
        };
    }
}
