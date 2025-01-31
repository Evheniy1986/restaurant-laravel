<?php

namespace App\Models;

use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'name',
        'guest_number',
        'status',
    ];

    protected $casts = [
        'status' => TableStatus::class,
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
