<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('profile.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user): View
    {
        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.show', $user);
        }

        return view('profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.show', $user);
        }

        $validatedData = $request->validated();

        if ($request->hasFile('profilePicture')) {
            $validatedData['profile_picture'] = $request->file('profilePicture')->store('profile_pictures', 'public');
        }

        $user->update($validatedData);

        return redirect()->route('profile.show', $user)->with('status', 'Profile updated successfully.');
    }
}