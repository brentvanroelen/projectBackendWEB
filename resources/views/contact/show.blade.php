@extends('layouts.mainLayout')

@section('title', 'Contact Us')

@section('content')
<div class="contact-container">
    <h2>Contact Us</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">{{ __('Message') }}</label>
            <textarea id="message" class="form-control" name="message" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
        </div>
    </form>
</div>
@endsection