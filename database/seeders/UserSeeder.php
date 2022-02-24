<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'laz0rde1',
                'email' => 'r@r.com',
                'password' => Hash::make('@Aa123123'),
            ],
            [
                'username' => 'medo23',
                'email' => 'd@d.com',
                'password' => Hash::make('@Aa123123'),
            ],
            [
                'username' => 'noor2',
                'email' => 't@t.com',
                'password' => Hash::make('@Aa123123'),
            ]
        ]);
    }
}
