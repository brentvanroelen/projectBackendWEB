@extends('layouts.mainLayout')


@section('title', 'Profile')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <h1>Profile</h1>
    
    @if (auth()->user()->profile_picture)
        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" >
    @endif
   
    <p> <strong>Username:</strong>  {{ auth()->user()->username }} <br>

    <strong>Birthday:</strong>  {{ auth()->user()->birthday }} <br>
    <strong>Description:</strong>  {{ auth()->user()->description }} <br>
    <strong>Email: </strong> {{ auth()->user()->email }}</p>

   
@endsection


@section('footer')
    <p>This is the footer</p>
@endsection