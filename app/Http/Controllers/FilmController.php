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
        $filter = $request->input('filter', '');

        $url = 'https://api.themoviedb.org/3/discover/movie';
        $params = [
            'api_key' => $apiKey,
            'query' => $query,
        ];

        if ($filter === 'popular') {
            $url = 'https://api.themoviedb.org/3/movie/popular';
        } elseif ($filter === 'top_rated') {
            $url = 'https://api.themoviedb.org/3/movie/top_rated';
        } elseif ($filter === 'upcoming') {
            $url = 'https://api.themoviedb.org/3/movie/upcoming';
        }

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $movies = $response->json()['results'];
        } else {
            $movies = [];
        }

        return view('films', compact('movies'));
    }
}