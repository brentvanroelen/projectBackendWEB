@extends('layouts.mainLayout')

@section('title', 'Edit Category')

@section('content')
<div class="faq-admin-container">
    <h2>Edit Category</h2>
    <form method="POST" action="{{ route('faq.categories.update', $category) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('Category Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>
@endsection