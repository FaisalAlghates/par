<div x-data="{ 
    darkMode: false, 
    currentSlide: 0,
    totalSlides: 3,
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
    },
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
    }
}" 
x-init="
    darkMode = localStorage.getItem('darkMode') === 'true';
    setInterval(() => nextSlide(), 5000);
" 
:class="{ 'dark': darkMode }"
class="relative">

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text">DocuMagic AI</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-slate-700 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">Features</a>
                    <a href="#how-it-works" class="text-slate-700 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">How It Works</a>
                    <a href="#testimonials" class="text-slate-700 dark:text-slate-300 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">Testimonials</a>
                    <a href="/documentations/create" class="px-6 py-2 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-full hover:from-violet-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 elegant-shadow">
                        Get Started
                    </a>
                </div>

                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" 
                        class="p-2 rounded-xl glass-effect hover:bg-white/20 transition-all duration-300 group">
                    <div x-show="!darkMode" class="w-5 h-5 text-amber-500 group-hover:text-amber-400 transition-colors">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div x-show="darkMode" class="w-5 h-5 text-violet-400 group-hover:text-violet-300 transition-colors">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden pt-16">
        <!-- Animated Background -->
        <div class="absolute inset-0 aurora-bg opacity-5"></div>
        <div class="absolute inset-0 mesh-gradient opacity-10"></div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-br from-violet-400/20 to-purple-600/20 rounded-full filter blur-3xl floating-animation"></div>
            <div class="absolute top-3/4 right-1/4 w-96 h-96 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-1/4 left-1/2 w-80 h-80 bg-gradient-to-br from-pink-400/20 to-rose-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -4s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <!-- Hero Title -->
            <div class="mb-8 animate__animated animate__fadeInUp">
                <h1 class="text-7xl md:text-9xl font-black mb-4">
                    <span class="gradient-text">Docu</span><span class="text-slate-900 dark:text-white">Magic</span>
                </h1>
                <div class="text-3xl md:text-4xl font-light text-violet-600 dark:text-violet-400 flex items-center justify-center space-x-2">
                    <span class="animate-pulse">✨</span>
                    <span>AI-Powered</span>
                    <span class="animate-pulse">✨</span>
                </div>
            </div>

            <!-- Hero Subtitle -->
            <div class="mb-12 animate__animated animate__fadeInUp animate__delay-1s">
                <h2 class="text-3xl md:text-5xl font-light text-slate-700 dark:text-slate-300 mb-6 leading-tight">
                    Transform any document into
                    <br>
                    <span class="font-semibold bg-gradient-to-r from-violet-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        breathtaking presentations
                    </span>
                </h2>
                <p class="text-xl md:text-2xl text-slate-600 dark:text-slate-400 max-w-4xl mx-auto leading-relaxed">
                    Upload your documents and watch our advanced AI create stunning, interactive slideshows 
                    that captivate your audience and deliver your message with unprecedented impact.
                </p>
            </div>

            <!-- Hero CTA -->
            <div class="mb-16 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="/documentations/create" 
                       class="group relative overflow-hidden px-8 py-4 bg-gradient-to-r from-violet-600 to-purple-600 text-white text-lg font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 glow hover:from-violet-700 hover:to-purple-700">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Create Your Presentation
                        </span>
                    </a>
                    
                    <a href="#demo" 
                       class="px-8 py-4 glass-effect text-slate-700 dark:text-slate-300 text-lg font-semibold rounded-2xl hover:bg-white/20 transition-all duration-300 border border-white/20">
                        <span class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Watch Demo
                        </span>
                    </a>
                </div>
            </div>

            <!-- Hero Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto animate__animated animate__fadeInUp animate__delay-3s">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">10K+</div>
                    <div class="text-slate-600 dark:text-slate-400">Documents Processed</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">99.9%</div>
                    <div class="text-slate-600 dark:text-slate-400">Accuracy Rate</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">5M+</div>
                    <div class="text-slate-600 dark:text-slate-400">Slides Generated</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">24/7</div>
                    <div class="text-slate-600 dark:text-slate-400">AI Processing</div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-slate-400 dark:border-slate-600 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-slate-400 dark:bg-slate-600 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-slate-100/50 dark:bg-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">Powerful Features</h2>
                <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto">
                    Experience the future of presentation creation with our cutting-edge AI technology
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Universal Format Support</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Seamlessly process Word documents, PDFs, Markdown files, and more with perfect accuracy
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-300 rounded-full text-sm">.docx</span>
                        <span class="px-3 py-1 bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-300 rounded-full text-sm">.pdf</span>
                        <span class="px-3 py-1 bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-300 rounded-full text-sm">.md</span>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">AI-Powered Intelligence</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Advanced machine learning algorithms understand context and create meaningful slide structures
                    </p>
                    <div class="flex items-center text-blue-600 dark:text-blue-400">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse mr-2"></div>
                        <span class="text-sm font-medium">Neural Network Processing</span>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Beautiful Design Templates</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Choose from professionally designed themes that make your presentations stand out
                    </p>
                    <div class="flex space-x-2">
                        <div class="w-4 h-4 bg-gradient-to-br from-pink-400 to-rose-500 rounded-full"></div>
                        <div class="w-4 h-4 bg-gradient-to-br from-purple-400 to-violet-500 rounded-full"></div>
                        <div class="w-4 h-4 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full"></div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Lightning Fast Processing</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Generate professional presentations in seconds, not hours
                    </p>
                    <div class="text-emerald-600 dark:text-emerald-400 font-semibold">⚡ Under 30 seconds</div>
                </div>

                <!-- Feature 5 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Smart Customization</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Fine-tune colors, fonts, layouts, and animations to match your brand
                    </p>
                    <div class="text-amber-600 dark:text-amber-400 font-semibold">🎨 Infinite Possibilities</div>
                </div>

                <!-- Feature 6 -->
                <div class="group p-8 glass-effect rounded-3xl hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 elegant-shadow">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Easy Sharing & Export</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Share presentations instantly or export to multiple formats
                    </p>
                    <div class="text-indigo-600 dark:text-indigo-400 font-semibold">📤 One-Click Export</div>
                </div>
            </div>
        </div>
    </section>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">How It Works</h2>
                <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto">
                    Create stunning presentations in just three simple steps
                </p>
            </div>

            <!-- Steps -->
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Step 1 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto elegant-shadow group-hover:scale-110 transition-transform duration-300">
                            <span class="text-3xl font-bold text-white">1</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-pink-400 to-rose-500 rounded-full animate-pulse"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Upload Document</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Simply drag and drop your Word document, PDF, or Markdown file. Our system supports all major formats.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-3xl flex items-center justify-center mx-auto elegant-shadow group-hover:scale-110 transition-transform duration-300">
                            <span class="text-3xl font-bold text-white">2</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">AI Processing</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Our advanced AI analyzes your content, extracts key points, and structures them into logical slides.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl flex items-center justify-center mx-auto elegant-shadow group-hover:scale-110 transition-transform duration-300">
                            <span class="text-3xl font-bold text-white">3</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-violet-400 to-purple-500 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Present & Share</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Your beautiful presentation is ready! Present directly or export to share with your audience.
                    </p>
                </div>
            </div>

            <!-- Connection Lines -->
            <div class="hidden md:flex justify-center items-center mt-12">
                <div class="flex items-center space-x-8">
                    <div class="w-20 h-1 bg-gradient-to-r from-violet-500 to-purple-600 rounded-full"></div>
                    <div class="w-4 h-4 bg-purple-500 rounded-full animate-pulse"></div>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-full"></div>
                    <div class="w-4 h-4 bg-cyan-500 rounded-full animate-pulse"></div>
                    <div class="w-20 h-1 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-slate-100/50 dark:bg-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">What Users Say</h2>
                <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto">
                    Join thousands of satisfied users who transformed their presentation workflow
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="p-8 glass-effect rounded-3xl elegant-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-slate-900 dark:text-white">Sarah Johnson</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm">Marketing Director</p>
                        </div>
                    </div>
                    <p class="text-slate-700 dark:text-slate-300 italic">
                        "DocuMagic AI saved me hours of work. The presentations it creates are not just functional, they're absolutely stunning!"
                    </p>
                    <div class="flex text-amber-400 mt-4">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="p-8 glass-effect rounded-3xl elegant-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full flex items-center justify-center text-white font-bold">
                            M
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-slate-900 dark:text-white">Michael Chen</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm">Product Manager</p>
                        </div>
                    </div>
                    <p class="text-slate-700 dark:text-slate-300 italic">
                        "The AI understands context better than I expected. It creates presentations that actually make sense and flow naturally."
                    </p>
                    <div class="flex text-amber-400 mt-4">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="p-8 glass-effect rounded-3xl elegant-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-slate-900 dark:text-white">Anna Rodriguez</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm">UX Designer</p>
                        </div>
                    </div>
                    <p class="text-slate-700 dark:text-slate-300 italic">
                        "Finally, a tool that understands design! The layouts are modern and the animations are smooth and professional."
                    </p>
                    <div class="flex text-amber-400 mt-4">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-violet-600 via-purple-600 to-indigo-600"></div>
        <div class="absolute inset-0 aurora-bg opacity-30"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Ready to Transform Your Documents?
            </h2>
            <p class="text-xl text-violet-100 mb-12 max-w-2xl mx-auto">
                Join thousands of professionals who create stunning presentations in minutes, not hours.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="/documentations/create" 
                   class="px-10 py-4 bg-white text-violet-600 text-xl font-bold rounded-2xl hover:bg-violet-50 transition-all duration-300 transform hover:scale-105 elegant-shadow">
                    Start Creating Now
                </a>
                <a href="#demo" 
                   class="px-10 py-4 glass-effect text-white text-xl font-bold rounded-2xl hover:bg-white/20 transition-all duration-300 border border-white/30">
                    Watch Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-16 bg-slate-900 dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white">DocuMagic AI</span>
                    </div>
                    <p class="text-slate-400 max-w-md leading-relaxed">
                        Transform your documents into stunning presentations with the power of artificial intelligence. 
                        Professional results in seconds, not hours.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-white font-bold mb-4">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-slate-400 hover:text-violet-400 transition-colors">Features</a></li>
                        <li><a href="#how-it-works" class="text-slate-400 hover:text-violet-400 transition-colors">How It Works</a></li>
                        <li><a href="#testimonials" class="text-slate-400 hover:text-violet-400 transition-colors">Testimonials</a></li>
                        <li><a href="/documentations/create" class="text-slate-400 hover:text-violet-400 transition-colors">Get Started</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-white font-bold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Documentation</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Contact Us</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Status</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between">
                <p class="text-slate-400">© 2025 DocuMagic AI. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-slate-400 hover:text-violet-400 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>
