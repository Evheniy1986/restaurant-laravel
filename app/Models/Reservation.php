<?php

namespace App\Models;

use App\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'date',
        'time',
        'guests',
        'comment',
        'table_id',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s',
        'status' => ReservationStatus::class,
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
