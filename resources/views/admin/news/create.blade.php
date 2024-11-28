

@extends('layouts.admin')

@section('content')
    <h1>Create News Item</h1>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div>
            <label for="published_at">Published At:</label>
            <input type="datetime-local" id="published_at" name="published_at">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection