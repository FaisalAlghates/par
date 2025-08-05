<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // If user is already authenticated, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Simple login without extensive validation for testing
        $email = $request->input('email', 'dfsdrge@gmail.com');
        $password = $request->input('password', 'password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // GET route for quick login (for testing)
    public function quickLogin()
    {
        if (Auth::attempt(['email' => 'dfsdrge@gmail.com', 'password' => 'password'])) {
            return redirect()->route('dashboard')->with('success', 'Quick login successful!');
        }
        return redirect()->route('login')->with('error', 'Quick login failed.');
    }
}
