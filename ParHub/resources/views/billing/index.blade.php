<x-layouts.app :title="__('Billing & Subscription')" class="animate-on-scroll">
    <!-- Enhanced Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-emerald-500/30 to-teal-600/30 rounded-full blur-3xl animate-float" style="animation-delay: 0s"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-blue-500/25 to-cyan-600/25 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-gradient-to-br from-purple-500/20 to-indigo-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        <div class="absolute bottom-1/3 right-1/4 w-56 h-56 bg-gradient-to-br from-green-500/15 to-emerald-600/15 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 3s"></div>
    </div>

    <!-- Scroll Progress Indicator -->
    <div class="fixed top-0 left-0 w-full h-1 bg-white/10 z-50">
        <div x-data="{ scrollProgress: 0 }" 
             x-init="window.addEventListener('scroll', () => { 
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                scrollProgress = (winScroll / height) * 100;
             })"
             x-bind:style="`width: ${scrollProgress}%`" 
             class="h-full bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-300 ease-out"></div>
    </div>

    <div class="relative z-10 min-h-screen animate-on-scroll">
        <div class="container mx-auto px-6 py-8 max-w-7xl">
            
            <!-- Enhanced Header Section -->
            <div class="mb-12 animate-fade-in-down">
                <!-- Breadcrumb Navigation -->
                <nav class="mb-6 animate-on-scroll">
                    <div class="glass-morphism-light rounded-xl px-6 py-3 inline-flex items-center space-x-3 text-sm">
                        <a href="/dashboard" class="text-white/60 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-white font-medium">Billing & Subscription</span>
                    </div>
                </nav>

                <!-- Enhanced Header Card -->
                <div class="glass-morphism-luxury rounded-3xl p-10 elegant-shadow-xl animate-on-scroll">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                        <div class="flex items-start space-x-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-600 rounded-3xl flex items-center justify-center shadow-2xl animate-float">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <h1 class="text-5xl lg:text-6xl font-bold text-slate-900 dark:text-white leading-tight">
                                        Billing & Subscription
                                    </h1>
                                    <p class="text-xl text-slate-600 dark:text-slate-400 mt-4 leading-relaxed">
                                        Manage your subscription, billing details, and payment methods with ease
                                    </p>
                                </div>
                                
                                <!-- Status Badge -->
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-2 bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 px-4 py-2 rounded-full">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">Pro Plan Active</span>
                                    </div>
                                    <div class="text-sm text-slate-500 dark:text-slate-400">
                                        Next billing: January 15, 2026
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="flex flex-col space-y-4">
                            <button class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-emerald-400 transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Upgrade Plan</span>
                            </button>
                            <button class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-blue-400 transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Invoices</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid lg:grid-cols-3 gap-8 animate-fade-in-up" style="animation-delay: 0.2s">
                
                <!-- Main Billing Content -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Current Plan Card -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg animate-on-scroll">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                </div>
                                Current Plan
                            </h3>
                            <div class="bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 px-4 py-2 rounded-full text-sm font-medium">
                                Active
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <h4 class="text-3xl font-bold text-slate-900 dark:text-white">Pro Plan</h4>
                                    <p class="text-slate-600 dark:text-slate-400">Perfect for professionals</p>
                                </div>
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-4xl font-bold text-emerald-600 dark:text-emerald-400">$29</span>
                                    <span class="text-slate-500 dark:text-slate-400">/month</span>
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">
                                    Next billing: <strong class="text-slate-900 dark:text-white">January 15, 2026</strong>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <h5 class="font-semibold text-slate-900 dark:text-white">Plan Features:</h5>
                                <div class="space-y-2">
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-slate-600 dark:text-slate-400">Unlimited Presentations</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-slate-600 dark:text-slate-400">AI Assistant</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-slate-600 dark:text-slate-400">Premium Templates</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-slate-600 dark:text-slate-400">Advanced Analytics</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3 mt-6 pt-6 border-t border-white/10">
                            <button class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                                Upgrade Plan
                            </button>
                            <button class="flex-1 glass-morphism-light text-slate-700 dark:text-slate-300 px-6 py-3 rounded-xl font-medium hover:bg-white/20 transition-all duration-300">
                                Manage Plan
                            </button>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg animate-on-scroll">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            Payment Methods
                        </h3>
                        
                        <div class="space-y-4">
                            <!-- Primary Card -->
                            <div class="glass-morphism-light p-6 rounded-2xl">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-8 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">VISA</span>
                                        </div>
                                        <div>
                                            <div class="font-medium text-slate-900 dark:text-white">•••• •••• •••• 4242</div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">Expires 12/28</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div class="bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-medium">
                                            Primary
                                        </div>
                                        <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Add New Payment Method -->
                            <button class="w-full glass-morphism-light p-6 rounded-2xl hover:bg-white/20 transition-all duration-300 border-2 border-dashed border-white/20 hover:border-white/40 group">
                                <div class="flex items-center justify-center space-x-3">
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">Add New Payment Method</span>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Recent Invoices -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg animate-on-scroll">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                Recent Invoices
                            </h3>
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 text-sm font-medium">
                                View All
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Invoice Item -->
                            <div class="flex items-center justify-between p-4 glass-morphism-light rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-white">Pro Plan - December 2025</div>
                                        <div class="text-sm text-slate-500 dark:text-slate-400">Paid on Dec 15, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-slate-900 dark:text-white">$29.00</div>
                                    <button class="text-blue-600 dark:text-blue-400 text-sm hover:underline">Download</button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 glass-morphism-light rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-white">Pro Plan - November 2025</div>
                                        <div class="text-sm text-slate-500 dark:text-slate-400">Paid on Nov 15, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-slate-900 dark:text-white">$29.00</div>
                                    <button class="text-blue-600 dark:text-blue-400 text-sm hover:underline">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8 animate-on-scroll">
                    
                    <!-- Usage Stats -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            Usage This Month
                        </h4>
                        
                        <div class="space-y-6">
                            <!-- Presentations -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-600 dark:text-slate-400">Presentations Created</span>
                                    <span class="font-medium text-slate-900 dark:text-white">12 / ∞</span>
                                </div>
                                <div class="w-full bg-slate-200/20 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2 rounded-full" style="width: 40%"></div>
                                </div>
                            </div>
                            
                            <!-- AI Assistant -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-600 dark:text-slate-400">AI Assistant Uses</span>
                                    <span class="font-medium text-slate-900 dark:text-white">156 / ∞</span>
                                </div>
                                <div class="w-full bg-slate-200/20 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                            
                            <!-- Storage -->
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-600 dark:text-slate-400">Storage Used</span>
                                    <span class="font-medium text-slate-900 dark:text-white">2.4 GB / 10 GB</span>
                                </div>
                                <div class="w-full bg-slate-200/20 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" style="width: 24%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            Quick Actions
                        </h4>
                        
                        <div class="space-y-3">
                            <button class="w-full glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left group hover:scale-105 transform">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-blue-500 group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-white">Update Payment</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Change your billing information</div>
                                    </div>
                                </div>
                            </button>
                            
                            <button class="w-full glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left group hover:scale-105 transform">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-emerald-500 group-hover:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-white">Download Invoices</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Get all your billing receipts</div>
                                    </div>
                                </div>
                            </button>
                            
                            <button class="w-full glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left group hover:scale-105 transform">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-purple-500 group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-white">Billing Support</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Get help with your subscription</div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Support Contact -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4">Need Help?</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-6">
                            Our billing support team is here to help you with any questions about your subscription or payments.
                        </p>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                            Contact Support
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Glass Morphism Effects */
        .glass-morphism-luxury {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glass-morphism-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glass-morphism-light {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Dark Mode Adjustments */
        .dark .glass-morphism-luxury {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }
        
        .dark .glass-morphism-card {
            background: rgba(15, 23, 42, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        /* Enhanced Shadow Effects */
        .elegant-shadow-xl {
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .elegant-shadow-lg {
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04),
                0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        /* Animations */
        @keyframes animate-float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(5px) rotate(-1deg); }
        }

        @keyframes animate-float-reverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(10px) rotate(-1deg); }
            66% { transform: translateY(-5px) rotate(1deg); }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-float {
            animation: animate-float 6s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: animate-float-reverse 6s ease-in-out infinite;
        }
        
        .animate-fade-in-down {
            animation: fade-in-down 1s ease-out;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .glass-morphism-luxury {
                padding: 2rem;
            }
            
            h1 {
                font-size: 2.5rem !important;
                line-height: 1.2;
            }
        }
    </style>
</x-layouts.app>
