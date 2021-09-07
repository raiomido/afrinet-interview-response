<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
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
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => 'password',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
