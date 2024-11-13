
@extends('layouts.mainLayout')

@section('title', 'Admin - Users')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="container">
    <h1>Manage Users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    @if($user->role === 'user')
                    <form method="POST" action="{{ route('admin.users.promote', $user) }}">
                        @csrf
                        <button type="submit">Promote to Admin</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.users.demote', $user) }}">
                        @csrf
                        <button type="submit">Demote to User</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Create New User</h2>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit">Create User</button>
    </form>
</div>
@endsection