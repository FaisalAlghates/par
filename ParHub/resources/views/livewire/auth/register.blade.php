<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 animated-background">
    <div class="floating-dots"></div>
    
    <div class="max-w-md w-full space-y-8">
        <!-- Logo and Title -->
        <div class="text-center animate-fade-in-down">
            <div class="flex justify-center mb-6">
                <div class="w-20 h-20 bg-white/10 backdrop-blur-lg rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Create Account</h2>
            <p class="text-white/80 text-lg">Join us and enjoy the presentation platform</p>
        </div>

        <!-- Form -->
        <div class="glass-card p-8 animate-scale-in-bounce delay-200">
            <form wire:submit="register" class="space-y-6">
                <!-- Name Field -->
                <div class="form-group-interactive animate-fade-in-up delay-300">
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        wire:model="name"
                        required 
                        class="form-input-interactive focus-ring"
                        placeholder=" "
                        autocomplete="name"
                    >
                    <label for="name" class="form-label-interactive">Full Name</label>
                    @error('name') 
                        <p class="mt-2 text-sm text-red-400 animate-fade-in">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group-interactive animate-fade-in-up delay-400">
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        wire:model="email"
                        required 
                        class="form-input-interactive focus-ring"
                        placeholder=" "
                        autocomplete="email"
                    >
                    <label for="email" class="form-label-interactive">Email Address</label>
                    @error('email') 
                        <p class="mt-2 text-sm text-red-400 animate-fade-in">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group-interactive animate-fade-in-up delay-500">
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        wire:model="password"
                        required 
                        class="form-input-interactive focus-ring"
                        placeholder=" "
                        autocomplete="new-password"
                    >
                    <label for="password" class="form-label-interactive">Password</label>
                    @error('password') 
                        <p class="mt-2 text-sm text-red-400 animate-fade-in">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="form-group-interactive animate-fade-in-up delay-600">
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        wire:model="password_confirmation"
                        required 
                        class="form-input-interactive focus-ring"
                        placeholder=" "
                        autocomplete="new-password"
                    >
                    <label for="password_confirmation" class="form-label-interactive">Confirm Password</label>
                    @error('password_confirmation') 
                        <p class="mt-2 text-sm text-red-400 animate-fade-in">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Register Button -->
                <div class="animate-fade-in-up delay-700">
                    <button 
                        type="submit" 
                        class="btn-interactive ripple-effect w-full py-4 text-lg font-semibold"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>
                            Create Account
                        </span>
                        <span wire:loading class="flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Creating Account...
                        </span>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center animate-fade-in-up delay-800">
                    <p class="text-white/80">
                        Already have an account?
                        <a 
                            href="{{ route('login') }}" 
                            wire:navigate 
                            class="text-white font-semibold hover:text-white/80 transition-colors duration-200 underline decoration-white/50 hover:decoration-white/80"
                        >
                            Sign In
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="text-center text-white/60 text-sm animate-fade-in-up delay-1000">
            <p>By creating an account, you agree to our</p>
            <a href="#" class="text-white/80 hover:text-white transition-colors">Terms of Service</a>
            and
            <a href="#" class="text-white/80 hover:text-white transition-colors">Privacy Policy</a>
        </div>
    </div>
</div>