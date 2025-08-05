<x-layouts.app :title="__('Create Presentation')">
    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-4">
                    <a href="/presentations" class="p-2 text-slate-600 dark:text-slate-400 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
                            Create New Presentation
                        </h1>
                        <p class="text-slate-600 dark:text-slate-400">
                            Choose how you want to create your presentation.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Creation Options -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                
                <!-- Start from Template -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-2">From Template</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">Choose from our collection of professional templates to get started quickly.</p>
                    <div class="flex items-center text-violet-600 dark:text-violet-400 font-medium">
                        Browse Templates
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Upload Document -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-2">Upload Document</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">Upload a PDF, Word document, or PowerPoint file to convert into a presentation.</p>
                    <div class="flex items-center text-blue-600 dark:text-blue-400 font-medium">
                        Upload File
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Start from Scratch -->
                <div class="glass-effect rounded-2xl p-6 elegant-shadow hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-2">Start from Scratch</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">Create a completely custom presentation with a blank canvas.</p>
                    <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-medium">
                        Create Blank
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

            </div>

            <!-- AI Assistant Option -->
            <div class="glass-effect rounded-2xl p-8 elegant-shadow mb-8">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            Create with AI Assistant
                            <span class="bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 text-xs px-2 py-1 rounded-full ml-2">Beta</span>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-4">
                            Tell our AI what you want to present, and it will create a complete presentation for you in seconds.
                        </p>
                        <div class="flex items-center space-x-4">
                            <button class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-600 hover:to-red-700 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>Try AI Assistant</span>
                            </button>
                            <a href="/help/ai-assistant" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors text-sm">
                                Learn more about AI features
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Templates Preview -->
            <div>
                <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-6">Popular Templates</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @for($i = 1; $i <= 4; $i++)
                    <div class="glass-effect rounded-xl p-4 hover:scale-105 transition-all duration-300 cursor-pointer">
                        <div class="aspect-video bg-gradient-to-br from-violet-100 to-purple-100 dark:from-violet-900/30 dark:to-purple-900/30 rounded-lg mb-3 flex items-center justify-center">
                            <svg class="w-8 h-8 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                        </div>
                        <h4 class="text-sm font-medium text-slate-900 dark:text-white mb-1">Business Template {{ $i }}</h4>
                        <p class="text-xs text-slate-600 dark:text-slate-400">Professional design</p>
                    </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
