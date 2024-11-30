@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')
<div class="admin-home-container">
    <h2>Admin Dashboard</h2>
    <div class="admin-buttons">
    <a href="/faq/categories" class="btn btn-primary">Manage FAQ Categories</a>
    <a href="/faq/questions" class="btn btn-primary">Manage FAQ Questions</a>
    </div>
</div>
@endsection