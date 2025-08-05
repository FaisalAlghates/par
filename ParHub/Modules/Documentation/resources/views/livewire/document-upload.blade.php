<div x-data="{ darkMode: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true'" :class="{ 'dark': darkMode }" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900">
    
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

                <!-- Back Button -->
                <a href="/" class="flex items-center space-x-2 px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center mb-16">
                <!-- Floating Animation Elements -->
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-20 h-20 bg-gradient-to-br from-violet-400/20 to-purple-600/20 rounded-full filter blur-xl floating-animation"></div>
                    <div class="absolute -top-5 -right-5 w-16 h-16 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full filter blur-xl floating-animation" style="animation-delay: -2s;"></div>
                </div>
                
                <div class="relative">
                    <!-- Icon -->
                    <div class="w-24 h-24 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-8 elegant-shadow floating-animation">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>

                    <!-- Title -->
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">
                        <span class="gradient-text">Upload Your</span>
                        <br>
                        <span class="text-slate-900 dark:text-white">Document</span>
                    </h1>
                    
                    <!-- Subtitle -->
                    <p class="text-xl md:text-2xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
                        Transform your documents into stunning AI-powered presentations in seconds
                    </p>
                </div>
            </div>

            <!-- Upload Form -->
            <div class="glass-effect rounded-3xl p-8 md:p-12 elegant-shadow">
                
                <!-- Success/Error Messages -->
                @if (session()->has('success'))
                    <div class="mb-8 p-6 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 border border-emerald-200 dark:border-emerald-700 rounded-2xl">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-emerald-700 dark:text-emerald-300 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mb-8 p-6 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 border border-red-200 dark:border-red-700 rounded-2xl">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-red-700 dark:text-red-300 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <form wire:submit.prevent="uploadDocument" class="space-y-8">
                    
                    <!-- File Upload Area -->
                    <div class="space-y-4">
                        <label class="block text-lg font-semibold text-slate-900 dark:text-white">
                            Choose Your Document
                        </label>
                        
                        <!-- Upload Zone -->
                        <div class="relative group">
                            <input 
                                type="file" 
                                wire:model="file" 
                                id="file" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" 
                                accept=".pdf,.docx,.doc,.md,.txt"
                            >
                            
                            <div class="border-3 border-dashed border-violet-300 dark:border-violet-600 rounded-2xl p-12 text-center hover:border-violet-500 dark:hover:border-violet-400 transition-all duration-300 bg-gradient-to-br from-violet-50/50 to-purple-50/50 dark:from-violet-900/20 dark:to-purple-900/20 group-hover:from-violet-100/70 group-hover:to-purple-100/70 dark:group-hover:from-violet-900/30 dark:group-hover:to-purple-900/30">
                                
                                <!-- Upload Icon -->
                                <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </div>

                                <!-- Upload Text -->
                                <div class="space-y-4">
                                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                        Drop your file here or click to browse
                                    </h3>
                                    <p class="text-lg text-slate-600 dark:text-slate-400">
                                        Support for PDF, Word, and Markdown files
                                    </p>
                                    
                                    <!-- File Type Icons -->
                                    <div class="flex justify-center items-center space-x-6 pt-4">
                                        <div class="flex flex-col items-center">
                                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center mb-2">
                                                <span class="text-white font-bold text-sm">PDF</span>
                                            </div>
                                            <span class="text-xs text-slate-500">.pdf</span>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mb-2">
                                                <span class="text-white font-bold text-sm">DOC</span>
                                            </div>
                                            <span class="text-xs text-slate-500">.docx</span>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center mb-2">
                                                <span class="text-white font-bold text-sm">MD</span>
                                            </div>
                                            <span class="text-xs text-slate-500">.md</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- File Size Limit -->
                                <div class="mt-6 pt-6 border-t border-violet-200 dark:border-violet-700">
                                    <p class="text-sm text-slate-500 dark:text-slate-400">
                                        Maximum file size: 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- File Preview -->
                        @if($file)
                            <div class="p-4 bg-violet-50 dark:bg-violet-900/20 rounded-xl border border-violet-200 dark:border-violet-700">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-violet-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-slate-900 dark:text-white">{{ $file->getClientOriginalName() }}</p>
                                        <p class="text-sm text-slate-500">{{ number_format($file->getSize() / 1024, 1) }} KB</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Document Title -->
                    <div class="space-y-4">
                        <label for="title" class="block text-lg font-semibold text-slate-900 dark:text-white">
                            Presentation Title (Optional)
                        </label>
                        <input 
                            type="text" 
                            wire:model="title" 
                            id="title" 
                            placeholder="Enter a custom title for your presentation..."
                            class="w-full px-6 py-4 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-violet-500 text-slate-900 dark:text-white placeholder-slate-500 text-lg backdrop-blur-sm transition-all duration-200"
                        >
                    </div>

                    <!-- AI Processing Options -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">AI Processing Options</h3>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- Style Option -->
                            <div class="p-4 glass-effect rounded-xl border border-white/20">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Presentation Style
                                </label>
                                <select wire:model="style" class="w-full px-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-violet-500 text-slate-900 dark:text-white">
                                    <option value="professional">Professional</option>
                                    <option value="creative">Creative</option>
                                    <option value="minimal">Minimal</option>
                                    <option value="corporate">Corporate</option>
                                </select>
                            </div>

                            <!-- Color Theme -->
                            <div class="p-4 glass-effect rounded-xl border border-white/20">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Color Theme
                                </label>
                                <select wire:model="theme" class="w-full px-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-violet-500 text-slate-900 dark:text-white">
                                    <option value="blue">Ocean Blue</option>
                                    <option value="purple">Royal Purple</option>
                                    <option value="green">Forest Green</option>
                                    <option value="red">Sunset Red</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button 
                            type="submit" 
                            wire:loading.attr="disabled"
                            wire:target="uploadDocument"
                            class="w-full group relative overflow-hidden px-8 py-6 bg-gradient-to-r from-violet-600 to-purple-600 text-white text-xl font-bold rounded-2xl transition-all duration-300 transform hover:scale-[1.02] glow hover:from-violet-700 hover:to-purple-700 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span wire:loading.remove wire:target="uploadDocument" class="flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Generate AI Presentation
                            </span>
                            
                            <span wire:loading wire:target="uploadDocument" class="flex items-center justify-center">
                                <svg class="animate-spin w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing your document...
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Features Info -->
            <div class="mt-16 grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Lightning Fast</h3>
                    <p class="text-slate-600 dark:text-slate-400">Process documents in under 30 seconds</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Smart AI</h3>
                    <p class="text-slate-600 dark:text-slate-400">Advanced content understanding</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Beautiful Design</h3>
                    <p class="text-slate-600 dark:text-slate-400">Professional templates and themes</p>
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
        
        .border-3 {
            border-width: 3px;
        }
    </style>
</div>
