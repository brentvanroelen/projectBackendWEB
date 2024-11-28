
@extends('layouts.mainLayout')

@section('title', 'Films')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="container">
    <!-- Zoekformulier -->
    <div class="search-bar">
        <form method="GET" action="{{ route('films.index') }}">
            <input type="text" name="query" placeholder="Zoek een film" value="{{ request('query') }}">
            <select name="filter">
                <option value="">Alle categorieën</option>
                <option value="popular" {{ request('filter') == 'popular' ? 'selected' : '' }}>Populair</option>
                <option value="top_rated" {{ request('filter') == 'top_rated' ? 'selected' : '' }}>Hoogste beoordeling</option>
                <option value="upcoming" {{ request('filter') == 'upcoming' ? 'selected' : '' }}>Komende films</option>
            </select>
            <button type="submit">Zoeken</button>
        </form>
    </div>

    <!-- Filmoverzicht -->
    <div class="film-grid">
        @foreach($movies as $movie)
        <div class="film-card">
            <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            <h3>{{ $movie['title'] }}</h3>
        </div>
        @endforeach
    </div>
</div>
@endsection