@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-card">
        <h2>{{ __('Dashboard') }}</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>{{ __('You are logged in!') }}</p>
    </div>
</div>
@endsection