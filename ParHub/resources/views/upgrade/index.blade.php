<x-layouts.app.sidebar title="Storage Upgrade">
    <flux:main>
        <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
    
    <!-- Header -->
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-sm border-b border-slate-200 dark:border-slate-700 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Storage Upgrade</h1>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Upgrade your storage plan</p>
                    </div>
                </div>
                
                <a href="{{ route('dashboard') }}" 
                   class="px-4 py-2 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Current Plan -->
        <div class="mb-8">
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Current Plan</h2>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">Free Plan</p>
                        <p class="text-slate-600 dark:text-slate-400">100 MB Storage • 5 Presentations</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-500 dark:text-slate-400">Used</p>
                        <p class="text-lg font-semibold text-slate-900 dark:text-white">23 MB of 100 MB</p>
                        <div class="w-32 bg-slate-200 dark:bg-slate-700 rounded-full h-2 mt-2">
                            <div class="bg-gradient-to-r from-purple-600 to-blue-600 h-2 rounded-full" style="width: 23%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upgrade Plans -->
        <div class="grid md:grid-cols-3 gap-6">
            
            <!-- Basic Plan -->
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50 hover:shadow-xl transition-all duration-300 animate-on-scroll">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Basic</h3>
                    <div class="mb-4">
                        <span class="text-3xl font-bold text-slate-900 dark:text-white">$9</span>
                        <span class="text-slate-600 dark:text-slate-400">/month</span>
                    </div>
                    
                    <ul class="space-y-3 mb-6 text-left">
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            1 GB Storage
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            50 Presentations
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Email Support
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Basic Templates
                        </li>
                    </ul>
                    
                    <button class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all duration-200">
                        Upgrade to Basic
                    </button>
                </div>
            </div>

            <!-- Pro Plan (Popular) -->
            <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl p-6 text-white relative overflow-hidden transform scale-105 shadow-xl animate-on-scroll">
                <div class="absolute top-4 right-4 bg-yellow-400 text-purple-900 text-xs font-bold px-3 py-1 rounded-full">
                    POPULAR
                </div>
                
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-2">Pro</h3>
                    <div class="mb-4">
                        <span class="text-3xl font-bold">$19</span>
                        <span class="text-purple-100">/month</span>
                    </div>
                    
                    <ul class="space-y-3 mb-6 text-left">
                        <li class="flex items-center text-purple-100">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            10 GB Storage
                        </li>
                        <li class="flex items-center text-purple-100">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Unlimited Presentations
                        </li>
                        <li class="flex items-center text-purple-100">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Priority Support
                        </li>
                        <li class="flex items-center text-purple-100">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Premium Templates
                        </li>
                        <li class="flex items-center text-purple-100">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            AI Features
                        </li>
                    </ul>
                    
                    <button class="w-full bg-white text-purple-600 font-semibold py-3 px-4 rounded-lg hover:bg-purple-50 transition-all duration-200">
                        Upgrade to Pro
                    </button>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50 hover:shadow-xl transition-all duration-300 animate-on-scroll">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Enterprise</h3>
                    <div class="mb-4">
                        <span class="text-3xl font-bold text-slate-900 dark:text-white">$49</span>
                        <span class="text-slate-600 dark:text-slate-400">/month</span>
                    </div>
                    
                    <ul class="space-y-3 mb-6 text-left">
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            100 GB Storage
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Unlimited Everything
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            24/7 Phone Support
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Custom Branding
                        </li>
                        <li class="flex items-center text-slate-600 dark:text-slate-400">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            API Access
                        </li>
                    </ul>
                    
                    <button class="w-full bg-gradient-to-r from-slate-600 to-slate-700 text-white font-semibold py-3 px-4 rounded-lg hover:from-slate-700 hover:to-slate-800 transition-all duration-200">
                        Contact Sales
                    </button>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="mt-12">
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-8 border border-slate-200/50 dark:border-slate-700/50">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 text-center">Why Upgrade?</h2>
                
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">More Storage</h3>
                        <p class="text-slate-600 dark:text-slate-400">Store more presentations and media files without worrying about limits.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Advanced Features</h3>
                        <p class="text-slate-600 dark:text-slate-400">Access AI-powered tools and premium templates for better presentations.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Priority Support</h3>
                        <p class="text-slate-600 dark:text-slate-400">Get faster response times and dedicated support from our team.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-12">
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-8 border border-slate-200/50 dark:border-slate-700/50">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 text-center">Frequently Asked Questions</h2>
                
                <div class="space-y-4">
                    <div class="border-b border-slate-200 dark:border-slate-700 pb-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Can I cancel anytime?</h3>
                        <p class="text-slate-600 dark:text-slate-400">Yes, you can cancel your subscription at any time. You'll continue to have access until the end of your billing period.</p>
                    </div>
                    
                    <div class="border-b border-slate-200 dark:border-slate-700 pb-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">What happens to my data if I downgrade?</h3>
                        <p class="text-slate-600 dark:text-slate-400">Your data remains safe. If you exceed the storage limit, you'll need to delete some files or upgrade again.</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Do you offer refunds?</h3>
                        <p class="text-slate-600 dark:text-slate-400">We offer a 14-day money-back guarantee for all paid plans. Contact support if you're not satisfied.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
