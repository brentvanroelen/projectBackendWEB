<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <!-- Voeg hier je CSS toe -->
</head>
<body>
    <h1>Populaire Films</h1>
    <div class="films">
        @foreach ($movies as $movie)
            <div class="film">
                <h2>{{ $movie['title'] }}</h2>
                <p>{{ $movie['overview'] }}</p>
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            </div>
        @endforeach
    </div>
</body>
</html>
