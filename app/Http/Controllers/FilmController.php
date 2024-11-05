<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function showFilms()
    {
        // Hier halen we populaire films op van de externe API
        $response = Http::get("https://api.themoviedb.org/3/movie/popular", [
            'api_key' => env('TMDB_API_KEY'), // Zorg ervoor dat je deze omgevingsvariabele instelt
            'language' => 'nl-NL',
        ]);

        $movies = $response->json(); // Haal de JSON-gegevens op

        // Geef de films door aan de view
        return view('films', ['movies' => $movies['results']]);
    }
}

