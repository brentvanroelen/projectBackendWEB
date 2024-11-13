
@extends('layouts.mainLayout')

@section('title', 'Admin Home')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="container">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Here you can manage users and other admin tasks.</p>
</div>
@endsection

@section('footer')
    <p>&copy; 2024 MyApp. All rights reserved.</p>
@endsection