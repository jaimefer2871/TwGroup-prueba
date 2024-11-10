<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddDefaultInformation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id'            => 1,
            'name'          => 'Admin',
            'description'   => 'Admin system',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'id'            => 2,
            'name'          => 'Client',
            'description'   => 'client system',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Administrator',
            'email'             => 'admin@twgroup.com',
            'password'          => Hash::make('123456'),
            'rol_id'            => 1,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
