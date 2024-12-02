@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="admin-container">
    <h2>Manage Users</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create User</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8') }}</td>
                <td>
                    @if ($user->role !== 'admin')
                    <form method="POST" action="{{ route('admin.users.promote', $user) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Promote to Admin</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.users.demote', $user) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning">Demote to User</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection