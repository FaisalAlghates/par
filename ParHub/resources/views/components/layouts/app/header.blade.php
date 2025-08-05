<!-- Cyberpunk Header -->
<header x-data="{ searchOpen: false, notificationsOpen: false }" 
        class="sticky top-0 z-40 w-full">
    <!-- Background with cyberpunk effects -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-800/95 to-slate-900/95 backdrop-blur-xl">
        <!-- Animated circuit lines -->
        <div class="absolute inset-0 opacity-[0.02]">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"%3E%3Cpath d="M0 10h20l5-5h20l5 5h20l5-5h20l5 5h10" stroke="%2300ffff" stroke-width="0.5" fill="none"/%3E%3C/svg%3E')] bg-repeat-x"></div>
        </div>
        
        <!-- Glowing border -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>
    </div>

    <!-- Header content -->
    <div class="relative flex items-center justify-between px-6 lg:px-8 h-16">
        
        <!-- Left side - Mobile menu and logo -->
        <div class="flex items-center space-x-4">
            <!-- Mobile menu button -->
            <button @click="$store.sidebar.toggle()" 
                    class="lg:hidden p-2 rounded-lg bg-slate-800/60 text-cyan-300 border border-cyan-500/30 hover:bg-slate-700/60 hover:border-cyan-400/50 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Neural status indicator -->
            <div class="hidden md:flex items-center space-x-3 px-4 py-2 rounded-lg bg-slate-800/60 border border-emerald-500/30">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-lg shadow-emerald-400/50"></div>
                    <span class="text-emerald-300 text-sm font-medium">NEURAL LINK</span>
                </div>
                <div class="w-px h-4 bg-slate-600"></div>
                <span class="text-cyan-300 text-sm font-mono">{{ now()->format('H:i:s') }}</span>
            </div>
        </div>

        <!-- Center - Search -->
        <div class="flex-1 max-w-2xl mx-8">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" 
                       placeholder="Search neural networks..." 
                       class="cyber-search-input">
                <div class="absolute inset-y-0 right-0 flex items-center">
                    <div class="flex items-center space-x-1 px-3 py-1 bg-slate-700/50 rounded-lg mr-2">
                        <span class="text-xs text-slate-400 font-mono">Ctrl</span>
                        <span class="text-xs text-slate-400">+</span>
                        <span class="text-xs text-slate-400 font-mono">K</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side - Actions and user -->
        <div class="flex items-center space-x-4">
            
            <!-- Quantum notifications -->
            <div class="relative" x-data="{ notificationsOpen: false }">
                <button @click="notificationsOpen = !notificationsOpen"
                        class="cyber-header-button relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <!-- Notification pulse -->
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-purple-500 rounded-full border-2 border-slate-900 animate-pulse shadow-lg shadow-purple-500/50">
                        <div class="absolute inset-0 bg-purple-400 rounded-full animate-ping"></div>
                    </div>
                </button>

                <!-- Notifications Dropdown -->
                <div x-show="notificationsOpen"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-1"
                     @click.away="notificationsOpen = false"
                     class="cyber-dropdown right-0 mt-2 w-80">
                    
                    <div class="cyber-dropdown-header">
                        <h3 class="cyber-dropdown-title">Neural Alerts</h3>
                        <span class="cyber-notification-count">3</span>
                    </div>

                    <div class="cyber-dropdown-content">
                        <!-- Notification 1 -->
                        <div class="cyber-notification-item">
                            <div class="cyber-notification-icon bg-blue-500">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="cyber-notification-content">
                                <p class="cyber-notification-title">Neural sync completed</p>
                                <p class="cyber-notification-desc">Your presentation "Quantum Strategy" is now live</p>
                                <p class="cyber-notification-time">2 minutes ago</p>
                            </div>
                        </div>

                        <!-- Notification 2 -->
                        <div class="cyber-notification-item">
                            <div class="cyber-notification-icon bg-green-500">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="cyber-notification-content">
                                <p class="cyber-notification-title">Quantum threshold reached</p>
                                <p class="cyber-notification-desc">1000+ neural transmissions achieved</p>
                                <p class="cyber-notification-time">1 hour ago</p>
                            </div>
                        </div>

                        <!-- Notification 3 -->
                        <div class="cyber-notification-item">
                            <div class="cyber-notification-icon bg-purple-500">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="cyber-notification-content">
                                <p class="cyber-notification-title">Collaboration request</p>
                                <p class="cyber-notification-desc">Sarah invited you to "Neural Workshop"</p>
                                <p class="cyber-notification-time">3 hours ago</p>
                            </div>
                        </div>
                    </div>

                    <div class="cyber-dropdown-footer">
                        <button class="cyber-dropdown-button">View All Alerts</button>
                    </div>
                </div>
            </div>

            <!-- AI Assistant -->
            <button class="cyber-header-button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </button>

            <!-- Settings -->
            <button class="cyber-header-button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>

            <!-- User Profile -->
            <div class="relative" x-data="{ userMenuOpen: false }">
                <button @click="userMenuOpen = !userMenuOpen"
                        class="cyber-user-button">
                    <div class="w-8 h-8 bg-gradient-to-br from-cyan-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold shadow-lg">
                        F
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500 to-purple-600 rounded-lg animate-ping opacity-20"></div>
                    </div>
                    <span class="hidden md:block text-cyan-300 font-medium">Faisal</span>
                    <svg class="w-4 h-4 text-slate-400" :class="userMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- User Dropdown -->
                <div x-show="userMenuOpen"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-1"
                     @click.away="userMenuOpen = false"
                     class="cyber-dropdown right-0 mt-2 w-56">
                    
                    <div class="cyber-dropdown-header">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold">
                                F
                            </div>
                            <div>
                                <p class="cyber-dropdown-title text-sm">Faisal</p>
                                <p class="text-xs text-slate-400">Neural Operator</p>
                            </div>
                        </div>
                    </div>

                    <div class="cyber-dropdown-content">
                        <a href="/profile" class="cyber-dropdown-item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Neural Profile
                        </a>
                        
                        <a href="/settings" class="cyber-dropdown-item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            </svg>
                            System Config
                        </a>
                        
                        <a href="/billing" class="cyber-dropdown-item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Quantum Credits
                        </a>

                        <div class="border-t border-slate-700/50 my-2"></div>

                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="cyber-dropdown-item text-red-400 hover:text-red-300 w-full text-left">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Neural Disconnect
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Cyberpunk Header Styles -->
    <style>
        /* Search Input */
        .cyber-search-input {
            @apply w-full pl-10 pr-20 py-3 bg-slate-800/60 border border-slate-600/50;
            @apply rounded-xl text-white placeholder-slate-400;
            @apply focus:outline-none focus:border-cyan-500/50 focus:bg-slate-800/80;
            @apply transition-all duration-300;
            backdrop-filter: blur(10px);
        }

        .cyber-search-input:focus {
            box-shadow: 0 0 0 1px rgba(6, 182, 212, 0.3), 0 0 20px rgba(6, 182, 212, 0.1);
        }

        /* Header Buttons */
        .cyber-header-button {
            @apply p-2.5 rounded-lg bg-slate-800/60 text-slate-300 border border-slate-600/50;
            @apply hover:bg-slate-700/60 hover:border-cyan-500/50 hover:text-cyan-300;
            @apply transition-all duration-300 relative;
        }

        .cyber-user-button {
            @apply flex items-center space-x-3 p-2 rounded-lg bg-slate-800/60 border border-slate-600/50;
            @apply hover:bg-slate-700/60 hover:border-cyan-500/50 transition-all duration-300 relative;
        }

        /* Dropdowns */
        .cyber-dropdown {
            @apply absolute bg-slate-900/95 backdrop-blur-xl border border-cyan-500/30 rounded-xl shadow-2xl;
            @apply z-50 overflow-hidden;
        }

        .cyber-dropdown-header {
            @apply px-4 py-3 border-b border-slate-700/50 bg-slate-800/50;
        }

        .cyber-dropdown-title {
            @apply font-semibold text-white;
        }

        .cyber-dropdown-content {
            @apply py-2;
        }

        .cyber-dropdown-footer {
            @apply px-4 py-3 border-t border-slate-700/50 bg-slate-800/50;
        }

        .cyber-dropdown-item {
            @apply flex items-center space-x-3 px-4 py-2 text-sm text-slate-300;
            @apply hover:bg-slate-800/60 hover:text-cyan-300 transition-colors duration-200;
        }

        .cyber-dropdown-button {
            @apply w-full text-center py-2 text-sm text-cyan-400 hover:text-cyan-300;
            @apply border border-cyan-500/30 rounded-lg hover:bg-cyan-500/10 transition-all duration-200;
        }

        /* Notifications */
        .cyber-notification-count {
            @apply inline-flex items-center justify-center w-6 h-6 bg-purple-500 text-white text-xs font-bold rounded-full;
        }

        .cyber-notification-item {
            @apply flex items-start space-x-3 px-4 py-3 hover:bg-slate-800/60 transition-colors duration-200;
        }

        .cyber-notification-icon {
            @apply w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0;
        }

        .cyber-notification-content {
            @apply flex-1 min-w-0;
        }

        .cyber-notification-title {
            @apply font-medium text-white text-sm;
        }

        .cyber-notification-desc {
            @apply text-slate-400 text-xs mt-1;
        }

        .cyber-notification-time {
            @apply text-slate-500 text-xs mt-1;
        }
    </style>
</header>
