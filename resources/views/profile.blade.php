<h2>{{ auth()->user()->name }}</h2>
<p>Username: {{ auth()->user()->username }}</p>
<p>Birthday: {{ auth()->user()->birthday }}</p>
<p>Description: {{ auth()->user()->description }}</p>

@if (auth()->user()->profile_picture)
    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
@endif
