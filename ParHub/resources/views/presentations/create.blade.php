<x-layouts.app :title="__('Create Presentation')" x-data="createPresentationData()" class="animate-on-scroll">
    <!-- Enhanced Animated Background with Scroll Parallax -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-violet-500/30 to-purple-600/30 rounded-full blur-3xl animate-float" style="animation-delay: 0s"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-blue-500/25 to-indigo-600/25 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-gradient-to-br from-emerald-500/20 to-teal-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        <div class="absolute bottom-1/3 right-1/4 w-56 h-56 bg-gradient-to-br from-orange-500/15 to-red-600/15 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 3s"></div>
    </div>

    <!-- Scroll Progress Indicator -->
    <div class="fixed top-0 left-0 w-full h-1 bg-white/10 z-50">
        <div x-bind:style="`width: ${scrollProgress}%`" 
             class="h-full bg-gradient-to-r from-violet-500 to-purple-600 transition-all duration-300 ease-out"></div>
    </div>

    <div class="relative z-10 min-h-screen animate-on-scroll">
        <div class="container mx-auto px-6 py-8 max-w-7xl">
            
            <!-- Enhanced Header Section with Breadcrumb -->
            <div class="mb-12 animate-fade-in-down">
                <!-- Breadcrumb Navigation -->
                <nav class="mb-6 animate-on-scroll">
                    <div class="glass-morphism-light rounded-xl px-6 py-3 inline-flex items-center space-x-3 text-sm">
                        <a href="/dashboard" class="text-white/60 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5v6m4-6v6m4-6v6"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a href="/presentations" class="text-white/60 hover:text-white transition-colors duration-300">Presentations</a>
                        <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-white font-medium">Create New</span>
                    </div>
                </nav>

                <!-- Enhanced Header Card -->
                <div class="glass-morphism-luxury rounded-3xl p-10 elegant-shadow-xl animate-on-scroll">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                        <div class="flex items-start space-x-6">
                            <a href="/presentations" 
                               class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform">
                                <svg class="w-7 h-7 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <div class="space-y-4">
                                <div>
                                    <h1 class="text-5xl lg:text-6xl font-black text-white mb-3 leading-tight">
                                        Create New
                                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-purple-400">
                                            Presentation
                                        </span>
                                    </h1>
                                    <p class="text-white/80 text-xl leading-relaxed max-w-2xl">
                                        Choose from multiple creation methods to build your perfect presentation. 
                                        Start with templates, upload existing content, or create from scratch.
                                    </p>
                                </div>
                                
                                <!-- Quick Stats -->
                                <div class="flex items-center space-x-8 pt-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">100+</div>
                                        <div class="text-sm text-white/60">Templates</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">AI</div>
                                        <div class="text-sm text-white/60">Powered</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">∞</div>
                                        <div class="text-sm text-white/60">Possibilities</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Quick Actions -->
                        <div class="flex flex-col space-y-4">
                            <button @click="scrollToTemplates()" 
                                    class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="Browse Templates">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m0 0l7-7 7 7z"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Templates</span>
                            </button>
                            <button class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="Share & Collaborate">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Share</span>
                            </button>
                            <button class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="Help & Tutorials">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Help</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Main Creation Options -->
            <div class="grid lg:grid-cols-3 gap-8 mb-16 animate-fade-in-up" style="animation-delay: 0.2s">
                
                <!-- From Template Card -->
                <div @click="createFromTemplate()" 
                     class="glass-morphism-card rounded-3xl p-8 elegant-shadow-xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden animate-on-scroll"
                     :class="{'opacity-50 pointer-events-none': loading}">
                    
                    <!-- Enhanced Loading Overlay -->
                    <div x-show="loading" class="absolute inset-0 glass-morphism-light flex items-center justify-center z-20 rounded-3xl">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="animate-spin rounded-full h-12 w-12 border-4 border-violet-400/30 border-t-violet-400"></div>
                            <span class="text-white/80 font-medium">Loading Templates...</span>
                        </div>
                    </div>
                    
                    <!-- Dynamic Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-600/10 via-purple-600/10 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-all duration-700 rounded-3xl"></div>
                    
                    <!-- Floating Elements Animation -->
                    <div class="absolute top-4 right-4 w-3 h-3 bg-violet-400/40 rounded-full group-hover:animate-ping"></div>
                    <div class="absolute bottom-6 left-6 w-2 h-2 bg-purple-400/40 rounded-full group-hover:animate-ping" style="animation-delay: 0.5s"></div>
                    
                    <div class="relative z-10">
                        <!-- Enhanced Icon -->
                        <div class="w-24 h-24 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-700 shadow-2xl">
                            <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                        </div>

                        <!-- Enhanced Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-300">
                            From Template
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-8 text-lg leading-relaxed group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors duration-300">
                            Choose from our curated collection of professional templates designed by experts.
                        </p>

                        <!-- Enhanced Action Section -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-violet-600 dark:text-violet-400 font-semibold text-lg group-hover:text-violet-700 dark:group-hover:text-violet-300 transition-colors">
                                <span class="group-hover:translate-x-1 transition-transform duration-300">Browse Templates</span>
                                <svg class="w-6 h-6 ml-3 group-hover:translate-x-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="glass-morphism-light px-3 py-1 rounded-full">
                                <span class="text-sm text-white/80 font-medium">100+ Available</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Document Card -->
                <div @click="uploadDocument()" 
                     class="glass-morphism-card rounded-3xl p-8 elegant-shadow-xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden animate-on-scroll"
                     :class="{'opacity-50 pointer-events-none': loading}">
                    
                    <!-- Enhanced Loading Overlay -->
                    <div x-show="loading" class="absolute inset-0 glass-morphism-light flex items-center justify-center z-20 rounded-3xl">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="animate-spin rounded-full h-12 w-12 border-4 border-blue-400/30 border-t-blue-400"></div>
                            <span class="text-white/80 font-medium">Processing Upload...</span>
                        </div>
                    </div>
                    
                    <!-- Dynamic Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-cyan-600/10 to-indigo-600/10 opacity-0 group-hover:opacity-100 transition-all duration-700 rounded-3xl"></div>
                    
                    <!-- Floating Elements Animation -->
                    <div class="absolute top-4 right-4 w-3 h-3 bg-blue-400/40 rounded-full group-hover:animate-ping"></div>
                    <div class="absolute bottom-6 left-6 w-2 h-2 bg-cyan-400/40 rounded-full group-hover:animate-ping" style="animation-delay: 0.5s"></div>
                    
                    <div class="relative z-10">
                        <!-- Enhanced Icon -->
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-700 shadow-2xl">
                            <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                        </div>

                        <!-- Enhanced Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                            Upload Document
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-8 text-lg leading-relaxed group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors duration-300">
                            Transform existing documents into interactive presentations with AI assistance.
                        </p>

                        <!-- Enhanced Action Section -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-blue-600 dark:text-blue-400 font-semibold text-lg group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors">
                                <span class="group-hover:translate-x-1 transition-transform duration-300">Upload File</span>
                                <svg class="w-6 h-6 ml-3 group-hover:translate-x-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="glass-morphism-light px-3 py-1 rounded-full">
                                <span class="text-sm text-white/80 font-medium">PDF, DOCX, PPTX</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start from Scratch Card -->
                <div @click="startFromScratch()" 
                     class="glass-morphism-card rounded-3xl p-8 elegant-shadow-xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden animate-on-scroll"
                     :class="{'opacity-50 pointer-events-none': loading}">
                    
                    <!-- Enhanced Loading Overlay -->
                    <div x-show="loading" class="absolute inset-0 glass-morphism-light flex items-center justify-center z-20 rounded-3xl">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="animate-spin rounded-full h-12 w-12 border-4 border-emerald-400/30 border-t-emerald-400"></div>
                            <span class="text-white/80 font-medium">Creating Canvas...</span>
                        </div>
                    </div>
                    
                    <!-- Dynamic Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/10 via-teal-600/10 to-green-600/10 opacity-0 group-hover:opacity-100 transition-all duration-700 rounded-3xl"></div>
                    
                    <!-- Floating Elements Animation -->
                    <div class="absolute top-4 right-4 w-3 h-3 bg-emerald-400/40 rounded-full group-hover:animate-ping"></div>
                    <div class="absolute bottom-6 left-6 w-2 h-2 bg-teal-400/40 rounded-full group-hover:animate-ping" style="animation-delay: 0.5s"></div>
                    
                    <div class="relative z-10">
                        <!-- Enhanced Icon -->
                        <div class="w-24 h-24 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-700 shadow-2xl">
                            <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>

                        <!-- Enhanced Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-300">
                            Start from Scratch
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-8 text-lg leading-relaxed group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors duration-300">
                            Unleash your creativity with a completely blank canvas and unlimited possibilities.
                        </p>

                        <!-- Enhanced Action Section -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-semibold text-lg group-hover:text-emerald-700 dark:group-hover:text-emerald-300 transition-colors">
                                <span class="group-hover:translate-x-1 transition-transform duration-300">Create Blank</span>
                                <svg class="w-6 h-6 ml-3 group-hover:translate-x-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="glass-morphism-light px-3 py-1 rounded-full">
                                <span class="text-sm text-white/80 font-medium">Unlimited</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- AI Assistant Featured Section with Premium Design -->
            <div class="mb-16 animate-fade-in-up animate-on-scroll" style="animation-delay: 0.4s">
                <div class="glass-morphism-luxury rounded-4xl p-12 elegant-shadow-xl relative overflow-hidden">
                    <!-- Enhanced Background Animation -->
                    <div class="absolute inset-0 opacity-5">
                        <div class="absolute top-10 right-10 w-40 h-40 bg-gradient-to-br from-orange-400 to-red-500 rounded-full animate-float"></div>
                        <div class="absolute bottom-10 left-10 w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full animate-float-reverse" style="animation-delay: 1s"></div>
                        <div class="absolute top-1/2 right-1/4 w-24 h-24 bg-gradient-to-br from-red-400 to-pink-500 rounded-full animate-float" style="animation-delay: 2s"></div>
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div class="absolute top-6 right-6 w-4 h-4 bg-orange-400/30 rounded-full animate-ping"></div>
                    <div class="absolute bottom-8 left-8 w-3 h-3 bg-red-400/30 rounded-full animate-ping" style="animation-delay: 1s"></div>
                    
                    <div class="relative z-10">
                        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-12">
                            <!-- Main Content Section -->
                            <div class="flex flex-col lg:flex-row items-start lg:items-center space-y-8 lg:space-y-0 lg:space-x-10 flex-1">
                                <!-- Enhanced AI Icon -->
                                <div class="w-32 h-32 bg-gradient-to-br from-orange-500 via-red-600 to-pink-600 rounded-4xl flex items-center justify-center shadow-2xl transform hover:scale-105 hover:rotate-3 transition-all duration-500">
                                    <svg class="w-16 h-16 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>

                                <!-- Enhanced Content -->
                                <div class="flex-1 max-w-3xl">
                                    <div class="flex flex-wrap items-center gap-4 mb-6">
                                        <h3 class="text-4xl lg:text-5xl font-black text-white leading-tight">
                                            Create with
                                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-red-400 to-pink-400">
                                                AI Assistant
                                            </span>
                                        </h3>
                                        <div class="flex items-center space-x-3">
                                            <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm px-4 py-2 rounded-full font-bold animate-pulse shadow-lg">
                                                BETA
                                            </span>
                                            <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white text-sm px-4 py-2 rounded-full font-bold shadow-lg">
                                                NEW
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <p class="text-white/90 text-xl lg:text-2xl leading-relaxed mb-8 font-medium">
                                        Describe your presentation idea in natural language, and our advanced AI will create 
                                        a complete, professional presentation with content, design, and animations in seconds.
                                    </p>
                                    
                                    <!-- Enhanced Feature Points -->
                                    <div class="grid md:grid-cols-2 gap-4 mb-10">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full animate-pulse"></div>
                                            <span class="text-white/80 font-medium">Smart Content Generation</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-3 h-3 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.5s"></div>
                                            <span class="text-white/80 font-medium">Auto Design Optimization</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-3 h-3 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full animate-pulse" style="animation-delay: 1s"></div>
                                            <span class="text-white/80 font-medium">Instant Slide Creation</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-3 h-3 bg-gradient-to-r from-orange-400 to-red-400 rounded-full animate-pulse" style="animation-delay: 1.5s"></div>
                                            <span class="text-white/80 font-medium">Multi-Language Support</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Enhanced Action Buttons -->
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-8">
                                        <button @click="tryAIAssistant()" 
                                                class="group relative px-10 py-5 bg-gradient-to-r from-orange-500 via-red-600 to-pink-600 text-white rounded-2xl hover:from-orange-600 hover:via-red-700 hover:to-pink-700 transition-all duration-500 flex items-center space-x-4 shadow-2xl transform hover:scale-105 hover:-translate-y-1 font-bold text-lg overflow-hidden">
                                            <!-- Button Background Animation -->
                                            <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                            <div class="relative z-10 flex items-center space-x-4">
                                                <svg class="w-7 h-7 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                </svg>
                                                <span class="group-hover:text-yellow-100 transition-colors duration-300">Try AI Assistant</span>
                                            </div>
                                        </button>
                                        
                                        <a href="/ai-assistant" 
                                           class="group text-white/80 hover:text-white transition-colors text-lg font-semibold flex items-center space-x-3 hover:translate-x-2 transition-transform duration-300">
                                            <span>Learn more about AI features</span>
                                            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Enhanced Feature Showcase -->
                            <div class="xl:w-80">
                                <div class="glass-morphism-card rounded-3xl p-8 space-y-6 elegant-shadow-lg">
                                    <div class="text-center mb-6">
                                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-2">AI Capabilities</h4>
                                        <p class="text-sm text-slate-600 dark:text-slate-400">Powered by advanced machine learning</p>
                                    </div>
                                    
                                    <div class="space-y-5">
                                        <div class="flex items-start space-x-4">
                                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-slate-900 dark:text-white text-sm">Smart Content</h5>
                                                <p class="text-xs text-slate-600 dark:text-slate-400">Generates relevant, engaging content</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M11 7h3m-3.5 3.5L9.5 8.5"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-slate-900 dark:text-white text-sm">Auto Design</h5>
                                                <p class="text-xs text-slate-600 dark:text-slate-400">Applies professional layouts automatically</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4">
                                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-slate-900 dark:text-white text-sm">Lightning Fast</h5>
                                                <p class="text-xs text-slate-600 dark:text-slate-400">Complete presentations in under 30 seconds</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4">
                                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-slate-900 dark:text-white text-sm">Global Ready</h5>
                                                <p class="text-xs text-slate-600 dark:text-slate-400">Supports 50+ languages natively</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Progress Indicator -->
                                    <div class="mt-8 pt-6 border-t border-slate-200/10">
                                        <div class="flex items-center justify-between text-xs text-slate-600 dark:text-slate-400 mb-2">
                                            <span>AI Training Progress</span>
                                            <span>94%</span>
                                        </div>
                                        <div class="w-full bg-slate-200/20 rounded-full h-2">
                                            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2 rounded-full animate-pulse" style="width: 94%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Popular Templates Section -->
            <div id="templates-section" class="animate-fade-in-up animate-on-scroll" style="animation-delay: 0.6s">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12">
                    <div>
                        <h3 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-white mb-4">
                            Popular
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-purple-600">
                                Templates
                            </span>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-lg">
                            Handpicked templates loved by thousands of users worldwide
                        </p>
                    </div>
                    <a href="/templates" 
                       class="group glass-morphism-card px-8 py-4 rounded-2xl hover:bg-white/20 transition-all duration-300 flex items-center space-x-3 hover:scale-105 transform">
                        <span class="text-violet-600 dark:text-violet-400 font-semibold text-lg group-hover:text-violet-700 dark:group-hover:text-violet-300">
                            View All Templates
                        </span>
                        <svg class="w-6 h-6 text-violet-600 dark:text-violet-400 group-hover:text-violet-700 dark:group-hover:text-violet-300 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($popularTemplates as $template)
                    <div @click="useTemplate({{ $template->id }})" 
                         class="glass-morphism-card rounded-3xl p-6 hover:scale-105 transition-all duration-500 cursor-pointer group elegant-shadow-lg animate-on-scroll relative overflow-hidden">
                        
                        <!-- Template Preview with Enhanced Design -->
                        <div class="aspect-video bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mb-6 flex items-center justify-center relative overflow-hidden group-hover:scale-105 transition-transform duration-500 shadow-lg"
                             style="background: linear-gradient(135deg, {{ $template->category->color ?? '#3b82f6' }} 0%, {{ $template->category->color ?? '#1d4ed8' }} 100%);">
                            <!-- Overlay Effects -->
                            <div class="absolute inset-0 bg-gradient-to-br from-black/10 to-black/30"></div>
                            <div class="absolute inset-0 bg-white/5 group-hover:bg-white/10 transition-colors duration-500"></div>
                            
                            <!-- Template Icon -->
                            @if($template->category && isset($template->category->icon))
                                <svg class="w-12 h-12 text-white relative z-10 drop-shadow-lg group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $template->category->icon }}"></path>
                                </svg>
                            @else
                                <svg class="w-12 h-12 text-white relative z-10 drop-shadow-lg group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            @endif
                            
                            <!-- Corner Decorations -->
                            <div class="absolute top-2 right-2 w-2 h-2 bg-white/20 rounded-full"></div>
                            <div class="absolute bottom-2 left-2 w-1.5 h-1.5 bg-white/20 rounded-full"></div>
                        </div>
                        
                        <!-- Enhanced Template Info -->
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-300">
                                    {{ $template->name }}
                                </h4>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-violet-100 to-purple-100 text-violet-800 dark:from-violet-900/30 dark:to-purple-900/30 dark:text-violet-300">
                                        {{ $template->category->name ?? 'General' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Enhanced Stats Section -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <!-- Rating -->
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-slate-600 dark:text-slate-400">{{ number_format($template->rating, 1) }}</span>
                                    </div>
                                    
                                    <!-- Usage Count -->
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        <span class="text-sm text-slate-500 dark:text-slate-400">{{ number_format($template->downloads) }}</span>
                                    </div>
                                </div>
                                
                                <!-- Action Button -->
                                <button class="group-hover:translate-x-1 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Enhanced Premium/Free Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($template->is_premium)
                                <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs px-3 py-1.5 rounded-full font-bold shadow-lg flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span>PRO</span>
                                </div>
                            @else
                                <div class="bg-gradient-to-r from-green-400 to-emerald-500 text-white text-xs px-3 py-1.5 rounded-full font-bold shadow-lg flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>FREE</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Hover Effect Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-br from-violet-600/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Load More Templates Section -->
                <div class="text-center mt-12">
                    <button class="group glass-morphism-card px-12 py-4 rounded-2xl hover:bg-white/20 transition-all duration-300 transform hover:scale-105">
                        <span class="text-slate-700 dark:text-slate-300 font-semibold text-lg group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-300">
                            Load More Templates
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Enhanced Floating Action Button -->
    <div x-show="!scrolledDown" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-8 scale-90"
         x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 transform translate-y-8 scale-90"
         class="fixed bottom-8 right-8 z-50">
        <button @click="scrollToTemplates()" 
                class="group relative bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 hover:from-violet-700 hover:via-purple-700 hover:to-indigo-700 text-white p-5 rounded-2xl shadow-2xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-2 overflow-hidden">
            <!-- Background Animation -->
            <div class="absolute inset-0 bg-gradient-to-r from-violet-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <!-- Icon and Label -->
            <div class="relative z-10 flex items-center space-x-3">
                <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m0 0l7-7 7 7z"></path>
                </svg>
                <span class="font-semibold text-sm hidden sm:block">Browse Templates</span>
            </div>
            
            <!-- Pulse Effect -->
            <div class="absolute inset-0 rounded-2xl bg-violet-400/30 animate-ping"></div>
        </button>
    </div>

    <!-- Enhanced JavaScript with Better UX -->
    <script>
        function createPresentationData() {
            return {
                loading: false,
                scrolledDown: false,
                scrollProgress: 0,
                
                init() {
                    // Enhanced scroll monitoring
                    const updateScrollState = () => {
                        const scrollY = window.scrollY;
                        const windowHeight = window.innerHeight;
                        const documentHeight = document.documentElement.scrollHeight;
                        
                        // Update scroll progress
                        this.scrollProgress = Math.min((scrollY / (documentHeight - windowHeight)) * 100, 100);
                        
                        // Update scrolled down state
                        this.scrolledDown = scrollY > windowHeight * 0.5;
                    };

                    window.addEventListener('scroll', updateScrollState);
                    updateScrollState();
                    
                    // Initialize scroll reveal animations
                    this.initScrollReveal();
                },
                
                initScrollReveal() {
                    const observerOptions = {
                        threshold: 0.1,
                        rootMargin: '0px 0px -50px 0px'
                    };

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('animate-reveal');
                            }
                        });
                    }, observerOptions);

                    // Observe all elements with animate-on-scroll class
                    document.querySelectorAll('.animate-on-scroll').forEach(el => {
                        observer.observe(el);
                    });
                },
                
                uploadDocument() {
                    // Enhanced file upload with better UX
                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = '.pdf,.docx,.pptx,.doc,.txt';
                    input.multiple = false;
                    
                    input.onchange = (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            // Validate file size (max 50MB)
                            if (file.size > 50 * 1024 * 1024) {
                                this.showNotification('File size must be less than 50MB', 'error');
                                return;
                            }
                            
                            // Validate file type
                            const allowedTypes = [
                                'application/pdf',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                                'application/msword',
                                'text/plain'
                            ];
                            
                            if (!allowedTypes.includes(file.type)) {
                                this.showNotification('Please select a valid file type (PDF, DOCX, PPTX, DOC, TXT)', 'error');
                                return;
                            }
                            
                            this.processUpload(file);
                        }
                    };
                    input.click();
                },
                
                startFromScratch() {
                    this.loading = true;
                    
                    // Create a new blank presentation with enhanced error handling
                    fetch('/presentations', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            title: 'New Presentation',
                            description: 'A blank presentation ready for your creativity',
                            type: 'blank'
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        
                        if (!response.ok) {
                            throw new Error(data.message || 'Failed to create presentation');
                        }
                        
                        return data;
                    })
                    .then(data => {
                        if (data.success && data.presentation) {
                            this.showNotification('Presentation created successfully!', 'success');
                            setTimeout(() => {
                                window.location.href = `/presentations/${data.presentation.id}/edit`;
                            }, 1000);
                        } else {
                            throw new Error(data.message || 'Unknown error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error creating presentation:', error);
                        this.showNotification('Error creating presentation. Please try again.', 'error');
                    })
                    .finally(() => {
                        this.loading = false;
                    });
                },
                
                tryAIAssistant() {
                    // Show coming soon or redirect to AI assistant
                    this.showNotification('AI Assistant is launching soon! Stay tuned.', 'info');
                    // Uncomment when AI assistant is ready:
                    // window.location.href = '/ai-assistant';
                },
                
                useTemplate(templateId) {
                    this.loading = true;
                    
                    // Create presentation from template with better error handling
                    fetch('/presentations', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            template_id: templateId,
                            title: 'New Presentation from Template'
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        
                        if (!response.ok) {
                            throw new Error(data.message || 'Failed to create presentation from template');
                        }
                        
                        return data;
                    })
                    .then(data => {
                        if (data.success && data.presentation) {
                            this.showNotification('Presentation created from template!', 'success');
                            setTimeout(() => {
                                window.location.href = `/presentations/${data.presentation.id}/edit`;
                            }, 1000);
                        } else {
                            throw new Error(data.message || 'Unknown error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error creating presentation from template:', error);
                        this.showNotification('Error creating presentation from template. Please try again.', 'error');
                    })
                    .finally(() => {
                        this.loading = false;
                    });
                },
                
                processUpload(file) {
                    this.loading = true;
                    
                    const formData = new FormData();
                    formData.append('file', file);
                    formData.append('title', `Imported from ${file.name.replace(/\.[^/.]+$/, '')}`);
                    
                    fetch('/presentations/upload', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(async response => {
                        const data = await response.json();
                        
                        if (!response.ok) {
                            throw new Error(data.message || 'Failed to process upload');
                        }
                        
                        return data;
                    })
                    .then(data => {
                        if (data.success && data.presentation) {
                            this.showNotification('File uploaded and processed successfully!', 'success');
                            setTimeout(() => {
                                window.location.href = `/presentations/${data.presentation.id}/edit`;
                            }, 1000);
                        } else {
                            throw new Error(data.message || 'Unknown error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error processing upload:', error);
                        this.showNotification('Error processing file. Please try again.', 'error');
                    })
                    .finally(() => {
                        this.loading = false;
                    });
                },
                
                scrollToTemplates() {
                    const element = document.getElementById('templates-section');
                    if (element) {
                        element.scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                },
                
                showNotification(message, type = 'info') {
                    // Create notification element
                    const notification = document.createElement('div');
                    notification.className = `fixed top-6 right-6 z-50 p-4 rounded-2xl shadow-2xl transform transition-all duration-500 translate-x-full`;
                    
                    // Set notification style based on type
                    const styles = {
                        success: 'bg-gradient-to-r from-emerald-500 to-teal-600 text-white',
                        error: 'bg-gradient-to-r from-red-500 to-pink-600 text-white',
                        info: 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white',
                        warning: 'bg-gradient-to-r from-yellow-500 to-orange-600 text-white'
                    };
                    
                    notification.className += ` ${styles[type] || styles.info}`;
                    notification.textContent = message;
                    
                    document.body.appendChild(notification);
                    
                    // Animate in
                    setTimeout(() => {
                        notification.classList.remove('translate-x-full');
                    }, 100);
                    
                    // Auto remove after 5 seconds
                    setTimeout(() => {
                        notification.classList.add('translate-x-full');
                        setTimeout(() => {
                            if (notification.parentNode) {
                                notification.parentNode.removeChild(notification);
                            }
                        }, 500);
                    }, 5000);
                }
    </script>

    <!-- Enhanced Styles with Modern Animations -->
    <style>
        /* Base Container Styles */
        .container {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        /* Enhanced Glass Morphism Effects */
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

        /* Dark Mode Glass Effects */
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

        /* Advanced Animation Keyframes */
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

        @keyframes reveal {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Animation Classes */
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

        .animate-reveal {
            animation: reveal 0.8s ease-out forwards;
        }

        /* Custom Rounded Corners */
        .rounded-4xl {
            border-radius: 2rem;
        }

        /* Improved Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .glass-morphism-luxury {
                padding: 2rem;
            }
            
            /* Mobile-optimized typography */
            h1 {
                font-size: 2.5rem !important;
                line-height: 1.2;
            }
            
            .text-5xl {
                font-size: 2.5rem !important;
            }
            
            .text-6xl {
                font-size: 3rem !important;
            }
        }

        /* Performance Optimizations */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Reduce motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .glass-morphism-luxury,
            .glass-morphism-card,
            .glass-morphism-light {
                border-width: 2px;
                background: rgba(255, 255, 255, 0.95);
            }
            
            .dark .glass-morphism-luxury,
            .dark .glass-morphism-card,
            .dark .glass-morphism-light {
                background: rgba(0, 0, 0, 0.95);
            }
        }

        /* Focus styles for accessibility */
        button:focus,
        a:focus {
            outline: 2px solid #8b5cf6;
            outline-offset: 2px;
        }

        /* Loading state improvements */
        .loading-overlay {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
        }

        .dark .loading-overlay {
            background: rgba(0, 0, 0, 0.9);
        }
    </style>
</x-layouts.app>
