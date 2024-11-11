<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'room_id',
        'user_id',
        'date_reservation',
        'status'
    ];

    public static $pending = 1;
    public static $approve = 2;
    public static $reject = 3;

    protected function casts(): array
    {
        return [
            'date_reservation' => 'datetime',
        ];
    }
}
