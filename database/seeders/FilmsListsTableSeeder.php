<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmList;
use App\Models\User;

class FilmListsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            FilmList::create([
                'user_id' => $user->id,
                'title' => 'seen'
            ]);

            FilmList::create([
                'user_id' => $user->id,
                'title' => 'to_watch'
            ]);
        }
    }
}