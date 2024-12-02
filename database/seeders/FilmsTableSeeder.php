<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmsTableSeeder extends Seeder
{
    public function run()
    {
        Film::factory()->count(20)->create();
    }
}