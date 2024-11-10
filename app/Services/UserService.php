<?php

namespace App\Services;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function save(array $data)
    {
        $roleClient = Rol::where('name','Client')->first();

        $data['password'] = Hash::make($data['password']);
        $data['rol_id'] = $roleClient->id;

        $user = new User($data);

        return $user->save();
    }
}
