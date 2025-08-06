<div>
    <div class="min-h-screen bg-gradient-to-br from-purple-900 via-indigo-900 to-blue-900 flex items-center justify-center px-4">
        
        <!-- Background Animation -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 right-20 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>
        </div>

        <div class="relative bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl border border-white/20 w-full max-w-md">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-white/70">Join ParHub and start creating presentations</p>
            </div>

            <!-- Register Form -->
            <form wire:submit="register" class="space-y-6">
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-white mb-2">Full Name</label>
                    <input 
                        type="text" 
                        id="name"
                        wire:model="name"
                        required
                        autofocus
                        class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all"
                        placeholder="Enter your full name"
                    >
                    @error('name') 
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email"
                        wire:model="email"
                        required
                        class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all"
                        placeholder="your@email.com"
                    >
                    @error('email') 
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password"
                        wire:model="password"
                        required
                        class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all"
                        placeholder="Create a strong password"
                    >
                    @error('password') 
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        wire:model="password_confirmation"
                        required
                        class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all"
                        placeholder="Confirm your password"
                    >
                    @error('password_confirmation') 
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-purple-700 hover:to-blue-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-200 disabled:opacity-50"
                >
                    <span wire:loading.remove>Create Account</span>
                    <span wire:loading class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Creating Account...
                    </span>
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-white/70">
                    Already have an account?
                    <a href="{{ route('login') }}" wire:navigate class="text-white font-semibold hover:text-purple-300 transition-colors underline">
                        Sign In
                    </a>
                </p>
            </div>

            <!-- Database Status -->
            <div class="mt-6 pt-4 border-t border-white/20">
                <p class="text-xs text-white/50 text-center mb-2">Database: parhub ✓</p>
                <div class="text-xs text-white/40 text-center">
                    Registration saves to: users table
                </div>
            </div>
        </div>
    </div>
</div>
