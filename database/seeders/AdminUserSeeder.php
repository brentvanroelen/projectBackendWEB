<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'username' => 'admin',
                'password' => bcrypt('Password!321'),
                'role' => 'admin'
            ]
        );
    }
}