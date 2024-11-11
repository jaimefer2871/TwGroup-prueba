<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationService
{
    public function list($limit = 10, $conditions = [])
    {
        $reservationInstance = new Reservation();

        if (!empty($conditions)) {

            if(array_key_exists('room_id', $conditions)){
                $reservationInstance = $reservationInstance->where('room_id', '=', $conditions['room_id']);
            }

            if(array_key_exists('user_id', $conditions)){
                $reservationInstance = $reservationInstance->where('user_id', '=', $conditions['user_id']);
            }
        }

        return $reservationInstance->paginate($limit);
    }

    public function save($data = [])
    {
        $reservation = new Reservation($data);

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

    public function isReserved($roomId, $date)
    {
        $output = false;

        $listReservations = Reservation::where('room_id', $roomId)
        ->whereDate('date_reservation', $date->toDateString())->get();

        foreach ($listReservations as $reservation) {
            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date_reservation);
            $dateTimeAddHour = $dateTime->addHour();

            if ($date->lessThan($dateTimeAddHour)) {
                $output = true;
            }
        }

        return $output;
    }
}
