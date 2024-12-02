@extends('layouts.mainLayout')

@section('title', 'Profile')

@section('content')
<div class="profile-container">
    <h2>{{ $user->username ?? $user->name }}'s Profile</h2>
    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}" alt="Profile Picture" class="profile-picture">
    <p><strong>Username:</strong> {{ $user->username ?? 'N/A' }}</p>
    <p><strong>Birthday:</strong> {{ $user->birthday ?? 'N/A' }}</p>
    <p><strong>About Me:</strong> {{ $user->description ?? 'N/A' }}</p>
    @auth
        @if (Auth::id() === $user->id)
            <a href="{{ route('profile.edit', $user) }}" class="btn btn-primary">Edit Profile</a>
        @endif
    @endauth
</div>
@endsection