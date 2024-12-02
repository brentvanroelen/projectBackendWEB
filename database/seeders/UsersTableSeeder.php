<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'username' => 'admin',
                'password' => Hash::make('Password!321'),
                'role' => 'admin'
            ]
        );
    }
}