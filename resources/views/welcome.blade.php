
@extends('layouts.mainLayout')

@section('title', 'Welcome')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="welcome-header">
    <h1>Welcome to MyApp</h1>
    <p>Your ultimate movie tracking app</p>
    <a href="{{ route('films.index') }}" class="btn">Get Started</a>
</div>
@endsection

@section('footer')
    <p>&copy; 2024 MyApp. All rights reserved.</p>
@endsection