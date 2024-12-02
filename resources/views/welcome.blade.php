@extends('layouts.mainLayout')

@section('title', 'Welcome')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="welcome-header">
    <h1>Welcome to our website</h1>
    <p>Your ultimate movie tracking app</p>
    <a href="{{ route('films.index') }}" class="btn">Get Started</a>
</div>

<div class="centered-button">
    <a href="{{ route('profiles.index') }}" class="btn btn-primary">View All Profiles</a>
</div>

<div class="news-section">
    <h2>Latest News</h2>
    @foreach($newsItems as $news)
        <div class="news-item">
            <h3>{{ $news->title }}</h3>
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
            @endif
            <p>{{ Str::limit($news->content, 150) }}</p>
            <a href="{{ route('news.show', $news) }}" class="btn btn-primary">Read More</a>
        </div>
    @endforeach
</div>
@endsection

@section('footer')
    <p>&copy; 2024 MyApp. All rights reserved.</p>
@endsection