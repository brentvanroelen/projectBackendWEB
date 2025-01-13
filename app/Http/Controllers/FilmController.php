<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function showFilms(Request $request)
{
    $apiKey = env('TMDB_API_KEY');
    $query = $request->input('query', '');
    $filter = $request->input('filter', 'popular'); // Standaard filter op 'popular'

    $url = 'https://api.themoviedb.org/3/movie/popular'; // Standaard populaire films
    $params = ['api_key' => $apiKey];

    if (!empty($query)) {
        $url = 'https://api.themoviedb.org/3/search/movie';
        $params['query'] = $query;
    } elseif ($filter === 'top_rated') {
        $url = 'https://api.themoviedb.org/3/movie/top_rated';
    } elseif ($filter === 'upcoming') {
        $url = 'https://api.themoviedb.org/3/movie/upcoming';
    }

    $response = Http::get($url, $params);

    $movies = $response->successful() ? $response->json()['results'] : [];

    return view('films', compact('movies'));
}

}