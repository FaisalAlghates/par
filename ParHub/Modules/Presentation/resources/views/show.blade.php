<x-presentation::components.layouts.master title="Presentation - {{ $document->title }}">
<div x-data="presentationViewer()" x-init="init()" :class="{ 'dark': darkMode }" class="min-h-screen bg-slate-900 text-white">
    
    <!-- Navigation Bar (Only in normal mode) -->
    <nav x-show="!isFullscreen" class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and Title -->
                <div class="flex items-center space-x-4">
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold gradient-text">DocuMagic AI</span>
                    </a>
                    <div class="hidden md:block">
                        <span class="text-slate-400">•</span>
                        <span class="ml-2 text-slate-300">{{ $document->title }}</span>
                    </div>
                </div>

                <!-- Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Export Button -->
                    <div class="relative" x-data="{ showExport: false }">
                        <button @click="showExport = !showExport" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </button>
                        
                        <!-- Export Menu -->
                        <div x-show="showExport" @click.away="showExport = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             class="absolute right-0 mt-2 w-48 glass-effect rounded-xl py-2 z-10">
                            <a href="{{ route('presentations.export', $document->id) }}?format=pdf" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as PDF
                            </a>
                            <a href="{{ route('presentations.export', $document->id) }}?format=pptx" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as PowerPoint
                            </a>
                            <a href="{{ route('presentations.export', $document->id) }}?format=html" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as HTML
                            </a>
                        </div>
                    </div>

                    <!-- Fullscreen Button -->
                    <button @click="toggleFullscreen()" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                        </svg>
                    </button>

                    <!-- Back Button -->
                    <a href="/documentations/create" class="px-4 py-2 bg-gradient-to-r from-violet-600 to-purple-600 rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 text-white">
                        New Presentation
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Presentation Area -->
    <div class="flex h-screen" :class="{ 'pt-16': !isFullscreen }">
        
        <!-- Slide Navigation (Only in normal mode) -->
        <div x-show="!isFullscreen" class="w-80 bg-slate-800/50 border-r border-slate-700 overflow-y-auto">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4 text-slate-300">Slides</h3>
                <div class="space-y-3">
                    @foreach($document->slides as $index => $slide)
                        <div @click="goToSlide({{ $index }})" 
                             :class="{ 'ring-2 ring-violet-500': currentSlide === {{ $index }} }"
                             class="p-4 bg-slate-700/50 rounded-xl cursor-pointer hover:bg-slate-700 transition-all duration-200 group">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-white truncate">{{ $slide->title }}</h4>
                                    <p class="text-xs text-slate-400 capitalize">{{ $slide->slide_type }}</p>
                                </div>
                            </div>
                            <!-- Mini Preview -->
                            <div class="mt-3 h-16 bg-slate-600/30 rounded-lg flex items-center justify-center text-xs text-slate-400 group-hover:bg-slate-600/50 transition-colors">
                                Slide Preview
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Slide Display -->
        <div class="flex-1 flex flex-col">
            
            <!-- Slide Content -->
            <div class="flex-1 flex items-center justify-center p-8">
                <div class="w-full max-w-6xl aspect-video bg-white rounded-2xl shadow-2xl overflow-hidden relative">
                    
                    <!-- Slide Content Container -->
                    <div class="w-full h-full p-12 flex flex-col justify-center" id="slide-content">
                        @foreach($document->slides as $index => $slide)
                            <div x-show="currentSlide === {{ $index }}" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-x-8"
                                 x-transition:enter-end="opacity-1 transform translate-x-0"
                                 class="slide-content text-slate-900">
                                {!! $slide->content !!}
                            </div>
                        @endforeach
                    </div>

                    <!-- Slide Number Indicator -->
                    <div class="absolute bottom-6 right-6 px-4 py-2 bg-slate-900/80 text-white rounded-full text-sm font-medium">
                        <span x-text="currentSlide + 1"></span> / {{ count($document->slides) }}
                    </div>
                </div>
            </div>

            <!-- Presentation Controls -->
            <div class="flex items-center justify-center space-x-6 py-6 bg-slate-800/30">
                
                <!-- Previous Button -->
                <button @click="previousSlide()" 
                        :disabled="currentSlide === 0"
                        :class="{ 'opacity-50 cursor-not-allowed': currentSlide === 0 }"
                        class="p-3 bg-slate-700 hover:bg-slate-600 rounded-xl transition-all duration-200 disabled:hover:bg-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Play/Pause Button -->
                <button @click="toggleAutoplay()" 
                        class="p-4 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 rounded-xl transition-all duration-200">
                    <svg x-show="!isPlaying" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg x-show="isPlaying" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>

                <!-- Next Button -->
                <button @click="nextSlide()" 
                        :disabled="currentSlide === {{ count($document->slides) - 1 }}"
                        :class="{ 'opacity-50 cursor-not-allowed': currentSlide === {{ count($document->slides) - 1 }} }"
                        class="p-3 bg-slate-700 hover:bg-slate-600 rounded-xl transition-all duration-200 disabled:hover:bg-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Progress Bar -->
                <div class="flex-1 max-w-md">
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-violet-500 to-purple-600 h-2 rounded-full transition-all duration-300" 
                             :style="`width: ${((currentSlide + 1) / {{ count($document->slides) }}) * 100}%`">
                        </div>
                    </div>
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

        .slide-content h1 {
            @apply text-4xl md:text-6xl font-bold mb-6;
        }

        .slide-content h2 {
            @apply text-3xl md:text-4xl font-bold mb-4;
        }

        .slide-content h3 {
            @apply text-2xl font-semibold mb-3;
        }

        .slide-content p {
            @apply text-lg leading-relaxed mb-4;
        }

        .slide-content ul {
            @apply list-disc list-inside space-y-2 text-lg;
        }

        .slide-content .grid {
            @apply gap-6;
        }

        /* Fullscreen styles */
        .slide-content.fullscreen {
            @apply p-16;
        }

        .slide-content.fullscreen h1 {
            @apply text-6xl md:text-8xl;
        }

        .slide-content.fullscreen h2 {
            @apply text-4xl md:text-6xl;
        }
    </style>

    <!-- JavaScript for Presentation Logic -->
    <script>
        function presentationViewer() {
            return {
                currentSlide: 0,
                totalSlides: {{ count($document->slides) }},
                isPlaying: false,
                isFullscreen: false,
                darkMode: false,
                autoplayInterval: null,

                init() {
                    this.darkMode = localStorage.getItem('darkMode') === 'true';
                    this.setupKeyboardControls();
                },

                setupKeyboardControls() {
                    document.addEventListener('keydown', (e) => {
                        switch(e.key) {
                            case 'ArrowRight':
                            case ' ':
                                e.preventDefault();
                                this.nextSlide();
                                break;
                            case 'ArrowLeft':
                                e.preventDefault();
                                this.previousSlide();
                                break;
                            case 'f':
                            case 'F11':
                                e.preventDefault();
                                this.toggleFullscreen();
                                break;
                            case 'Escape':
                                if (this.isFullscreen) {
                                    this.exitFullscreen();
                                }
                                break;
                        }
                    });
                },

                nextSlide() {
                    if (this.currentSlide < this.totalSlides - 1) {
                        this.currentSlide++;
                    }
                },

                previousSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                    }
                },

                goToSlide(index) {
                    this.currentSlide = index;
                },

                toggleAutoplay() {
                    this.isPlaying = !this.isPlaying;
                    
                    if (this.isPlaying) {
                        this.autoplayInterval = setInterval(() => {
                            if (this.currentSlide < this.totalSlides - 1) {
                                this.nextSlide();
                            } else {
                                this.isPlaying = false;
                                clearInterval(this.autoplayInterval);
                            }
                        }, 5000);
                    } else {
                        clearInterval(this.autoplayInterval);
                    }
                },

                toggleFullscreen() {
                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen();
                        this.isFullscreen = true;
                    } else {
                        this.exitFullscreen();
                    }
                },

                exitFullscreen() {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                    this.isFullscreen = false;
                }
            }
        }

        // Listen for fullscreen changes
        document.addEventListener('fullscreenchange', function() {
            // Update Alpine component state if needed
        });
    </script>
</div>
</x-presentation::components.layouts.master>
    
    <!-- Navigation Bar (Only in normal mode) -->
    <nav x-show="!isFullscreen" class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and Title -->
                <div class="flex items-center space-x-4">
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold gradient-text">DocuMagic AI</span>
                    </a>
                    <div class="hidden md:block">
                        <span class="text-slate-400">•</span>
                        <span class="ml-2 text-slate-300">{{ $document->title }}</span>
                    </div>
                </div>

                <!-- Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Export Button -->
                    <div class="relative" x-data="{ showExport: false }">
                        <button @click="showExport = !showExport" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </button>
                        
                        <!-- Export Menu -->
                        <div x-show="showExport" @click.away="showExport = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             class="absolute right-0 mt-2 w-48 glass-effect rounded-xl py-2 z-10">
                            <a href="{{ route('presentations.export', $document->id) }}?format=pdf" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as PDF
                            </a>
                            <a href="{{ route('presentations.export', $document->id) }}?format=pptx" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as PowerPoint
                            </a>
                            <a href="{{ route('presentations.export', $document->id) }}?format=html" class="block px-4 py-2 hover:bg-white/10 transition-colors">
                                Export as HTML
                            </a>
                        </div>
                    </div>

                    <!-- Fullscreen Button -->
                    <button @click="toggleFullscreen()" class="px-4 py-2 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                        </svg>
                    </button>

                    <!-- Back Button -->
                    <a href="/documentations/create" class="px-4 py-2 bg-gradient-to-r from-violet-600 to-purple-600 rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 text-white">
                        New Presentation
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Presentation Area -->
    <div class="flex h-screen" :class="{ 'pt-16': !isFullscreen }">
        
        <!-- Slide Navigation (Only in normal mode) -->
        <div x-show="!isFullscreen" class="w-80 bg-slate-800/50 border-r border-slate-700 overflow-y-auto">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4 text-slate-300">Slides</h3>
                <div class="space-y-3">
                    @foreach($document->slides as $index => $slide)
                        <div @click="goToSlide({{ $index }})" 
                             :class="{ 'ring-2 ring-violet-500': currentSlide === {{ $index }} }"
                             class="p-4 bg-slate-700/50 rounded-xl cursor-pointer hover:bg-slate-700 transition-all duration-200 group">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-white truncate">{{ $slide->title }}</h4>
                                    <p class="text-xs text-slate-400 capitalize">{{ $slide->slide_type }}</p>
                                </div>
                            </div>
                            <!-- Mini Preview -->
                            <div class="mt-3 h-16 bg-slate-600/30 rounded-lg flex items-center justify-center text-xs text-slate-400 group-hover:bg-slate-600/50 transition-colors">
                                Slide Preview
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Slide Display -->
        <div class="flex-1 flex flex-col">
            
            <!-- Slide Content -->
            <div class="flex-1 flex items-center justify-center p-8">
                <div class="w-full max-w-6xl aspect-video bg-white rounded-2xl shadow-2xl overflow-hidden relative">
                    
                    <!-- Slide Content Container -->
                    <div class="w-full h-full p-12 flex flex-col justify-center" id="slide-content">
                        @foreach($document->slides as $index => $slide)
                            <div x-show="currentSlide === {{ $index }}" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-x-8"
                                 x-transition:enter-end="opacity-1 transform translate-x-0"
                                 class="slide-content text-slate-900">
                                {!! $slide->content !!}
                            </div>
                        @endforeach
                    </div>

                    <!-- Slide Number Indicator -->
                    <div class="absolute bottom-6 right-6 px-4 py-2 bg-slate-900/80 text-white rounded-full text-sm font-medium">
                        <span x-text="currentSlide + 1"></span> / {{ count($document->slides) }}
                    </div>
                </div>
            </div>

            <!-- Presentation Controls -->
            <div class="flex items-center justify-center space-x-6 py-6 bg-slate-800/30">
                
                <!-- Previous Button -->
                <button @click="previousSlide()" 
                        :disabled="currentSlide === 0"
                        :class="{ 'opacity-50 cursor-not-allowed': currentSlide === 0 }"
                        class="p-3 bg-slate-700 hover:bg-slate-600 rounded-xl transition-all duration-200 disabled:hover:bg-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Play/Pause Button -->
                <button @click="toggleAutoplay()" 
                        class="p-4 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 rounded-xl transition-all duration-200">
                    <svg x-show="!isPlaying" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg x-show="isPlaying" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>

                <!-- Next Button -->
                <button @click="nextSlide()" 
                        :disabled="currentSlide === {{ count($document->slides) - 1 }}"
                        :class="{ 'opacity-50 cursor-not-allowed': currentSlide === {{ count($document->slides) - 1 }} }"
                        class="p-3 bg-slate-700 hover:bg-slate-600 rounded-xl transition-all duration-200 disabled:hover:bg-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Progress Bar -->
                <div class="flex-1 max-w-md">
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-violet-500 to-purple-600 h-2 rounded-full transition-all duration-300" 
                             :style="`width: ${((currentSlide + 1) / {{ count($document->slides) }}) * 100}%`">
                        </div>
                    </div>
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

        .slide-content h1 {
            @apply text-4xl md:text-6xl font-bold mb-6;
        }

        .slide-content h2 {
            @apply text-3xl md:text-4xl font-bold mb-4;
        }

        .slide-content h3 {
            @apply text-2xl font-semibold mb-3;
        }

        .slide-content p {
            @apply text-lg leading-relaxed mb-4;
        }

        .slide-content ul {
            @apply list-disc list-inside space-y-2 text-lg;
        }

        .slide-content .grid {
            @apply gap-6;
        }

        /* Fullscreen styles */
        .slide-content.fullscreen {
            @apply p-16;
        }

        .slide-content.fullscreen h1 {
            @apply text-6xl md:text-8xl;
        }

        .slide-content.fullscreen h2 {
            @apply text-4xl md:text-6xl;
        }
    </style>

    <!-- JavaScript for Presentation Logic -->
    <script>
        function presentationViewer() {
            return {
                currentSlide: 0,
                totalSlides: {{ count($document->slides) }},
                isPlaying: false,
                isFullscreen: false,
                darkMode: false,
                autoplayInterval: null,

                init() {
                    this.darkMode = localStorage.getItem('darkMode') === 'true';
                    this.setupKeyboardControls();
                },

                setupKeyboardControls() {
                    document.addEventListener('keydown', (e) => {
                        switch(e.key) {
                            case 'ArrowRight':
                            case ' ':
                                e.preventDefault();
                                this.nextSlide();
                                break;
                            case 'ArrowLeft':
                                e.preventDefault();
                                this.previousSlide();
                                break;
                            case 'f':
                            case 'F11':
                                e.preventDefault();
                                this.toggleFullscreen();
                                break;
                            case 'Escape':
                                if (this.isFullscreen) {
                                    this.exitFullscreen();
                                }
                                break;
                        }
                    });
                },

                nextSlide() {
                    if (this.currentSlide < this.totalSlides - 1) {
                        this.currentSlide++;
                    }
                },

                previousSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                    }
                },

                goToSlide(index) {
                    this.currentSlide = index;
                },

                toggleAutoplay() {
                    this.isPlaying = !this.isPlaying;
                    
                    if (this.isPlaying) {
                        this.autoplayInterval = setInterval(() => {
                            if (this.currentSlide < this.totalSlides - 1) {
                                this.nextSlide();
                            } else {
                                this.isPlaying = false;
                                clearInterval(this.autoplayInterval);
                            }
                        }, 5000);
                    } else {
                        clearInterval(this.autoplayInterval);
                    }
                },

                toggleFullscreen() {
                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen();
                        this.isFullscreen = true;
                    } else {
                        this.exitFullscreen();
                    }
                },

                exitFullscreen() {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                    this.isFullscreen = false;
                }
            }
        }

        // Listen for fullscreen changes
        document.addEventListener('fullscreenchange', function() {
            // Update Alpine component state if needed
        });
    </script>
</div>
