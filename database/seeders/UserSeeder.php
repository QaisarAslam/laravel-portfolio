<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'admin@gmail.com',
                'password' => \Hash::make('11221122'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
