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
            <div class="film-card-content">
                <h2>{{ $movie['title'] }}</h2>
                <p>{{ $movie['overview'] }}</p>
                @php
                    $averageScore = \App\Models\Review::where('film_id', $movie['id'])->avg('score');
                @endphp
                <p>Average Score: {{ $averageScore ?? 'N/A' }}</p>
                <form method="POST" action="{{ route('films.addToList', 'seen') }}">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $movie['id'] }}">
                    <input type="hidden" name="film_title" value="{{ $movie['title'] }}">
                    <input type="hidden" name="film_poster" value="{{ $movie['poster_path'] }}">
                    <button type="submit" class="btn btn-success">Add to Seen</button>
                </form>
                <form method="POST" action="{{ route('films.addToList', 'to_watch') }}">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $movie['id'] }}">
                    <input type="hidden" name="film_title" value="{{ $movie['title'] }}">
                    <input type="hidden" name="film_poster" value="{{ $movie['poster_path'] }}">
                    <button type="submit" class="btn btn-warning">Add to To Watch</button>
                </form>
                @auth
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#reviews-{{ $movie['id'] }}" aria-expanded="false" aria-controls="reviews-{{ $movie['id'] }}">
                    Show Reviews
                </button>
                <div class="collapse" id="reviews-{{ $movie['id'] }}">
                    <div class="card card-body">
                        @php
                            $reviews = \App\Models\Review::where('film_id', $movie['id'])->get();
                        @endphp
                        @foreach($reviews as $review)
                            <p><strong>{{ $review->user->name }}</strong>: {{ $review->review }} (Score: {{ $review->score }})</p>
                        @endforeach
                    </div>
                </div>
                <form method="POST" action="{{ route('reviews.store', $movie['id']) }}">
                    @csrf
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="review" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="score">Score</label>
                        <input type="number" name="score" id="score" class="form-control" min="1" max="10" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection