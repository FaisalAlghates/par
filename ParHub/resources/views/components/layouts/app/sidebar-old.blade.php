<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
        <!-- Modern Sidebar with Glass Effect -->
        <div x-data="{ sidebarOpen: false }" class="flex h-screen">
            <!-- Sidebar -->
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
                 class="fixed inset-y-0 left-0 z-50 w-72 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
                
                <!-- Sidebar Background with Glass Effect -->
                <div class="flex h-full flex-col glass-effect backdrop-blur-xl bg-white/80 dark:bg-slate-900/80 border-r border-white/20 dark:border-slate-700/50">
                    
                    <!-- Logo Section -->
                    <div class="flex items-center justify-between p-6 border-b border-white/20 dark:border-slate-700/50">
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3" wire:navigate>
                            <x-app-logo class="w-10 h-10" />
                            <div>
                                <h2 class="text-xl font-bold gradient-text">ParHub</h2>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Presentation Platform</p>
                            </div>
                        </a>
                        <button @click="sidebarOpen = false" class="lg:hidden p-2 rounded-lg hover:bg-white/20 dark:hover:bg-slate-800/50 transition-colors">
                            <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Quick Actions -->
                    <div class="p-4 border-b border-white/20 dark:border-slate-700/50">
                        <a href="/presentations/create" class="flex items-center w-full px-4 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 elegant-shadow">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="font-medium">New Presentation</span>
                        </a>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                        
                        <!-- Main Navigation -->
                        <div class="space-y-1">
                            <h3 class="px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">Main</h3>
                            
                            <!-- Dashboard -->
                            <a href="{{ route('dashboard') }}" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}" 
                               wire:navigate>
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5v4l2 2 2-2V5"></path>
                                </svg>
                                Dashboard
                            </a>

                            <!-- My Presentations -->
                            <a href="/presentations" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('presentations*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                My Presentations
                                <span class="ml-auto bg-violet-100 dark:bg-violet-900/50 text-violet-600 dark:text-violet-400 text-xs px-2 py-1 rounded-full">12</span>
                            </a>

                            <!-- Templates -->
                            <a href="/templates" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('templates*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                                Templates
                                <span class="ml-auto bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 text-xs px-2 py-1 rounded-full">New</span>
                            </a>

                            <!-- Analytics -->
                            <a href="/analytics" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('analytics*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Analytics
                            </a>
                        </div>

                        <!-- Content Management -->
                        <div class="space-y-1 pt-6">
                            <h3 class="px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">Content</h3>
                            
                            <!-- Media Library -->
                            <a href="/media" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('media*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Media Library
                            </a>

                            <!-- Shared Files -->
                            <a href="/shared" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('shared*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                Shared with Me
                            </a>

                            <!-- Trash -->
                            <a href="/trash" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('trash*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Trash
                                <span class="ml-auto bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 text-xs px-2 py-1 rounded-full">3</span>
                            </a>
                        </div>

                        <!-- Tools & Resources -->
                        <div class="space-y-1 pt-6">
                            <h3 class="px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">Tools</h3>
                            
                            <!-- AI Assistant -->
                            <a href="/ai-assistant" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('ai-assistant*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                AI Assistant
                                <span class="ml-auto bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 text-xs px-2 py-1 rounded-full">Beta</span>
                            </a>

                            <!-- Import/Export -->
                            <a href="/import-export" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('import-export*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                                Import/Export
                            </a>

                            <!-- Help & Support -->
                            <a href="/help" 
                               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('help*') ? 'bg-gradient-to-r from-violet-600/20 to-purple-600/20 text-violet-700 dark:text-violet-300 border-l-4 border-violet-600' : 'text-slate-700 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Help & Support
                            </a>
                        </div>
                    </nav>

                    <!-- Storage Usage -->
                    <div class="p-4 border-t border-white/20 dark:border-slate-700/50">
                        <div class="bg-gradient-to-r from-violet-50 to-purple-50 dark:from-violet-900/20 dark:to-purple-900/20 rounded-lg p-3">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Storage Used</span>
                                <span class="text-xs font-bold text-violet-600 dark:text-violet-400">2.3 GB / 5 GB</span>
                            </div>
                            <div class="w-full bg-white/50 dark:bg-slate-700/50 rounded-full h-2">
                                <div class="bg-gradient-to-r from-violet-600 to-purple-600 h-2 rounded-full" style="width: 46%"></div>
                                </div>
                        <a href="/upgrade" class="inline-flex items-center text-xs text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 mt-2 font-medium">
                            Upgrade Storage
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- User Profile Section -->
                    <div class="p-4 border-t border-white/20 dark:border-slate-700/50">
                        <div class="flex items-center space-x-3 p-3 rounded-xl bg-gradient-to-r from-white/50 to-white/30 dark:from-slate-800/50 dark:to-slate-800/30 hover:from-white/70 hover:to-white/50 dark:hover:from-slate-700/50 dark:hover:to-slate-700/30 transition-all duration-200 cursor-pointer" 
                             x-data="{ profileOpen: false }" @click="profileOpen = !profileOpen">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-violet-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm elegant-shadow">
                                    {{ auth()->user()->initials() }}
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white truncate">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-slate-400 dark:text-slate-500 transition-transform" 
                                 :class="profileOpen ? 'rotate-180' : ''" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>

                        <!-- Profile Dropdown -->
                        <div x-show="profileOpen" x-collapse class="mt-2 space-y-1">
                            <a href="{{ route('settings.profile') }}" 
                               class="flex items-center px-3 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-lg transition-colors" 
                               wire:navigate>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                            
                            <a href="/profile" 
                               class="flex items-center px-3 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                My Profile
                            </a>
                            
                            <a href="/billing" 
                               class="flex items-center px-3 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Billing
                            </a>
                            
                            <hr class="border-white/20 dark:border-slate-700/50 my-2">
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="flex items-center w-full px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Overlay -->
            <div x-show="sidebarOpen" 
                 @click="sidebarOpen = false" 
                 class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm lg:hidden"
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col lg:ml-0">
                <!-- Mobile Header -->
                <header class="lg:hidden bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-white/20 dark:border-slate-700/50 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <button @click="sidebarOpen = true" 
                                class="p-2 rounded-lg hover:bg-white/50 dark:hover:bg-slate-800/50 transition-colors">
                            <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                            <x-app-logo class="w-8 h-8" />
                            <span class="text-lg font-bold gradient-text">ParHub</span>
                        </a>
                        
                        <div class="w-10"></div> <!-- Spacer for centering -->
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-hidden">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- Alpine.js and Scripts -->
        @fluxScripts
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Custom Styles -->
        <style>
            .glass-effect {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .dark .glass-effect {
                background: rgba(15, 23, 42, 0.8);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .elegant-shadow {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }
            
            .dark .elegant-shadow {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }
            
            .gradient-text {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .dark .gradient-text {
                background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            /* Custom Scrollbar */
            .overflow-y-auto::-webkit-scrollbar {
                width: 4px;
            }
            
            .overflow-y-auto::-webkit-scrollbar-track {
                background: transparent;
            }
            
            .overflow-y-auto::-webkit-scrollbar-thumb {
                background: rgba(148, 163, 184, 0.3);
                border-radius: 2px;
            }
            
            .dark .overflow-y-auto::-webkit-scrollbar-thumb {
                background: rgba(71, 85, 105, 0.5);
            }
            
            .overflow-y-auto::-webkit-scrollbar-thumb:hover {
                background: rgba(148, 163, 184, 0.5);
            }
            
            .dark .overflow-y-auto::-webkit-scrollbar-thumb:hover {
                background: rgba(71, 85, 105, 0.7);
            }
        </style>
    </body>
</html>