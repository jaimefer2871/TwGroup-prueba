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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatus()
    {
        switch ($this->attributes['status']) {
            case self::$approve:
                return '<span class="badge bg-success">Aceptada</span>';
                break;
            case self::$reject:
                return '<span class="badge bg-danger">Rechazada</span>';
                break;

            default:
                return '<span class="badge bg-primary">Pendiente</span>';
                break;
        }
    }
}
