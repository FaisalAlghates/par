<div x-data="{ darkMode: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true'" :class="{ 'dark': darkMode }" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-gradient-to-br from-violet-400/20 to-purple-600/20 rounded-full filter blur-3xl floating-animation"></div>
        <div class="absolute top-1/2 -right-10 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute -bottom-10 left-1/2 w-36 h-36 bg-gradient-to-br from-emerald-400/20 to-teal-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text">DocuMagic AI</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/dashboard" class="text-slate-600 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">Dashboard</a>
                    <a href="/documentations/create" class="text-slate-600 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">Upload Document</a>
                    <a href="/presentations" class="text-slate-600 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">My Presentations</a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        {{ auth()->user()->initials() }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Settings Navigation -->
            <div class="mb-8">
                <nav class="flex space-x-8">
                    <a href="/settings/profile" class="px-4 py-2 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl font-medium">Profile</a>
                    <a href="/settings/password" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300">Password</a>
                    <a href="/settings/appearance" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300">Appearance</a>
                </nav>
            </div>

            <!-- Profile Settings Card -->
            <div class="glass-effect rounded-3xl p-8 elegant-shadow">
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 elegant-shadow floating-animation">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
                        Profile <span class="gradient-text">Settings</span>
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400">
                        Update your name and email address
                    </p>
                </div>

                <!-- Profile Form -->
                <form wire:submit="updateProfileInformation" class="space-y-6">
                    
                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Full Name
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input 
                                wire:model="name"
                                type="text" 
                                id="name"
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Enter your full name"
                                class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-violet-500 text-slate-900 dark:text-white placeholder-slate-500 backdrop-blur-sm transition-all duration-200"
                            >
                        </div>
                        @error('name') 
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input 
                                wire:model="email"
                                type="email" 
                                id="email"
                                required 
                                autocomplete="email"
                                placeholder="email@example.com"
                                class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-violet-500 text-slate-900 dark:text-white placeholder-slate-500 backdrop-blur-sm transition-all duration-200"
                            >
                        </div>
                        @error('email') 
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Verification Notice -->
                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                        <div class="p-4 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-amber-600 dark:text-amber-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm text-amber-700 dark:text-amber-300 mb-2">
                                        Your email address is unverified.
                                    </p>
                                    <button type="button" wire:click.prevent="resendVerificationNotification" class="text-sm text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 transition-colors underline">
                                        Click here to re-send the verification email.
                                    </button>
                                </div>
                            </div>
                            
                            @if (session('status') === 'verification-link-sent')
                                <div class="mt-3 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                                    <p class="text-sm text-green-700 dark:text-green-300">
                                        A new verification link has been sent to your email address.
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="flex items-center gap-4 pt-2">
                        <button 
                            type="submit" 
                            wire:loading.attr="disabled"
                            wire:target="updateProfileInformation"
                            class="flex-1 group relative overflow-hidden px-6 py-4 bg-gradient-to-r from-violet-600 to-purple-600 text-white text-lg font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] glow hover:from-violet-700 hover:to-purple-700 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span wire:loading.remove wire:target="updateProfileInformation" class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Save Changes
                            </span>
                            
                            <span wire:loading wire:target="updateProfileInformation" class="flex items-center justify-center">
                                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Saving Changes...
                            </span>
                        </button>

                        <!-- Success Message -->
                        <x-action-message class="text-green-600 dark:text-green-400 font-medium" on="profile-updated">
                            Saved!
                        </x-action-message>
                    </div>
                </form>

                <!-- Delete Account Section -->
                <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                    <livewire:settings.delete-user-form />
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .elegant-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .glow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</div>
