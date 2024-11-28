@extends('layouts.mainLayout')

@section('content')
    <h1>Latest News</h1>
    @foreach($newsItems as $news)
        <div>
            <h2><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h2>
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
            <p>{{ $news->content }}</p>
            <p>Published at: {{ $news->published_at }}</p>
        </div>
    @endforeach
@endsection