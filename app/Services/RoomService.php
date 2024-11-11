<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{

    public function list($limit = 10)
    {
        return Room::paginate($limit);
    }

    public function save($data = [])
    {
        $room =  new Room($data);

        return $room->save();
    }

    public function update($id = null, $data = [])
    {
        $room = Room::find($id);

        $room->fill($data);

        return $room->save();
    }

    public function destroy($id = null)
    {
        return Room::destroy($id);
    }

    public function findById($id = null)
    {
        return Room::find($id);
    }
}
