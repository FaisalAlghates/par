<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(Request $request)
    {
        \Log::info('Registration attempt started for email: ' . $request->email);
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['email_verified_at'] = now(); // Auto verify for development

        \Log::info('Creating user with data: ', $validated);
        
        // Create user
        $user = User::create($validated);
        
        \Log::info('User created successfully with ID: ' . $user->id . ' in database: ' . \DB::connection()->getDatabaseName());
        
        event(new Registered($user));

        Auth::login($user);
        
        \Log::info('User logged in successfully');

        return redirect()->route('dashboard')->with('success', 'Account created successfully! Welcome to ParHub.');
    }
}
