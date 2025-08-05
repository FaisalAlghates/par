<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        // Check rate limiting first
        $this->ensureIsNotRateLimited();

        // Simple validation
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try to authenticate
        $credentials = ['email' => $this->email, 'password' => $this->password];
        
        \Log::info('Login attempt for: ' . $this->email . ' in database: ' . \DB::connection()->getDatabaseName());
        
        if (Auth::attempt($credentials, $this->remember)) {
            // Clear rate limiting attempts on successful login
            RateLimiter::clear($this->throttleKey());
            
            \Log::info('Login successful for: ' . $this->email);
            
            // Success - regenerate session and redirect
            request()->session()->regenerate();
            
            // Add session flash message
            session()->flash('success', 'Welcome back! Login successful.');
            
            $this->redirect(route('dashboard'), navigate: true);
            return;
        }

        \Log::warning('Login failed for: ' . $this->email);

        // Increment rate limiting attempts
        RateLimiter::hit($this->throttleKey());

        // Failed - show error
        $this->addError('email', 'These credentials do not match our records.');
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
