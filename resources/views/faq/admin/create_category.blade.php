@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="faq-admin-container">
    <h2>Create Category</h2>
    <form method="POST" action="{{ route('admin.faq-categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Category Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection