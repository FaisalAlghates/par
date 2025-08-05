<?php

namespace Modules\LandingPage\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WelcomePage extends Component
{
    public function mount()
    {
        // If user is authenticated, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('landingpage::livewire.welcome-page')
            ->layout('landingpage::components.layouts.master');
    }
}
