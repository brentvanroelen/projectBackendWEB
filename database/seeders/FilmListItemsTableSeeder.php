<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmListItem;
use App\Models\FilmList;
use App\Models\Film;

class FilmListItemsTableSeeder extends Seeder
{
    public function run()
    {
        $filmLists = FilmList::all();
        $films = Film::all();

        foreach ($filmLists as $filmList) {
            foreach ($films->random(5) as $film) {
                FilmListItem::create([
                    'film_list_id' => $filmList->id,
                    'film_id' => $film->id,
                    'film_title' => $film->title,
                    'film_poster' => $film->poster_path,
                    'list_type' => $filmList->title
                ]);
            }
        }
    }
}