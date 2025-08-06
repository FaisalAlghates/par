<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        @livewireStyles
    </head>
    <body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900 scroll-smooth">
        <!-- Modern Sidebar with Enhanced Glass Effect -->
        <div x-data="{ 
            sidebarOpen: false,
            profileOpen: false,
            currentTime: new Date().toLocaleTimeString(),
            darkMode: localStorage.getItem('darkMode') === 'true' || false
        }" 
        x-init="setInterval(() => currentTime = new Date().toLocaleTimeString(), 1000)" 
        class="flex h-screen">
            
            <!-- Mobile Sidebar Overlay -->
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="sidebarOpen = false"
                 class="fixed inset-0 z-40 bg-slate-900/80 backdrop-blur-sm lg:hidden"></div>
            
            <!-- Sidebar -->
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
                 class="fixed inset-y-0 left-0 z-50 w-80 transform transition-all duration-500 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
                
                <!-- Sidebar Background with Enhanced Glass Effect -->
                <div class="flex h-full flex-col sidebar-glass backdrop-blur-xl bg-white/85 dark:bg-slate-900/85 border-r border-white/30 dark:border-slate-700/30 elegant-shadow">
                    
                    <!-- Enhanced Logo Section -->
                    <div class="relative p-6 border-b border-white/20 dark:border-slate-700/30">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-500/5 via-purple-500/5 to-pink-500/5"></div>
                        
                        <div class="relative flex items-center justify-between">
                            <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 group" wire:navigate>
                                <div class="relative">
                                    <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 elegant-shadow">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full animate-pulse"></div>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold gradient-text-purple">ParHub</h2>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 font-medium">Presentation Hub</p>
                                </div>
                            </a>
                            
                            <!-- Close Button for Mobile -->
                            <button x-show="sidebarOpen" 
                                    @click="sidebarOpen = false" 
                                    class="lg:hidden p-2 rounded-xl hover:bg-white/20 dark:hover:bg-slate-800/50 transition-all duration-200 group">
                                <svg class="w-6 h-6 text-slate-600 dark:text-slate-400 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- User Info -->
                        <div class="mt-4 flex items-center space-x-3 p-3 rounded-xl bg-white/30 dark:bg-slate-800/30 border border-white/20 dark:border-slate-700/30">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400" x-text="currentTime"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Quick Actions -->
                    <div class="p-4 border-b border-white/20 dark:border-slate-700/30">
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('presentations.create') }}" class="flex flex-col items-center p-3 bg-gradient-to-br from-violet-600 to-purple-600 text-white rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 elegant-shadow group">
                                <svg class="w-6 h-6 mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="text-xs font-medium">New</span>
                            </a>
                            <a href="{{ route('templates.index') }}" class="flex flex-col items-center p-3 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 elegant-shadow group">
                                <svg class="w-6 h-6 mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                                <span class="text-xs font-medium">Templates</span>
                            </a>
                        </div>
                    </div>

                    <!-- Enhanced Navigation Menu -->
                    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto sidebar-scroll custom-scrollbar scroll-smooth">
                        
                        <!-- Main Navigation -->
                        <div class="space-y-2">
                            <h3 class="px-3 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-4 flex items-center">
                                <span class="w-8 h-px bg-gradient-to-r from-violet-500 to-transparent mr-2"></span>
                                Main
                            </h3>
                            
                            <!-- Dashboard -->
                            <a href="{{ route('dashboard') }}" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}" 
                               wire:navigate>
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'bg-violet-100 dark:bg-violet-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-violet-600 dark:text-violet-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5v4l2 2 2-2V5"></path>
                                    </svg>
                                </div>
                                <span>Dashboard</span>
                                @if(request()->routeIs('dashboard'))
                                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                @endif
                            </a>

                            <!-- My Presentations -->
                            <a href="{{ route('presentations.index') }}" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->is('presentations*') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->is('presentations*') ? 'bg-white/20' : 'bg-blue-100 dark:bg-blue-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->is('presentations*') ? 'text-white' : 'text-blue-600 dark:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="flex-1">My Presentations</span>
                                <span class="bg-violet-100 dark:bg-violet-900/50 text-violet-600 dark:text-violet-400 text-xs px-2 py-1 rounded-full font-medium">{{ \App\Models\Presentation::count() }}</span>
                            </a>

                            <!-- Analytics -->
                            <a href="{{ route('dashboard.analytics') }}" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.analytics') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard.analytics') ? 'bg-white/20' : 'bg-emerald-100 dark:bg-emerald-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard.analytics') ? 'text-white' : 'text-emerald-600 dark:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <span>Analytics</span>
                                @if(request()->routeIs('dashboard.analytics'))
                                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                @endif
                            </a>
                        </div>

                        <!-- Content Management -->
                        <div class="space-y-2">
                            <h3 class="px-3 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-4 flex items-center">
                                <span class="w-8 h-px bg-gradient-to-r from-blue-500 to-transparent mr-2"></span>
                                Content
                            </h3>
                            
                            <!-- Media Library -->
                            <a href="{{ route('media.index') }}" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->is('media*') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->is('media*') ? 'bg-white/20' : 'bg-orange-100 dark:bg-orange-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->is('media*') ? 'text-white' : 'text-orange-600 dark:text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Media Library</span>
                            </a>

                            <!-- Shared Files -->
                            <a href="{{ route('shared.index') }}" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->is('shared*') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->is('shared*') ? 'bg-white/20' : 'bg-teal-100 dark:bg-teal-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->is('shared*') ? 'text-white' : 'text-teal-600 dark:text-teal-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                </div>
                                <span>Shared with Me</span>
                            </a>
                        </div>

                        <!-- Tools & Resources -->
                        <div class="space-y-2">
                            <h3 class="px-3 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-4 flex items-center">
                                <span class="w-8 h-px bg-gradient-to-r from-emerald-500 to-transparent mr-2"></span>
                                Tools
                            </h3>
                            
                            <!-- AI Assistant -->
                            <a href="/ai-assistant" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->is('ai-assistant*') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->is('ai-assistant*') ? 'bg-white/20' : 'bg-gradient-to-br from-pink-100 to-purple-100 dark:from-pink-900/30 dark:to-purple-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->is('ai-assistant*') ? 'text-white' : 'text-pink-600 dark:text-pink-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <span class="flex-1">AI Assistant</span>
                                <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-xs px-2 py-1 rounded-full font-medium animate-pulse">Beta</span>
                            </a>

                            <!-- Help & Support -->
                            <a href="/help" 
                               class="nav-item-luxury flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->is('help*') ? 'bg-gradient-to-r from-violet-600 to-purple-600 text-white shadow-lg shadow-violet-500/25' : 'text-slate-700 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60' }}">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 {{ request()->is('help*') ? 'bg-white/20' : 'bg-indigo-100 dark:bg-indigo-900/30' }}">
                                    <svg class="w-5 h-5 {{ request()->is('help*') ? 'text-white' : 'text-indigo-600 dark:text-indigo-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Help & Support</span>
                            </a>

                            <!-- Logout -->
                            <div class="space-y-2">
                                <!-- Quick Logout (No Confirmation) -->
                                <form method="POST" action="{{ route('logout') }}" class="w-full" id="quick-logout-form">
                                    @csrf
                                    <button type="submit" 
                                            onclick="fastLogout(); return false;"
                                            class="nav-item-luxury flex items-center w-full px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 group shadow-lg">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 bg-white/20 group-hover:bg-white/30 transition-colors duration-300">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <span class="font-semibold">Quick Logout</span>
                                        <div class="ml-auto">
                                            <svg class="w-4 h-4 text-white/70 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                                
                                <!-- Regular Logout (With Confirmation) -->
                                <form method="POST" action="{{ route('logout') }}" class="w-full" id="logout-form">
                                    @csrf
                                    <button type="submit" 
                                            onclick="return confirmLogout()"
                                            class="nav-item-luxury flex items-center w-full px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-700 dark:hover:text-red-300 group">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3 bg-red-100 dark:bg-red-900/30 group-hover:bg-red-200 dark:group-hover:bg-red-900/50 transition-colors duration-300">
                                            <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <span>Safe Logout</span>
                                        <div class="ml-auto">
                                            <svg class="w-4 h-4 text-red-400 group-hover:text-red-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </nav>

                    <!-- Sidebar Footer with Enhanced Design -->
                    <div class="border-t border-white/20 dark:border-slate-700/50 bg-gradient-to-t from-white/40 to-transparent dark:from-slate-800/40">
                        <!-- Storage Usage with Glass Effect -->
                        <div class="p-4">
                            <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl p-4 mb-4 border border-white/30 dark:border-slate-700/30 shadow-lg">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Storage Used
                                    </span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">46% of 5GB</span>
                                </div>
                                <!-- Enhanced Progress Bar -->
                                <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-3 overflow-hidden shadow-inner">
                                    <div class="h-full bg-gradient-to-r from-violet-500 via-purple-500 to-pink-500 rounded-full relative shadow-lg" style="width: 46%">
                                        <div class="absolute inset-0 bg-white/20 rounded-full animate-pulse"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between text-xs text-slate-500 dark:text-slate-400 mt-2 font-medium">
                                    <span>2.3 GB used</span>
                                    <span>2.7 GB free</span>
                                </div>
                                <a href="/upgrade" class="inline-flex items-center text-xs text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 mt-3 font-medium">
                                    Upgrade Storage
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Enhanced User Profile Section -->
                        <div class="p-4 border-t border-white/20 dark:border-slate-700/50">
                            <div class="flex items-center space-x-3 p-3 rounded-xl bg-gradient-to-r from-white/60 to-white/40 dark:from-slate-800/60 dark:to-slate-800/40 hover:from-white/80 hover:to-white/60 dark:hover:from-slate-700/60 dark:hover:to-slate-700/40 transition-all duration-300 cursor-pointer shadow-lg" 
                                 @click="profileOpen = !profileOpen">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm elegant-shadow ring-2 ring-white/20 dark:ring-slate-700/50">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-900 dark:text-white truncate">
                                        {{ auth()->user()->name }}
                                    </p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                                        {{ auth()->user()->email }}
                                    </p>
                                    <div class="flex items-center mt-1 space-x-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                        <span class="text-xs text-green-600 dark:text-green-400 font-medium">Online</span>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 dark:text-slate-500 transition-transform duration-200" 
                                     :class="profileOpen ? 'rotate-180' : ''" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <!-- Enhanced Profile Dropdown -->
                            <div x-show="profileOpen" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="mt-3 space-y-1 bg-white/40 dark:bg-slate-800/40 backdrop-blur-sm rounded-xl p-2 border border-white/30 dark:border-slate-700/30">
                                <a href="{{ route('settings.profile') }}" 
                                   class="flex items-center px-3 py-2.5 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60 rounded-lg transition-all duration-200 group" 
                                   wire:navigate>
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Settings</span>
                                </a>
                                
                                <a href="/profile" 
                                   class="flex items-center px-3 py-2.5 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60 rounded-lg transition-all duration-200 group">
                                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium">My Profile</span>
                                </a>
                                
                                <a href="/billing" 
                                   class="flex items-center px-3 py-2.5 text-sm text-slate-600 dark:text-slate-300 hover:bg-white/60 dark:hover:bg-slate-800/60 rounded-lg transition-all duration-200 group">
                                    <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Billing</span>
                                </a>
                                
                                <hr class="border-white/30 dark:border-slate-700/50 my-4">
                                
                                <!-- User Info Section -->
                                <div class="bg-gradient-to-r from-violet-500/10 to-purple-500/10 backdrop-blur-sm rounded-xl p-4 mb-4 border border-white/20 dark:border-slate-700/30">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                            {{ substr(auth()->user()->name, 0, 1) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 truncate">
                                                {{ auth()->user()->name }}
                                            </p>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                                                {{ auth()->user()->email }}
                                            </p>
                                        </div>
                                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- App Version & Copyright -->
                            <div class="mt-4 pt-3 border-t border-white/20 dark:border-slate-700/50 text-center">
                                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-1">ParHub v2.1.0</p>
                                <p class="text-xs text-slate-400 dark:text-slate-500">© 2024 ParHub Team</p>
                            </div>
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
                            <div class="w-8 h-8 bg-gradient-to-br from-violet-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-bold gradient-text">ParHub</span>
                        </a>
                        
                        <!-- Mobile Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" 
                                    onclick="return confirmLogout()"
                                    class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors group">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400 group-hover:text-red-700 dark:group-hover:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-hidden scroll-container">
                    <div class="h-full overflow-y-auto scroll-smooth">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        <!-- Scripts -->
        @fluxScripts
        
        <!-- Logout Confirmation Script -->
        <script>
            // Fast logout function (no confirmation, immediate)
            function fastLogout() {
                // Show loading immediately
                const btn = event.target.closest('button');
                if (btn) {
                    btn.innerHTML = '<span class="flex items-center justify-center"><svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Logging out...</span>';
                    btn.disabled = true;
                }
                
                // Use quick logout route
                window.location.href = '{{ route("quick.logout") }}';
                return false;
            }

            function confirmLogout() {
                const confirmed = confirm('Are you sure you want to logout?\n\nThis will end your session.');
                
                if (confirmed) {
                    // Show loading state
                    const btn = event.target.closest('button');
                    if (btn) {
                        btn.innerHTML = `
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 text-current animate-spin mr-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Logging out...</span>
                            </div>
                        `;
                        btn.disabled = true;
                    }
                    
                    return true;
                }
                return false;
            }
            
            // Keyboard shortcut for quick logout (Ctrl+Shift+L)
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.shiftKey && e.key === 'L') {
                    e.preventDefault();
                    fastLogout();
                }
            });
        </script>
        
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
            
            /* Enhanced Navigation Item Styling */
            .nav-item-luxury {
                position: relative;
                overflow: hidden;
            }
            
            .nav-item-luxury::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
                transition: left 0.5s;
            }
            
            .nav-item-luxury:hover::before {
                left: 100%;
            }
            
            /* Custom Scrollbar with Enhanced Design */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }
            
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
                border-radius: 3px;
            }
            
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: linear-gradient(to bottom, rgba(139, 92, 246, 0.3), rgba(168, 85, 247, 0.3));
                border-radius: 3px;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .dark .custom-scrollbar::-webkit-scrollbar-thumb {
                background: linear-gradient(to bottom, rgba(71, 85, 105, 0.5), rgba(100, 116, 139, 0.5));
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
            
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(to bottom, rgba(139, 92, 246, 0.5), rgba(168, 85, 247, 0.5));
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(to bottom, rgba(71, 85, 105, 0.7), rgba(100, 116, 139, 0.7));
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            /* Animated Background Gradients */
            @keyframes gradient-shift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient-shift 8s ease infinite;
            }
            
            /* Glass morphism effect enhancement */
            .glass-morphism {
                background: rgba(255, 255, 255, 0.08);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 
                    0 8px 32px rgba(0, 0, 0, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.2);
            }
            
            .dark .glass-morphism {
                background: rgba(15, 23, 42, 0.4);
                border: 1px solid rgba(255, 255, 255, 0.05);
                box-shadow: 
                    0 8px 32px rgba(0, 0, 0, 0.3),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
            }
            
            /* Pulse animation for online status */
            @keyframes pulse-glow {
                0%, 100% {
                    opacity: 1;
                    transform: scale(1);
                }
                50% {
                    opacity: 0.7;
                    transform: scale(1.1);
                }
            }
            
            .animate-pulse-glow {
                animation: pulse-glow 2s ease-in-out infinite;
            }
            
            /* Enhanced hover effects */
            .hover-lift {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .hover-lift:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }
            
            .dark .hover-lift:hover {
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            }
        </style>
        @livewireScripts
    </body>
</html>