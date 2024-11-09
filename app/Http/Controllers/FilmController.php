<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function showFilms(Request $request)
{
    $query = $request->input('query');      // Zoekterm
    $filter = $request->input('filter');    // Filteroptie

    // Bepaal de API-url en endpoint op basis van de filteroptie
    $endpoint = match($filter) {
        'top_rated' => 'movie/top_rated',
        'upcoming' => 'movie/upcoming',
        default => 'movie/popular',
    };

    // Voeg de zoekterm toe als er een query is, anders haal het standaard filter op
    $response = Http::get("https://api.themoviedb.org/3/" . ($query ? 'search/movie' : $endpoint), [
        'api_key' => env('TMDB_API_KEY'),
        'language' => 'en-EN',
        'query' => $query, // Voeg de zoekterm toe aan de request
    ]);

    $movies = $response->json(); // Haal de JSON-gegevens op

    // Geef de films door aan de view
    return view('films', ['movies' => $movies['results'] ?? []]);
}

}

