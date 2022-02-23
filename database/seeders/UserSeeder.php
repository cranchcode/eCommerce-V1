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
                'username' => 'laz0rde',
                'email' => 'a@a.com',
                'password' => Hash::make('@Aa123123'),
                'org_id' => 1
            ],
            [
                'username' => 'medo23',
                'email' => 'b@b.com',
                'password' => Hash::make('@Aa123123'),
                'org_id' => 1
            ],
            [
                'username' => 'noor2',
                'email' => 'c@c.com',
                'password' => Hash::make('@Aa123123'),
                'org_id' => 2
            ]
        ]);
    }
}
