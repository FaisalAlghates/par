<x-layouts.app :title="__('AI Assistant')" x-data="aiAssistantData()" class="animate-on-scroll">
    <!-- Enhanced Animated Background with AI Theme -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-orange-500/30 to-red-600/30 rounded-full blur-3xl animate-float" style="animation-delay: 0s"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-yellow-500/25 to-orange-600/25 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-gradient-to-br from-red-500/20 to-pink-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        <div class="absolute bottom-1/3 right-1/4 w-56 h-56 bg-gradient-to-br from-purple-500/15 to-indigo-600/15 rounded-full blur-3xl animate-float-reverse" style="animation-delay: 3s"></div>
    </div>

    <!-- Scroll Progress Indicator -->
    <div class="fixed top-0 left-0 w-full h-1 bg-white/10 z-50">
        <div x-bind:style="`width: ${scrollProgress}%`" 
             class="h-full bg-gradient-to-r from-orange-500 to-red-600 transition-all duration-300 ease-out"></div>
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
                        <span class="text-white font-medium">AI Assistant</span>
                    </div>
                </nav>

                <!-- Enhanced Header Card -->
                <div class="glass-morphism-luxury rounded-3xl p-10 elegant-shadow-xl animate-on-scroll">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                        <div class="flex items-start space-x-6">
                            <a href="/presentations/create" 
                               class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform">
                                <svg class="w-7 h-7 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 via-red-600 to-pink-600 rounded-3xl flex items-center justify-center shadow-2xl">
                                        <svg class="w-8 h-8 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-5xl lg:text-6xl font-black text-white mb-3 leading-tight">
                                            AI
                                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-red-400 to-pink-400">
                                                Assistant
                                            </span>
                                        </h1>
                                        <div class="flex items-center space-x-3">
                                            <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm px-4 py-2 rounded-full font-bold animate-pulse shadow-lg">
                                                BETA
                                            </span>
                                            <span class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm px-4 py-2 rounded-full font-bold shadow-lg">
                                                SMART
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-white/80 text-xl leading-relaxed max-w-2xl">
                                    Create stunning presentations with the power of artificial intelligence. 
                                    Describe your vision, and watch as our AI brings it to life with professional design and content.
                                </p>
                                
                                <!-- Quick Stats -->
                                <div class="flex items-center space-x-8 pt-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">24/7</div>
                                        <div class="text-sm text-white/60">Available</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">50+</div>
                                        <div class="text-sm text-white/60">Languages</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">∞</div>
                                        <div class="text-sm text-white/60">Creativity</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Quick Actions -->
                        <div class="flex flex-col space-y-4">
                            <button @click="showHelp = !showHelp" 
                                    class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="Help & Tips">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Help</span>
                            </button>
                            <button @click="startNewChat()" 
                                    class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="New Chat">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">New Chat</span>
                            </button>
                            <button class="glass-morphism-light p-4 rounded-2xl hover:bg-white/20 transition-all duration-300 group hover:scale-105 transform" 
                                    title="Settings">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-xs text-white/60 group-hover:text-white/80 block mt-2">Settings</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Main Chat Interface -->
            <div class="grid lg:grid-cols-4 gap-8 animate-fade-in-up" style="animation-delay: 0.2s">
                
                <!-- Enhanced Chat Area -->
                <div class="lg:col-span-3">
                    <div class="glass-morphism-card rounded-3xl p-8 h-[700px] flex flex-col elegant-shadow-lg animate-on-scroll">
                        
                        <!-- Enhanced Chat Header -->
                        <div class="flex items-center justify-between mb-8 pb-6 border-b border-white/10">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 via-red-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">AI Presentation Creator</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">Powered by advanced machine learning</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse shadow-lg"></div>
                                    <span class="text-slate-600 dark:text-slate-400 font-medium">Online & Ready</span>
                                </div>
                                <div class="glass-morphism-light px-3 py-1 rounded-full">
                                    <span class="text-xs text-white/80 font-medium">V2.0</span>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Messages Area -->
                        <div class="flex-1 overflow-y-auto mb-8 space-y-6 custom-scrollbar" x-ref="messagesContainer">
                            
                            <!-- Enhanced Welcome Message -->
                            <div x-show="messages.length === 0" class="text-center py-16">
                                <div class="w-24 h-24 bg-gradient-to-br from-orange-500 via-red-600 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-2xl">
                                    <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">
                                    Welcome to 
                                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600">
                                        AI Assistant!
                                    </span>
                                </h4>
                                <p class="text-slate-600 dark:text-slate-400 mb-10 max-w-lg mx-auto text-lg leading-relaxed">
                                    Describe your presentation vision, and I'll help you create something amazing. 
                                    From concept to completion, let's build together.
                                </p>
                                
                                <!-- Enhanced Quick Start Examples -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                                    <button @click="sendMessage('Create a business pitch presentation for a new mobile app')" 
                                            class="group glass-morphism-card p-6 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left hover:scale-105 transform">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Business Pitch</div>
                                        </div>
                                        <div class="text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors">
                                            Mobile app startup presentation with investor focus
                                        </div>
                                    </button>
                                    
                                    <button @click="sendMessage('Help me create an educational presentation about climate change')" 
                                            class="group glass-morphism-card p-6 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left hover:scale-105 transform">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Educational</div>
                                        </div>
                                        <div class="text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors">
                                            Climate change awareness with scientific data
                                        </div>
                                    </button>
                                    
                                    <button @click="sendMessage('Create a marketing presentation for social media strategy')" 
                                            class="group glass-morphism-card p-6 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left hover:scale-105 transform">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011-1h2a1 1 0 011 1v4.586l2.707 2.707a1 1 0 010 1.414L19 12.414V13a1 1 0 01-1 1h-2v4a1 1 0 01-1 1H9a1 1 0 01-1-1v-4H6a1 1 0 01-1-1v-.586L1.293 9.707a1 1 0 010-1.414L4 5.293V1a1 1 0 011-1h2a1 1 0 011 1v3z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Marketing</div>
                                        </div>
                                        <div class="text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors">
                                            Social media strategy with engagement metrics
                                        </div>
                                    </button>
                                    
                                    <button @click="sendMessage('Help me make a portfolio presentation to showcase my work')" 
                                            class="group glass-morphism-card p-6 rounded-2xl hover:bg-white/20 transition-all duration-300 text-left hover:scale-105 transform">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors">Portfolio</div>
                                        </div>
                                        <div class="text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors">
                                            Professional showcase with project highlights
                                        </div>
                                    </button>
                                </div>
                            </div>

                            <!-- Enhanced Chat Messages -->
                            <template x-for="message in messages" :key="message.id">
                                <div :class="message.type === 'user' ? 'flex justify-end' : 'flex justify-start'">
                                    <div :class="message.type === 'user' ? 
                                        'bg-gradient-to-r from-orange-500 via-red-600 to-pink-600 text-white max-w-xs lg:max-w-lg px-6 py-4 rounded-2xl rounded-tr-md shadow-lg' :
                                        'glass-morphism-card max-w-xs lg:max-w-lg px-6 py-4 rounded-2xl rounded-tl-md shadow-lg'">
                                        <div class="text-sm leading-relaxed" x-text="message.content"></div>
                                        <div :class="message.type === 'user' ? 'text-white/70' : 'text-slate-500 dark:text-slate-400'" 
                                             class="text-xs mt-2 flex items-center space-x-2">
                                            <span x-text="message.time"></span>
                                            <div x-show="message.type === 'ai'" class="flex items-center space-x-1">
                                                <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></div>
                                                <span>AI</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <!-- Enhanced Typing Indicator -->
                            <div x-show="isTyping" class="flex justify-start">
                                <div class="glass-morphism-card max-w-xs px-6 py-4 rounded-2xl rounded-tl-md shadow-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center space-x-1">
                                            <div class="w-2.5 h-2.5 bg-orange-400 rounded-full animate-bounce"></div>
                                            <div class="w-2.5 h-2.5 bg-red-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                            <div class="w-2.5 h-2.5 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                        </div>
                                        <span class="text-sm text-slate-600 dark:text-slate-400">AI is thinking...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Input Area -->
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 relative">
                                    <input x-model="currentMessage" 
                                           @keydown.enter="sendMessage()"
                                           :disabled="isTyping"
                                           type="text" 
                                           placeholder="Describe your presentation idea in detail..."
                                           class="w-full glass-morphism-light border border-white/20 rounded-2xl px-6 py-4 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500/50 backdrop-blur-sm text-lg">
                                    
                                    <!-- Input Enhancements -->
                                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 flex items-center space-x-2">
                                        <button type="button" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </button>
                                        <div class="w-px h-6 bg-slate-300 dark:bg-slate-600"></div>
                                        <button type="button" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <button @click="sendMessage()" 
                                        :disabled="!currentMessage.trim() || isTyping"
                                        :class="(!currentMessage.trim() || isTyping) ? 'opacity-50 cursor-not-allowed scale-95' : 'hover:scale-110 hover:-translate-y-1'"
                                        class="bg-gradient-to-r from-orange-500 via-red-600 to-pink-600 hover:from-orange-600 hover:via-red-700 hover:to-pink-700 text-white p-4 rounded-2xl transition-all duration-300 shadow-2xl transform relative overflow-hidden">
                                    <!-- Button Background Animation -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                                    <svg class="w-6 h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Quick Actions Bar -->
                            <div class="flex items-center justify-between mt-4 px-2">
                                <div class="flex items-center space-x-4 text-sm text-slate-500 dark:text-slate-400">
                                    <button class="flex items-center space-x-2 hover:text-slate-700 dark:hover:text-slate-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        <span>Quick Start</span>
                                    </button>
                                    <button class="flex items-center space-x-2 hover:text-slate-700 dark:hover:text-slate-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span>Templates</span>
                                    </button>
                                </div>
                                <div class="flex items-center space-x-2 text-xs text-slate-400">
                                    <span>Press Enter to send</span>
                                    <kbd class="px-2 py-1 bg-slate-200 dark:bg-slate-700 rounded text-slate-600 dark:text-slate-300">⏎</kbd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Sidebar -->
                <div class="space-y-8 animate-on-scroll">
                    
                    <!-- Enhanced AI Capabilities -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            AI Capabilities
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 dark:text-white">Smart Content Generation</div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400">Creates relevant, engaging content automatically</div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M11 7h3m-3.5 3.5L9.5 8.5"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 dark:text-white">Auto Design Optimization</div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400">Applies professional layouts and styling</div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 dark:text-white">Instant Slide Creation</div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400">Generates complete slides in seconds</div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 dark:text-white">Template Recommendations</div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400">Suggests perfect templates for your content</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Progress Indicator -->
                        <div class="mt-6 pt-6 border-t border-slate-200/10">
                            <div class="flex items-center justify-between text-xs text-slate-600 dark:text-slate-400 mb-2">
                                <span>AI Learning Progress</span>
                                <span>96%</span>
                            </div>
                            <div class="w-full bg-slate-200/20 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-500 to-red-500 h-2 rounded-full animate-pulse" style="width: 96%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Recent Conversations -->
                    <div class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            Recent Chats
                        </h4>
                        <div class="space-y-3">
                            <div class="group glass-morphism-light p-4 rounded-2xl cursor-pointer hover:bg-white/20 transition-all duration-300 hover:scale-105 transform">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-900 dark:text-white text-sm group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Business Pitch</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Mobile app startup presentation</div>
                                    </div>
                                    <div class="text-xs text-slate-400">2h ago</div>
                                </div>
                            </div>
                            <div class="group glass-morphism-light p-4 rounded-2xl cursor-pointer hover:bg-white/20 transition-all duration-300 hover:scale-105 transform">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-900 dark:text-white text-sm group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Marketing Strategy</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Social media campaign focus</div>
                                    </div>
                                    <div class="text-xs text-slate-400">1d ago</div>
                                </div>
                            </div>
                            <div class="group glass-morphism-light p-4 rounded-2xl cursor-pointer hover:bg-white/20 transition-all duration-300 hover:scale-105 transform">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-900 dark:text-white text-sm group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Portfolio Review</div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">Creative work showcase</div>
                                    </div>
                                    <div class="text-xs text-slate-400">3d ago</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- View All Button -->
                        <button class="w-full mt-4 glass-morphism-light py-3 rounded-2xl text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-white/20 transition-all duration-300 hover:scale-105 transform">
                            View All Conversations
                        </button>
                    </div>

                    <!-- Enhanced Help Section -->
                    <div x-show="showHelp" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="glass-morphism-card rounded-3xl p-8 elegant-shadow-lg">
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Tips & Help
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-emerald-400 rounded-full mt-2 flex-shrink-0"></div>
                                <div class="text-sm text-slate-600 dark:text-slate-400">
                                    <strong class="text-slate-900 dark:text-white">Be specific</strong> about your presentation topic and target audience
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-400 rounded-full mt-2 flex-shrink-0"></div>
                                <div class="text-sm text-slate-600 dark:text-slate-400">
                                    <strong class="text-slate-900 dark:text-white">Mention the number</strong> of slides or presentation length you need
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-purple-400 rounded-full mt-2 flex-shrink-0"></div>
                                <div class="text-sm text-slate-600 dark:text-slate-400">
                                    <strong class="text-slate-900 dark:text-white">Include key points</strong> or specific topics you want to cover
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                <div class="text-sm text-slate-600 dark:text-slate-400">
                                    <strong class="text-slate-900 dark:text-white">Ask for design preferences</strong> like color themes or visual style
                                </div>
                            </div>
                        </div>
                        
                        <!-- Example Template -->
                        <div class="mt-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl border border-emerald-200 dark:border-emerald-700">
                            <div class="text-sm font-medium text-emerald-800 dark:text-emerald-300 mb-2">Example prompt:</div>
                            <div class="text-sm text-emerald-700 dark:text-emerald-400 italic">
                                "Create a 10-slide business presentation about sustainable energy for investors, 
                                including market analysis, our solution, and financial projections. Use a professional blue theme."
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Enhanced JavaScript for AI Assistant -->
    <script>
        function aiAssistantData() {
            return {
                messages: [],
                currentMessage: '',
                isTyping: false,
                showHelp: false,
                messageId: 1,
                scrollProgress: 0,
                
                init() {
                    // Enhanced scroll monitoring
                    const updateScrollState = () => {
                        const scrollY = window.scrollY;
                        const windowHeight = window.innerHeight;
                        const documentHeight = document.documentElement.scrollHeight;
                        
                        // Update scroll progress
                        this.scrollProgress = Math.min((scrollY / (documentHeight - windowHeight)) * 100, 100);
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
                
                sendMessage(message = null) {
                    const messageText = message || this.currentMessage.trim();
                    if (!messageText || this.isTyping) return;
                    
                    // Add user message with enhanced styling
                    this.messages.push({
                        id: this.messageId++,
                        type: 'user',
                        content: messageText,
                        time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
                    });
                    
                    this.currentMessage = '';
                    this.isTyping = true;
                    
                    // Show notification for user feedback
                    this.showNotification('Message sent! AI is processing...', 'info');
                    
                    // Simulate enhanced AI response with realistic delay
                    setTimeout(() => {
                        this.messages.push({
                            id: this.messageId++,
                            type: 'ai',
                            content: this.generateAIResponse(messageText),
                            time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
                        });
                        this.isTyping = false;
                        this.scrollToBottom();
                        this.showNotification('AI response received!', 'success');
                    }, Math.random() * 2000 + 2000); // 2-4 seconds for realism
                    
                    this.scrollToBottom();
                },
                
                generateAIResponse(userMessage) {
                    // Enhanced AI responses based on message content
                    const businessKeywords = ['business', 'pitch', 'startup', 'investor', 'company', 'profit'];
                    const educationalKeywords = ['education', 'learn', 'teach', 'school', 'student', 'academic'];
                    const marketingKeywords = ['marketing', 'social media', 'campaign', 'brand', 'advertisement'];
                    const portfolioKeywords = ['portfolio', 'showcase', 'work', 'project', 'creative'];

                    const lowerMessage = userMessage.toLowerCase();
                    
                    if (businessKeywords.some(keyword => lowerMessage.includes(keyword))) {
                        return "Excellent! I'll help you create a compelling business presentation. I recommend starting with an executive summary, market analysis, your unique value proposition, business model, competitive landscape, financial projections, and a strong call to action. Would you like me to focus on any specific aspect first?";
                    } else if (educationalKeywords.some(keyword => lowerMessage.includes(keyword))) {
                        return "Perfect for educational content! I suggest structuring your presentation with clear learning objectives, engaging visuals, interactive elements, and knowledge checkpoints. We can include real-world examples, case studies, and assessment questions. What's the primary learning goal for your audience?";
                    } else if (marketingKeywords.some(keyword => lowerMessage.includes(keyword))) {
                        return "Great choice for marketing! I'll help you create a presentation that tells your brand story effectively. We should include market research, target audience analysis, campaign strategies, success metrics, and ROI projections. What's your main marketing objective?";
                    } else if (portfolioKeywords.some(keyword => lowerMessage.includes(keyword))) {
                        return "Wonderful! A portfolio presentation should highlight your best work and tell your professional story. I recommend including an introduction, project showcases with before/after comparisons, your creative process, client testimonials, and future goals. What type of work would you like to feature prominently?";
                    } else {
                        const generalResponses = [
                            "That sounds like a fantastic presentation idea! I can help you structure this with a compelling opening, clear main points, supporting evidence, and a memorable conclusion. What's the primary goal you want to achieve with this presentation?",
                            "Excellent topic choice! I recommend creating 8-12 slides with a strong narrative flow. We can include engaging visuals, data visualization, and interactive elements. Who is your target audience for this presentation?",
                            "Perfect! I'll help you build a presentation that captures attention and delivers your message effectively. Let's start with defining your key objectives and then create content that resonates with your audience. What's the main takeaway you want people to remember?",
                            "Great concept! I can assist you in creating a professional presentation with compelling storytelling, visual hierarchy, and clear calls to action. Would you like to focus on persuasive content, informational delivery, or inspirational messaging?"
                        ];
                        return generalResponses[Math.floor(Math.random() * generalResponses.length)];
                    }
                },
                
                startNewChat() {
                    this.messages = [];
                    this.currentMessage = '';
                    this.isTyping = false;
                    this.showNotification('New chat started! Ready for your next presentation idea.', 'success');
                },
                
                scrollToBottom() {
                    this.$nextTick(() => {
                        const container = this.$refs.messagesContainer;
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    });
                },
                
                showNotification(message, type = 'info') {
                    // Enhanced notification system
                    const notification = document.createElement('div');
                    notification.className = `fixed top-6 right-6 z-50 p-4 rounded-2xl shadow-2xl transform transition-all duration-500 translate-x-full max-w-sm`;
                    
                    // Set notification style based on type
                    const styles = {
                        success: 'bg-gradient-to-r from-emerald-500 to-teal-600 text-white',
                        error: 'bg-gradient-to-r from-red-500 to-pink-600 text-white',
                        info: 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white',
                        warning: 'bg-gradient-to-r from-yellow-500 to-orange-600 text-white'
                    };
                    
                    notification.className += ` ${styles[type] || styles.info}`;
                    
                    // Add icon based on type
                    const icons = {
                        success: '✓',
                        error: '✗',
                        info: 'ℹ',
                        warning: '⚠'
                    };
                    
                    notification.innerHTML = `
                        <div class="flex items-center space-x-3">
                            <div class="text-lg font-bold">${icons[type] || icons.info}</div>
                            <div class="text-sm font-medium">${message}</div>
                        </div>
                    `;
                    
                    document.body.appendChild(notification);
                    
                    // Animate in
                    setTimeout(() => {
                        notification.classList.remove('translate-x-full');
                    }, 100);
                    
                    // Auto remove after 4 seconds
                    setTimeout(() => {
                        notification.classList.add('translate-x-full');
                        setTimeout(() => {
                            if (notification.parentNode) {
                                notification.parentNode.removeChild(notification);
                            }
                        }, 500);
                    }, 4000);
                }
            }
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

        /* Custom Scrollbar for Chat */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, rgba(255, 138, 101, 0.8), rgba(239, 68, 68, 0.8));
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, rgba(255, 138, 101, 1), rgba(239, 68, 68, 1));
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
            
            .h-\[700px\] {
                height: 500px;
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
        input:focus,
        a:focus {
            outline: 2px solid #f97316;
            outline-offset: 2px;
        }

        /* Enhanced chat message animations */
        .chat-message-enter {
            animation: slideInUp 0.3s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-layouts.app>
