@extends('layouts.mainLayout')

@section('title', 'All Profiles')

@section('content')
<div class="profiles-container">
    <h2>All Profiles</h2>
    <div class="profiles-list">
        @foreach ($users as $user)
            <div class="profile-item">
                <a href="{{ route('profile.show', $user) }}">
                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}" alt="Profile Picture" class="profile-picture">
                    <p>{{ $user->username ?? $user->name }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection