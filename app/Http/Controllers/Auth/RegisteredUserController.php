<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
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
            'password' => 'required|string|confirmed|min:2',
            'username' => 'required|string|max:255',
            'birthday' => 'required|date',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
    
        // Profielfoto opslaan (indien aanwezig)
        if ($request->hasFile('profilePicture')) {
            $validatedData['profile_picture'] = $request->file('profilePicture')->store('profile_pictures', 'public');
        }
    
        // Maak de gebruiker aan
        $user = User::create([
           
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'username' => $validatedData['username'],
            'birthday' => $validatedData['birthday'],
            'profile_picture' => $validatedData['profile_picture'] ?? null,
            'description' => $validatedData['description'],
        ]);
    
        // Log de gebruiker direct in
        Auth::login($user);
    
       
        return redirect()->route('dashboard');
 }
}
