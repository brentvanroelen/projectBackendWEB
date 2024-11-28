@extends('layouts.admin')

@section('content')
    <h1>Manage News</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Create New News Item</a>
    @foreach($newsItems as $news)
        <div class="news-item">
            <h2>{{ $news->title }}</h2>
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
            @endif
            <p>{{ $news->content }}</p>
            <p>Published at: {{ $news->published_at }}</p>
            <div class="actions">
                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection