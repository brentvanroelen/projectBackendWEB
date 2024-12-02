@extends('layouts.admin')

@section('title', 'Manage FAQ Categories')

@section('content')
<div class="faq-admin-container">
    <h2>Manage FAQ Categories</h2>
    <a href="{{ route('admin.faq-categories.create') }}" class="btn btn-primary">Add Category</a>
    @foreach($categories as $category)
        <div class="faq-category">
            <h4>{{ $category->name }}</h4>
            <a href="{{ route('admin.faq-categories.edit', $category) }}" class="btn btn-secondary">Edit Category</a>
            <form action="{{ route('admin.faq-categories.destroy', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Category</button>
            </form>
        </div>
    @endforeach
</div>
@endsection