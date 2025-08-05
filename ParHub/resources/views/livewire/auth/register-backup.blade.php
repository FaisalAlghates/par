<div class="min-h-screen relative flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 overflow-hidden" 
     x-data="{ 
         step: 1, 
         showPassword: false, 
         showPasswordConfirmation: false,
         animateIn: false
     }" 
     x-init="setTimeout(() => animateIn = true, 100)">
    
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-96 h-96 bg-gradient-to-r from-violet-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-emerald-400 to-cyan-500 rounded-full opacity-15 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
        <div class="absolute top-10 left-1/3 w-32 h-32 bg-gradient-to-r from-pink-400 to-rose-500 rounded-full opacity-10 blur-2xl animate-pulse" style="animation-delay: 3s"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="floating-particle" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="floating-particle" style="top: 20%; right: 15%; animation-delay: 2s;"></div>
        <div class="floating-particle" style="bottom: 30%; left: 20%; animation-delay: 4s;"></div>
        <div class="floating-particle" style="top: 60%; right: 25%; animation-delay: 6s;"></div>
        <div class="floating-particle" style="bottom: 15%; right: 40%; animation-delay: 8s;"></div>
    </div>

    <div class="max-w-lg w-full space-y-8 relative z-10">
        
        <!-- Header Section -->
        <div class="text-center animate-fade-in-down">
            <div class="glass-effect-luxury rounded-2xl p-8 mb-8">
                <div class="flex justify-center mb-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-violet-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl transform hover:scale-110 transition-all duration-500">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl font-bold text-white mb-3">Create Account</h2>
                <p class="text-white/80 text-xl">Join ParHub and start creating amazing presentations</p>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="glass-effect-card rounded-3xl p-10 animate-scale-in-bounce delay-200 elegant-shadow">
            <form wire:submit="register" class="space-y-8">
                
                <!-- Name Field -->
                <div class="form-group-modern animate-fade-in-up delay-300" x-data="{ focused: false, hasValue: false }">
                    <div class="relative">
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            wire:model="name"
                            required 
                            class="modern-input peer"
                            placeholder=" "
                            autocomplete="name"
                            @focus="focused = true" 
                            @blur="focused = false; hasValue = $event.target.value !== ''"
                            @input="hasValue = $event.target.value !== ''"
                        >
                        <label for="name" class="modern-label">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                        <div class="modern-input-border" :class="{'border-violet-500': focused}"></div>
                    </div>
                    @error('name') 
                        <p class="mt-3 text-sm text-red-400 animate-fade-in flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group-modern animate-fade-in-up delay-400" x-data="{ focused: false, hasValue: false }">
                    <div class="relative">
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            wire:model="email"
                            required 
                            class="modern-input peer"
                            placeholder=" "
                            autocomplete="email"
                            @focus="focused = true" 
                            @blur="focused = false; hasValue = $event.target.value !== ''"
                            @input="hasValue = $event.target.value !== ''"
                        >
                        <label for="email" class="modern-label">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Address
                        </label>
                        <div class="modern-input-border" :class="{'border-violet-500': focused}"></div>
                    </div>
                    @error('email') 
                        <p class="mt-3 text-sm text-red-400 animate-fade-in flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group-modern animate-fade-in-up delay-500" x-data="{ focused: false, hasValue: false, showPassword: false }">
                    <div class="relative">
                        <input 
                            id="password" 
                            name="password" 
                            :type="showPassword ? 'text' : 'password'" 
                            wire:model="password"
                            required 
                            class="modern-input peer pr-12"
                            placeholder=" "
                            autocomplete="new-password"
                            @focus="focused = true" 
                            @blur="focused = false; hasValue = $event.target.value !== ''"
                            @input="hasValue = $event.target.value !== ''"
                        >
                        <label for="password" class="modern-label">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </label>
                        <button 
                            type="button" 
                            @click="showPassword = !showPassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors"
                        >
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.464 8.464M8.464 8.464L4.93 4.93m4.242 4.242L19.07 19.07"></path>
                            </svg>
                        </button>
                        <div class="modern-input-border" :class="{'border-violet-500': focused}"></div>
                    </div>
                    @error('password') 
                        <p class="mt-3 text-sm text-red-400 animate-fade-in flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="form-group-modern animate-fade-in-up delay-600" x-data="{ focused: false, hasValue: false, showPassword: false }">
                    <div class="relative">
                        <input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            :type="showPassword ? 'text' : 'password'" 
                            wire:model="password_confirmation"
                            required 
                            class="modern-input peer pr-12"
                            placeholder=" "
                            autocomplete="new-password"
                            @focus="focused = true" 
                            @blur="focused = false; hasValue = $event.target.value !== ''"
                            @input="hasValue = $event.target.value !== ''"
                        >
                        <label for="password_confirmation" class="modern-label">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm Password
                        </label>
                        <button 
                            type="button" 
                            @click="showPassword = !showPassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors"
                        >
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.464 8.464M8.464 8.464L4.93 4.93m4.242 4.242L19.07 19.07"></path>
                            </svg>
                        </button>
                        <div class="modern-input-border" :class="{'border-violet-500': focused}"></div>
                    </div>
                    @error('password_confirmation') 
                        <p class="mt-3 text-sm text-red-400 animate-fade-in flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <!-- Terms and Conditions -->
                <div class="animate-fade-in-up delay-700" x-data="{ agreed: false }">
                    <label class="flex items-start space-x-3 cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" x-model="agreed" class="sr-only">
                            <div 
                                class="w-6 h-6 rounded-lg border-2 border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 flex items-center justify-center transition-all duration-300 group-hover:border-violet-500"
                                :class="agreed ? 'bg-gradient-to-r from-violet-600 to-purple-600 border-violet-600' : ''"
                            >
                                <svg x-show="agreed" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                            I agree to the 
                            <a href="#" class="text-violet-600 hover:text-violet-700 font-semibold transition-colors">Terms of Service</a>
                            and 
                            <a href="#" class="text-violet-600 hover:text-violet-700 font-semibold transition-colors">Privacy Policy</a>
                        </div>
                    </label>
                </div>

                <!-- Register Button -->
                <div class="animate-fade-in-up delay-800">
                    <button 
                        type="submit" 
                        class="modern-button w-full group relative overflow-hidden"
                        wire:loading.attr="disabled"
                        :disabled="!agreed"
                        :class="!agreed ? 'opacity-50 cursor-not-allowed' : ''"
                    >
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-purple-600 transition-all duration-300 group-hover:from-violet-700 group-hover:to-purple-700"></div>
                        <div class="relative z-10 flex items-center justify-center py-4 text-lg font-semibold text-white">
                            <span wire:loading.remove class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Create Account
                            </span>
                            <span wire:loading class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Creating Account...
                            </span>
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <!-- Login Link -->
        <div class="text-center animate-fade-in-up delay-900">
            <div class="glass-card rounded-2xl p-6">
                <p class="text-slate-700 dark:text-slate-300 text-lg">
                    Already have an account?
                    <a 
                        href="{{ route('login') }}" 
                        wire:navigate 
                        class="text-violet-600 dark:text-violet-400 font-semibold hover:text-violet-700 dark:hover:text-violet-300 transition-colors duration-200 ml-2"
                    >
                        Sign In Here →
                    </a>
                </p>
            </div>
        </div>

        <!-- Social Login Options -->
        <div class="animate-fade-in-up delay-1000">
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center mb-6">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-300 dark:via-slate-600 to-transparent"></div>
                    <span class="px-4 text-slate-500 dark:text-slate-400 text-sm font-medium">Or continue with</span>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-300 dark:via-slate-600 to-transparent"></div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button class="social-button group">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span>Google</span>
                    </button>
                    <button class="social-button group">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Facebook</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function registerPageData() {
            return {
                init() {
                    // Add any initialization logic here
                }
            }
        }
    </script>

    <!-- Enhanced Styles -->
    <style>
        /* Glass Effect Classes */
        .glass-effect-luxury {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .dark .glass-effect-luxury {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .glass-effect-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .dark .glass-effect-card {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Modern Form Elements */
        .modern-input {
            width: 100%;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            border: 2px solid rgba(148, 163, 184, 0.3);
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            outline: none;
        }
        
        .dark .modern-input {
            background: rgba(15, 23, 42, 0.8);
            border-color: rgba(100, 116, 139, 0.3);
            color: white;
        }
        
        .modern-input:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            transform: translateY(-2px);
        }
        
        .modern-label {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
            font-size: 0.875rem;
            pointer-events: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .modern-input:focus + .modern-label,
        .modern-input:not(:placeholder-shown) + .modern-label {
            top: -0.5rem;
            left: 1rem;
            font-size: 0.75rem;
            background: white;
            -webkit-background-clip: initial;
            -webkit-text-fill-color: initial;
            color: #8b5cf6;
            padding: 0 0.5rem;
        }
        
        .dark .modern-input:focus + .modern-label,
        .dark .modern-input:not(:placeholder-shown) + .modern-label {
            background: #0f172a;
        }
        
        .modern-input-border {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #8b5cf6, #7c3aed);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .modern-input:focus ~ .modern-input-border {
            transform: scaleX(1);
        }

        /* Modern Button */
        .modern-button {
            padding: 1rem 2rem;
            border-radius: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .modern-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.3);
        }
        
        .modern-button:active {
            transform: translateY(0);
        }

        /* Social Buttons */
        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            space-x: 0.5rem;
            padding: 0.75rem 1rem;
            border: 2px solid rgba(148, 163, 184, 0.2);
            border-radius: 0.75rem;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            color: #374151;
        }
        
        .dark .social-button {
            background: rgba(15, 23, 42, 0.8);
            border-color: rgba(100, 116, 139, 0.2);
            color: #d1d5db;
        }
        
        .social-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: #8b5cf6;
        }

        /* Floating Particles */
        .floating-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(139, 92, 246, 0.6);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Animations */
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes scale-in-bounce {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
        
        .animate-scale-in-bounce {
            animation: scale-in-bounce 0.8s ease-out;
        }
        
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }
        .delay-900 { animation-delay: 0.9s; }
        .delay-1000 { animation-delay: 1s; }

        .elegant-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</div>
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