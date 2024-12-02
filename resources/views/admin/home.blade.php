@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')
<div class="admin-home-container">
    <h2>Admin Dashboard</h2>
    <div class="admin-buttons">
        <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-primary">Manage FAQ Categories</a>
        <a href="{{ route('admin.faq-questions.index') }}" class="btn btn-primary">Manage FAQ Questions</a>
    </div>
</div>
@endsection