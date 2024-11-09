<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
</head>
<body>
    <h1>Films</h1>

    <!-- Zoekformulier -->
    <form method="GET" action="{{ route('films.index') }}">
        <input type="text" name="query" placeholder="Zoek een film" value="{{ request('query') }}">
        <select name="filter">
            <option value="">Alle categorieën</option>
            <option value="popular" "{{ request('filter') == 'popular' ? 'selected' : '' }}>Populair</option>
            <option value="top_rated" {{ request('filter') == 'top_rated' ? 'selected' : '' }}>Hoogste beoordeling</option>
            <option value="upcoming" {{ request('filter') == 'upcoming' ? 'selected' : '' }}>Komende films</option>
        </select>
        <button type="submit">Zoeken</button>
    </form>

    <!-- Filmoverzicht -->
    <div>
        @if(isset($movies) && count($movies))
            @foreach($movies as $movie)
                <div>
                    <h2>{{ $movie['title'] }}</h2>
                    <p>{{ $movie['overview'] }}</p>
                    <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                </div>
            @endforeach
        @else
            <p>Geen films gevonden.</p>
        @endif
    </div>
</body>
</html>

