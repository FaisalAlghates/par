<div x-data="{ 
    darkMode: false,
    selectedTheme: 'system' 
}" x-init="
    darkMode = localStorage.getItem('darkMode') === 'true';
    selectedTheme = localStorage.getItem('selectedTheme') || 'system';
    updateTheme();
    
    function updateTheme() {
        if (selectedTheme === 'system') {
            darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        } else {
            darkMode = selectedTheme === 'dark';
        }
        localStorage.setItem('darkMode', darkMode);
        localStorage.setItem('selectedTheme', selectedTheme);
    }
" :class="{ 'dark': darkMode }" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
    
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
                    <a href="/settings/profile" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300">Profile</a>
                    <a href="/settings/password" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300">Password</a>
                    <a href="/settings/appearance" class="px-4 py-2 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl font-medium">Appearance</a>
                </nav>
            </div>

            <!-- Appearance Settings Card -->
            <div class="glass-effect rounded-3xl p-8 elegant-shadow">
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 elegant-shadow floating-animation">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5a2 2 0 00-2 2v12a4 4 0 004 4h2a2 2 0 002-2V5a2 2 0 00-2-2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
                        Appearance <span class="gradient-text">Settings</span>
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400">
                        Update the appearance settings for your account
                    </p>
                </div>

                <!-- Theme Selection -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Choose Theme</h3>
                    
                    <!-- Theme Options -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <!-- Light Theme -->
                        <div class="relative">
                            <input 
                                type="radio" 
                                id="light-theme" 
                                name="theme" 
                                value="light"
                                x-model="selectedTheme"
                                @change="updateTheme()"
                                class="sr-only peer"
                            >
                            <label for="light-theme" class="block cursor-pointer">
                                <div class="p-6 bg-white/50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 peer-checked:border-violet-500 peer-checked:bg-violet-50 dark:peer-checked:bg-violet-900/20 rounded-2xl transition-all duration-300 hover:border-violet-300 group">
                                    <!-- Theme Preview -->
                                    <div class="w-full h-20 bg-gradient-to-br from-slate-50 to-blue-50 rounded-lg mb-4 border border-slate-200 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Light</h4>
                                        <p class="text-sm text-slate-600 dark:text-slate-400">Clean bright interface</p>
                                    </div>
                                    <!-- Check Icon -->
                                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <div class="w-6 h-6 bg-violet-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Dark Theme -->
                        <div class="relative">
                            <input 
                                type="radio" 
                                id="dark-theme" 
                                name="theme" 
                                value="dark"
                                x-model="selectedTheme"
                                @change="updateTheme()"
                                class="sr-only peer"
                            >
                            <label for="dark-theme" class="block cursor-pointer">
                                <div class="p-6 bg-white/50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 peer-checked:border-violet-500 peer-checked:bg-violet-50 dark:peer-checked:bg-violet-900/20 rounded-2xl transition-all duration-300 hover:border-violet-300 group">
                                    <!-- Theme Preview -->
                                    <div class="w-full h-20 bg-gradient-to-br from-slate-900 to-slate-800 rounded-lg mb-4 border border-slate-700 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Dark</h4>
                                        <p class="text-sm text-slate-600 dark:text-slate-400">Easy on the eyes</p>
                                    </div>
                                    <!-- Check Icon -->
                                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <div class="w-6 h-6 bg-violet-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- System Theme -->
                        <div class="relative">
                            <input 
                                type="radio" 
                                id="system-theme" 
                                name="theme" 
                                value="system"
                                x-model="selectedTheme"
                                @change="updateTheme()"
                                class="sr-only peer"
                            >
                            <label for="system-theme" class="block cursor-pointer">
                                <div class="p-6 bg-white/50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 peer-checked:border-violet-500 peer-checked:bg-violet-50 dark:peer-checked:bg-violet-900/20 rounded-2xl transition-all duration-300 hover:border-violet-300 group">
                                    <!-- Theme Preview -->
                                    <div class="w-full h-20 bg-gradient-to-r from-slate-50 via-slate-400 to-slate-900 rounded-lg mb-4 border border-slate-300 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="font-semibold text-slate-900 dark:text-white mb-1">System</h4>
                                        <p class="text-sm text-slate-600 dark:text-slate-400">Match system preference</p>
                                    </div>
                                    <!-- Check Icon -->
                                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <div class="w-6 h-6 bg-violet-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Preview Section -->
                    <div class="mt-8 p-6 bg-white/30 dark:bg-slate-800/30 rounded-2xl border border-slate-200 dark:border-slate-700">
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Preview</h4>
                        <div class="space-y-4">
                            <!-- Sample Card -->
                            <div class="p-4 bg-white/50 dark:bg-slate-800/50 rounded-xl border border-slate-200 dark:border-slate-700">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 dark:text-white">Sample Document</h5>
                                        <p class="text-sm text-slate-600 dark:text-slate-400">This is how your content will appear</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sample Button -->
                            <button class="w-full px-6 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl font-medium hover:from-violet-700 hover:to-purple-700 transition-all duration-300">
                                Sample Action Button
                            </button>
                        </div>
                    </div>

                    <!-- Info Section -->
                    <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-blue-900 dark:text-blue-100 mb-1">Theme Settings</h4>
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    Your theme preference will be saved automatically and applied across all pages. 
                                    System theme will change based on your device's dark mode setting.
                                </p>
                            </div>
                        </div>
                    </div>
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
