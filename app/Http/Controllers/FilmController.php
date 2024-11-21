<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function showFilms(Request $request)
    {
        $query = $request->input('query');
        $filter = $request->input('filter');    

        $endpoint = match($filter) {
            'top_rated' => 'movie/top_rated',
            'upcoming' => 'movie/upcoming',
            default => 'movie/popular',
        };

        $response = Http::get("https://api.themoviedb.org/3/" . ($query ? 'search/movie' : $endpoint), [
            'api_key' => env('TMDB_API_KEY'),
            'language' => 'en-US',
            'query' => $query, 
        ]);

        $movies = $response->json(); 

        return view('films', ['movies' => $movies['results'] ?? []]);
    }
}

