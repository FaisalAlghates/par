<x-layouts.app :title="__('Dashboard')">
    <!-- Main Content with better spacing -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            
            <!-- Header with improved layout and quick stats -->
            <div class="mb-10">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h1 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white">
                                    Welcome back, <span class="gradient-text">{{ Auth::user()->name }}</span>
                                </h1>
                                <p class="text-slate-500 dark:text-slate-400 text-sm">
                                    Last login: {{ now()->format('M j, Y \a\t g:i A') }}
                                </p>
                            </div>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 text-lg">
                            Here's what's happening with your presentations today.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <button class="px-4 py-2 bg-white/50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300 rounded-lg hover:bg-white/70 dark:hover:bg-slate-800/70 transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span>AI Insights</span>
                        </button>
                        <a href="/presentations/create" class="px-6 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 flex items-center space-x-2 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="font-medium">New Presentation</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Summary Bar -->
                <div class="glass-effect rounded-xl p-4 mb-6">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-slate-900 dark:text-white">4</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Active Projects</div>
                            </div>
                            <div class="w-px h-8 bg-slate-300 dark:bg-slate-600"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">98%</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Completion Rate</div>
                            </div>
                            <div class="w-px h-8 bg-slate-300 dark:bg-slate-600"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">2.5h</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Avg. Time</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-slate-600 dark:text-slate-400">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span>All systems operational</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stats Grid with progress indicators -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
                <!-- Total Presentations -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:shadow-2xl transition-all duration-300 hover:scale-105 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1">12</div>
                            <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Total Presentations</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-emerald-600 dark:text-emerald-400 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +23% this month
                        </span>
                        <span class="text-slate-500 dark:text-slate-400">vs last month</span>
                    </div>
                </div>

                <!-- Total Views -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:shadow-2xl transition-all duration-300 hover:scale-105 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1">1,423</div>
                            <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Total Views</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-emerald-600 dark:text-emerald-400 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +15% today
                        </span>
                        <span class="text-slate-500 dark:text-slate-400">218 today</span>
                    </div>
                </div>

                <!-- This Week -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:shadow-2xl transition-all duration-300 hover:scale-105 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1">3</div>
                            <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Created This Week</div>
                        </div>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2 mb-2">
                        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 h-2 rounded-full" style="width: 60%"></div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-600 dark:text-slate-400">Goal: 5 per week</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-medium">60%</span>
                    </div>
                </div>

                <!-- Engagement Rate -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:shadow-2xl transition-all duration-300 hover:scale-105 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1">87%</div>
                            <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Engagement Rate</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-emerald-600 dark:text-emerald-400 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +8% improved
                        </span>
                        <span class="text-slate-500 dark:text-slate-400">excellent</span>
                    </div>
                </div>
            </div>

            <!-- Recent Presentations with improved layout -->
            <div class="glass-effect rounded-2xl p-8 elegant-shadow mb-10 hover:shadow-2xl transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Recent Presentations</h2>
                        <p class="text-slate-600 dark:text-slate-400">Your latest work at a glance</p>
                    </div>
                    <a href="/presentations" class="inline-flex items-center px-4 py-2 bg-white/50 dark:bg-slate-800/50 text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 rounded-lg transition-all duration-200 hover:bg-white/70 dark:hover:bg-slate-800/70 font-medium">
                        View All
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Presentation 1 -->
                    <div class="group glass-effect rounded-xl p-6 hover:bg-white/30 dark:hover:bg-slate-800/30 transition-all duration-300 cursor-pointer hover:scale-105">
                        <div class="aspect-video bg-gradient-to-br from-violet-100 to-purple-100 dark:from-violet-900/30 dark:to-purple-900/30 rounded-lg mb-4 flex items-center justify-center group-hover:shadow-lg transition-shadow">
                            <svg class="w-10 h-10 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white mb-2 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors">Business Strategy</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">25 slides • Updated 2 days ago</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full font-medium">
                                Published
                            </span>
                            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors rounded-lg hover:bg-white/50 dark:hover:bg-slate-800/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Presentation 2 -->
                    <div class="group glass-effect rounded-xl p-6 hover:bg-white/30 dark:hover:bg-slate-800/30 transition-all duration-300 cursor-pointer hover:scale-105">
                        <div class="aspect-video bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-lg mb-4 flex items-center justify-center group-hover:shadow-lg transition-shadow">
                            <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Marketing Report</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">18 slides • Updated 3 days ago</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs bg-yellow-100 dark:bg-yellow-900/50 text-yellow-600 dark:text-yellow-400 px-3 py-1 rounded-full font-medium">
                                Draft
                            </span>
                            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors rounded-lg hover:bg-white/50 dark:hover:bg-slate-800/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Presentation 3 -->
                    <div class="group glass-effect rounded-xl p-6 hover:bg-white/30 dark:hover:bg-slate-800/30 transition-all duration-300 cursor-pointer hover:scale-105">
                        <div class="aspect-video bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/30 dark:to-teal-900/30 rounded-lg mb-4 flex items-center justify-center group-hover:shadow-lg transition-shadow">
                            <svg class="w-10 h-10 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white mb-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">Project Overview</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">32 slides • Updated 1 week ago</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full font-medium">
                                Published
                            </span>
                            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors rounded-lg hover:bg-white/50 dark:hover:bg-slate-800/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="glass-effect rounded-2xl p-6 elegant-shadow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="/presentations/create" class="flex items-center p-3 rounded-lg hover:bg-white/20 dark:hover:bg-slate-800/20 transition-colors group">
                            <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-slate-900 dark:text-white">Create Presentation</span>
                        </a>
                        <a href="/templates" class="flex items-center p-3 rounded-lg hover:bg-white/20 dark:hover:bg-slate-800/20 transition-colors group">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-slate-900 dark:text-white">Browse Templates</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity with improved timeline -->
                <div class="glass-effect rounded-2xl p-8 elegant-shadow">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Recent Activity</h3>
                        <button class="glass-effect px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-white/20 transition-all duration-200 flex items-center space-x-2">
                            <span>View All</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start space-x-4 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-semibold text-slate-900 dark:text-white">
                                        Created "Business Strategy 2024" presentation
                                    </p>
                                    <span class="text-sm text-slate-500 dark:text-slate-400">2 hours ago</span>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                                    New presentation with comprehensive business strategy for next quarter
                                </p>
                                <div class="flex items-center mt-3 space-x-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        Published
                                    </span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">12 slides • 8 min read</span>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="flex items-start space-x-4 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-semibold text-slate-900 dark:text-white">
                                        Updated "Marketing Report Q4"
                                    </p>
                                    <span class="text-sm text-slate-500 dark:text-slate-400">5 hours ago</span>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                                    Added latest performance metrics and market analysis data
                                </p>
                                <div class="flex items-center mt-3 space-x-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></span>
                                        Updated
                                    </span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">18 slides • Version 3.2</span>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="flex items-start space-x-4 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-semibold text-slate-900 dark:text-white">
                                        Shared "Team Workshop" with 8 members
                                    </p>
                                    <span class="text-sm text-slate-500 dark:text-slate-400">1 day ago</span>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                                    Collaborative session initiated with positive team engagement
                                </p>
                                <div class="flex items-center mt-3 space-x-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                                        </svg>
                                        Shared
                                    </span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">8 collaborators • Active discussion</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-6 elegant-shadow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Storage Usage</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-slate-600 dark:text-slate-400">Used</span>
                                <span class="font-medium text-slate-900 dark:text-white">2.3 GB / 5 GB</span>
                            </div>
                            <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-violet-600 to-purple-600 h-2 rounded-full" style="width: 46%"></div>
                            </div>
                        </div>
                        <a href="/upgrade" class="inline-flex items-center text-sm text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 font-medium">
                            Upgrade Storage
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Analytics Overview Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                <!-- Performance Chart -->
                <div class="glass-effect rounded-2xl p-8 elegant-shadow hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Performance Analytics</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-slate-600 dark:text-slate-400">Last 30 days</span>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <!-- Mock Chart Area -->
                    <div class="relative h-64 bg-gradient-to-br from-violet-50 to-purple-50 dark:from-slate-800 dark:to-slate-700 rounded-xl p-6 mb-6">
                        <div class="absolute inset-0 flex items-end justify-around p-6">
                            <div class="bg-gradient-to-t from-violet-600 to-purple-500 rounded-t-lg w-8" style="height: 60%"></div>
                            <div class="bg-gradient-to-t from-blue-600 to-cyan-500 rounded-t-lg w-8" style="height: 80%"></div>
                            <div class="bg-gradient-to-t from-emerald-600 to-teal-500 rounded-t-lg w-8" style="height: 45%"></div>
                            <div class="bg-gradient-to-t from-orange-600 to-red-500 rounded-t-lg w-8" style="height: 90%"></div>
                            <div class="bg-gradient-to-t from-pink-600 to-rose-500 rounded-t-lg w-8" style="height: 70%"></div>
                            <div class="bg-gradient-to-t from-indigo-600 to-blue-500 rounded-t-lg w-8" style="height: 55%"></div>
                            <div class="bg-gradient-to-t from-green-600 to-emerald-500 rounded-t-lg w-8" style="height: 85%"></div>
                        </div>
                        <div class="absolute top-4 left-6 text-slate-700 dark:text-slate-300">
                            <div class="text-xs opacity-60">Views</div>
                            <div class="text-2xl font-bold">2,847</div>
                        </div>
                    </div>

                    <!-- Chart Legend -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-gradient-to-r from-violet-600 to-purple-500 rounded-full"></div>
                            <span class="text-sm text-slate-600 dark:text-slate-400">Views</span>
                            <span class="text-sm font-semibold text-slate-900 dark:text-white">+23%</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-gradient-to-r from-emerald-600 to-teal-500 rounded-full"></div>
                            <span class="text-sm text-slate-600 dark:text-slate-400">Engagement</span>
                            <span class="text-sm font-semibold text-slate-900 dark:text-white">+15%</span>
                        </div>
                    </div>
                </div>

                <!-- AI Insights Panel -->
                <div class="glass-effect rounded-2xl p-8 elegant-shadow hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">AI Insights</h3>
                        <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Insight 1 -->
                        <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl border-l-4 border-green-500">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-green-900 dark:text-green-100">High Engagement Detected</h4>
                                    <p class="text-sm text-green-700 dark:text-green-200 mt-1">Your "Marketing Strategy" presentation has 87% engagement rate - consider creating similar content.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Insight 2 -->
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-xl border-l-4 border-blue-500">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-blue-900 dark:text-blue-100">Optimal Posting Time</h4>
                                    <p class="text-sm text-blue-700 dark:text-blue-200 mt-1">Tuesday 2-4 PM shows highest viewer activity. Schedule future presentations accordingly.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Insight 3 -->
                        <div class="p-4 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border-l-4 border-purple-500">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-purple-900 dark:text-purple-100">Content Suggestion</h4>
                                    <p class="text-sm text-purple-700 dark:text-purple-200 mt-1">Consider adding more interactive elements to increase audience retention by 15%.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AI Action Button -->
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <button class="w-full glass-effect py-3 px-4 rounded-xl font-medium text-slate-700 dark:text-slate-300 hover:bg-white/20 transition-all duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Generate More Insights</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Styles with better animations and effects -->
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-effect:hover {
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px 0 rgba(31, 38, 135, 0.25);
            transform: translateY(-2px);
        }
        
        .elegant-shadow {
            box-shadow: 
                0 10px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 4s ease-in-out infinite;
            background-size: 200% 200%;
        }
        
        @keyframes gradient-shift {
            0%, 100% { 
                background-position: 0% 50%; 
            }
            50% { 
                background-position: 100% 50%; 
            }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px); 
            }
            50% { 
                transform: translateY(-10px); 
            }
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse-slow {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
        
        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .smooth-entrance {
            animation: smoothEntrance 0.6s ease-out;
        }
        
        @keyframes smoothEntrance {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Custom scrollbar for webkit browsers */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Improved focus states for accessibility */
        .glass-effect:focus-within {
            outline: 2px solid rgba(99, 102, 241, 0.5);
            outline-offset: 2px;
        }
        
        /* Enhanced button hover effects */
        button.glass-effect:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.2);
        }
        
        button.glass-effect:active {
            transform: translateY(0);
            box-shadow: 0 8px 25px 0 rgba(31, 38, 135, 0.15);
        }

        /* Professional progress bar animations */
        .progress-bar {
            background: linear-gradient(90deg, 
                rgba(99, 102, 241, 0.8) 0%, 
                rgba(168, 85, 247, 0.8) 50%, 
                rgba(236, 72, 153, 0.8) 100%);
            animation: progress-shine 2s ease-in-out infinite;
        }
        
        @keyframes progress-shine {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
    </style>
            50% { background-position: 100% 50%; }
        }
        
        .elegant-shadow {
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.1), 
                0 10px 10px -5px rgba(0, 0, 0, 0.04),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }
        
        .elegant-shadow:hover {
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.15), 
                0 15px 25px -5px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition-property: transform, background-color, border-color, color, fill, stroke, opacity, box-shadow;
            transition-duration: 200ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        
        /* Improved focus states for accessibility */
        .focus\:ring-violet:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.3);
        }
    </style>
</x-layouts.app>
