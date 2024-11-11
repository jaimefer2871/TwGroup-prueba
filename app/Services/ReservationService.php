<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function list($limit = 10, $conditions = [])
    {
        $reservationInstance = new Reservation();

        if (!empty($conditions)) {
            $reservationInstance = $reservationInstance->where('room_id','=',$conditions['room_id']);
        }

        return $reservationInstance->paginate($limit);
    }

    public function save($data = [])
    {
        $reservation =  new Reservation($data);

        return $reservation->save();
    }

    public function update($id = null, $data = [])
    {
        $reservation = Reservation::find($id);

        $reservation->fill($data);

        return $reservation->save();
    }

    public function destroy($id = null)
    {
        return Reservation::destroy($id);
    }

    public function findById($id = null)
    {
        return Reservation::find($id);
    }

    public function approve($id = null)
    {
        $reservation = Reservation::find($id);

        $reservation->status = Reservation::$approve;

        return $reservation->save();
    }

    public function reject($id = null)
    {
        $reservation = Reservation::find($id);

        $reservation->status = Reservation::$reject;

        return $reservation->save();
    }
}
