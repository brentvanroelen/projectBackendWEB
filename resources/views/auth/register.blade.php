<!-- resources/views/auth/register.blade.php -->

@extends('layouts.mainLayout')

@section('title', 'Register')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h2>{{ __('Register') }}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="username">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for="birthday">{{ __('Birthday') }}</label>
                <input id="birthday" type="date" class="form-control" name="birthday" required>
            </div>

            <div class="form-group">
                <label for="profilePicture">{{ __('Profile Picture') }}</label>
                <input id="profilePicture" type="file" class="form-control" name="profilePicture" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>

            <div class="form-group">
                <a href="{{ url('/') }}" class="btn btn-secondary">{{ __('Terug naar Welkom') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection