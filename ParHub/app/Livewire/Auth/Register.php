<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        \Log::info('Registration attempt started for email: ' . $this->email);
        
        $validated = $this->validate([
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

        session()->flash('success', 'Account created successfully! Welcome to ParHub.');

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
