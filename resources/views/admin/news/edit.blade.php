@extends('layouts.admin')

@section('content')
    <h1>Edit News Item</h1>
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $news->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $news->content }}</textarea>
        </div>
        <div>
            <label for="published_at">Published At:</label>
            <input type="datetime-local" id="published_at" name="published_at" value="{{ $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection