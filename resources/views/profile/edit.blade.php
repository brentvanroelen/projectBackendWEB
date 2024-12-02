@extends('layouts.mainLayout')

@section('title', 'Edit Profile')

@section('content')
<div class="profile-container">
    <h2>Edit Profile</h2>
    <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="username">{{ __('Username') }}</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
        </div>
        <div class="form-group">
            <label for="birthday">{{ __('Birthday') }}</label>
            <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday', $user->birthday) }}">
        </div>
        <div class="form-group">
            <label for="profilePicture">{{ __('Profile Picture') }}</label>
            <input id="profilePicture" type="file" class="form-control" name="profilePicture" accept="image/*">
        </div>
        <div class="form-group">
            <label for="description">{{ __('About Me') }}</label>
            <textarea id="description" class="form-control" name="description">{{ old('description', $user->description) }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
        </div>
    </form>
</div>
@endsection