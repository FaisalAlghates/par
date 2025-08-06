<div class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-float-delay"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl animate-pulse"></div>
    </div>

    <!-- Login Form Container -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <!-- Glass Container -->
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 shadow-2xl">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-white/70">Sign in to access your dashboard</p>
            </div>

            <!-- Login Form -->
            <form wire:submit="login" class="space-y-6">
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white/90 mb-2">Email Address</label>
                    <div class="relative">
                        <input wire:model="email" 
                               type="email" 
                               id="email" 
                               required 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-white/50 focus:ring-2 focus:ring-white/50 focus:border-white/50 focus:outline-none transition-all duration-300"
                               placeholder="example@parhub.com">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                    </div>
                    @error('email') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white/90 mb-2">Password</label>
                    <div class="relative" x-data="{ showPassword: false }">
                        <input wire:model="password" 
                               :type="showPassword ? 'text' : 'password'" 
                               id="password" 
                               required 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-white/50 focus:ring-2 focus:ring-white/50 focus:border-white/50 focus:outline-none transition-all duration-300"
                               placeholder="Password">
                        <button type="button" 
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg x-show="!showPassword" class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg x-show="showPassword" class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                            </svg>
                        </button>
                    </div>
                    @error('password') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input wire:model="remember" type="checkbox" class="w-4 h-4 bg-white/10 border border-white/20 rounded text-blue-600 focus:ring-white/50 focus:ring-2">
                        <span class="mr-2 text-sm text-white/80">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-white/80 hover:text-white transition-colors duration-200">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white/50 shadow-lg">
                    <span wire:loading.remove>Sign In</span>
                    <span wire:loading class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Signing in...
                    </span>
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <p class="text-white/70">
                    Don't have an account? 
                    <a href="{{ route('register') }}" wire:navigate class="text-white font-semibold hover:underline transition-all duration-200">
                        Sign up now
                    </a>
                </p>
            </div>

            <!-- Quick Test Links for Development -->
            @if(app()->environment('local'))
            <div class="mt-4 pt-4 border-t border-white/20">
                <p class="text-xs text-white/50 text-center mb-2">Quick Test:</p>
                <div class="flex space-x-2 text-xs">
                    <button type="button" 
                            onclick="document.getElementById('email').value='dfsdrge@gmail.com'; document.getElementById('password').value='password'"
                            class="flex-1 bg-white/10 hover:bg-white/20 text-white/70 py-1 px-2 rounded transition-colors duration-200">
                        Faisal
                    </button>
                    <button type="button" 
                            onclick="document.getElementById('email').value='test@example.com'; document.getElementById('password').value='password'"
                            class="flex-1 bg-white/10 hover:bg-white/20 text-white/70 py-1 px-2 rounded transition-colors duration-200">
                        Test
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

@keyframes float-delay {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(-10deg); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delay {
    animation: float-delay 8s ease-in-out infinite;
}
</style>
