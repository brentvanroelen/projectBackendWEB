<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Display the admin registration view.
     */
    public function createAdmin(): View
    {
        return view('admin.users.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        \Log::info('Registratie formulier ingediend');

        // Validatie voor de extra velden
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'username' => 'required|string|max:255',
            'birthday' => 'required|date',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        // Profielfoto opslaan (indien aanwezig)
        if ($request->hasFile('profilePicture')) {
            $validatedData['profile_picture'] = $request->file('profilePicture')->store('profile_pictures', 'public');
        }

        // Voeg de rol toe als deze aanwezig is in de request (admin kant)
        if ($request->has('role')) {
            $validatedData['role'] = $request->validate([
                'role' => 'required|string|in:user,admin',
            ])['role'];
        } else {
            // Standaard rol voor reguliere gebruikersregistratie
            $validatedData['role'] = 'user';
        }

        // Maak de gebruiker aan
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'username' => $validatedData['username'],
            'birthday' => $validatedData['birthday'],
            'profile_picture' => $validatedData['profile_picture'] ?? null,
            'description' => $validatedData['description'],
            'role' => $validatedData['role'],
        ]);

        \Log::info('Gebruiker aangemaakt: ' . $user->id);

        return redirect()->route('admin.users.index')->with('status', 'User created successfully.');
    }
}