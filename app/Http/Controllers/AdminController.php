<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function promote(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function demote(User $user)
    {
        $user->role = 'user';
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        User::create([
            'name' => htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($request->email, ENT_QUOTES, 'UTF-8'),
            'password' => Hash::make($request->password),
            'role' => htmlspecialchars($request->role, ENT_QUOTES, 'UTF-8'),
        ]);

        return redirect()->route('admin.users.index')->with('status', 'User created successfully.');
    }
}