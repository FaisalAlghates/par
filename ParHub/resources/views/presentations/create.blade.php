<x-layouts.app :title="__('Create Presentation')" x-data="createPresentationData()">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-96 h-96 bg-gradient-to-r from-violet-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-emerald-400 to-cyan-500 rounded-full opacity-15 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10 pb-20 main-content">
        <div class="max-w-6xl mx-auto">
            
            <!-- Header Section -->
            <div class="mb-10 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-6">
                            <a href="/presentations" 
                               class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-6 h-6 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-4xl font-bold text-white mb-2">
                                    Create New Presentation
                                </h1>
                                <p class="text-white/70 text-lg">
                                    Choose how you want to create your presentation.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="flex items-center space-x-3">
                            <button @click="scrollToTemplates()" 
                                    class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group" 
                                    title="Scroll to Templates">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m0 0l7-7 7 7z"></path>
                                </svg>
                            </button>
                            <button class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                            </button>
                            <button class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Creation Options -->
            <div class="grid lg:grid-cols-3 gap-8 mb-10 animate-fade-in-up" style="animation-delay: 0.2s">
                
                <!-- From Template Card -->
                <div @click="createFromTemplate()" 
                     class="glass-effect-card rounded-3xl p-8 elegant-shadow hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-600/20 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    
                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="w-20 h-20 bg-gradient-to-br from-violet-600 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-2xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">From Template</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6 text-lg leading-relaxed">
                            Choose from our collection of professional templates to get started quickly.
                        </p>

                        <!-- Action Button -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-violet-600 dark:text-violet-400 font-semibold text-lg group-hover:text-violet-700 dark:group-hover:text-violet-300 transition-colors">
                                Browse Templates
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">100+ Templates</div>
                        </div>
                    </div>
                </div>

                <!-- Upload Document Card -->
                <div @click="uploadDocument()" 
                     class="glass-effect-card rounded-3xl p-8 elegant-shadow hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    
                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-2xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Upload Document</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6 text-lg leading-relaxed">
                            Upload a PDF, Word document, or PowerPoint file to convert into a presentation.
                        </p>

                        <!-- Action Button -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-blue-600 dark:text-blue-400 font-semibold text-lg group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors">
                                Upload File
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">PDF, DOCX, PPTX</div>
                        </div>
                    </div>
                </div>

                <!-- Start from Scratch Card -->
                <div @click="startFromScratch()" 
                     class="glass-effect-card rounded-3xl p-8 elegant-shadow hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    
                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-2xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Start from Scratch</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-6 text-lg leading-relaxed">
                            Create a completely custom presentation with a blank canvas.
                        </p>

                        <!-- Action Button -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-semibold text-lg group-hover:text-emerald-700 dark:group-hover:text-emerald-300 transition-colors">
                                Create Blank
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">Unlimited</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- AI Assistant Featured Section -->
            <div class="mb-10 animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="glass-effect-luxury rounded-3xl p-10 elegant-shadow relative overflow-hidden">
                    <!-- Background Animation -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-10 right-10 w-32 h-32 bg-gradient-to-r from-orange-400 to-red-500 rounded-full animate-pulse"></div>
                        <div class="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-pulse" style="animation-delay: 1s"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-8">
                                <!-- AI Icon -->
                                <div class="w-24 h-24 bg-gradient-to-br from-orange-500 to-red-600 rounded-3xl flex items-center justify-center shadow-2xl">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-center mb-3">
                                        <h3 class="text-3xl font-bold text-white mr-4">
                                            Create with AI Assistant
                                        </h3>
                                        <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm px-3 py-1 rounded-full font-semibold animate-pulse">
                                            Beta
                                        </span>
                                    </div>
                                    <p class="text-white/80 text-xl leading-relaxed mb-6 max-w-2xl">
                                        Tell our AI what you want to present, and it will create a complete presentation for you in seconds.
                                    </p>
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex items-center space-x-6">
                                        <button @click="tryAIAssistant()" 
                                                class="px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-2xl hover:from-orange-600 hover:to-red-700 transition-all duration-300 flex items-center space-x-3 shadow-xl transform hover:scale-105 font-semibold text-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                            <span>Try AI Assistant</span>
                                        </button>
                                        
                                        <a href="/ai-assistant" 
                                           class="text-white/70 hover:text-white transition-colors text-lg font-medium flex items-center space-x-2">
                                            <span>Learn more about AI features</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Feature List -->
                            <div class="hidden xl:block">
                                <div class="glass-card rounded-2xl p-6 space-y-4">
                                    <div class="flex items-center space-x-3 text-white/80">
                                        <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                                        <span class="text-sm font-medium">Smart Content Generation</span>
                                    </div>
                                    <div class="flex items-center space-x-3 text-white/80">
                                        <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                        <span class="text-sm font-medium">Auto Design Suggestions</span>
                                    </div>
                                    <div class="flex items-center space-x-3 text-white/80">
                                        <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                        <span class="text-sm font-medium">Instant Slide Creation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Templates Section -->
            <div id="templates-section" class="animate-fade-in-up" style="animation-delay: 0.6s">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white">Popular Templates</h3>
                    <a href="/templates" 
                       class="text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 font-semibold flex items-center space-x-2 transition-colors">
                        <span>View All Templates</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($popularTemplates as $template)
                    <div @click="useTemplate({{ $template->id }})" 
                         class="glass-effect-card rounded-2xl p-6 hover:scale-105 transition-all duration-500 cursor-pointer group elegant-shadow">
                        <!-- Template Preview -->
                        <div class="aspect-video bg-gradient-to-br from-{{ $template->category->color ?? 'blue' }}-500 to-{{ $template->category->color ?? 'blue' }}-600 rounded-xl mb-4 flex items-center justify-center relative overflow-hidden group-hover:scale-105 transition-transform duration-300"
                             style="background: linear-gradient(135deg, {{ $template->category->color ?? '#3b82f6' }} 0%, {{ $template->category->color ?? '#1d4ed8' }} 100%);">
                            <div class="absolute inset-0 bg-black/20"></div>
                            @if($template->category)
                                <svg class="w-10 h-10 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $template->category->icon }}"></path>
                                </svg>
                            @endif
                        </div>
                        
                        <!-- Template Info -->
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $template->name }}</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">{{ $template->category->name ?? 'General' }} template</p>
                        
                        <!-- Stats -->
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center space-x-1 text-yellow-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-slate-500 dark:text-slate-400">{{ number_format($template->rating, 1) }}</span>
                            </div>
                            <span class="text-slate-500 dark:text-slate-400">{{ number_format($template->downloads) }} uses</span>
                        </div>
                        
                        <!-- Premium Badge -->
                        @if($template->is_premium)
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">
                                Premium
                            </div>
                        @else
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-green-400 to-emerald-500 text-white text-xs px-2 py-1 rounded-full font-semibold">
                                Free
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- Floating Scroll Down Button -->
    <div x-show="!scrolledDown" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed bottom-8 right-8 z-50">
        <button @click="scrollToTemplates()" 
                class="bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white p-4 rounded-full shadow-2xl transition-all duration-300 transform hover:scale-110 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m0 0l7-7 7 7z"></path>
            </svg>
        </button>
    </div>

    <!-- JavaScript for Interactions -->
    <script>
        function createPresentationData() {
            return {
                loading: false,
                scrolledDown: false,
                
                init() {
                    // Monitor scroll position
                    window.addEventListener('scroll', () => {
                        this.scrolledDown = window.scrollY > 400;
                    });
                },
                
                createFromTemplate() {
                    window.location.href = '/templates';
                },
                
                uploadDocument() {
                    // Trigger file upload
                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = '.pdf,.docx,.pptx';
                    input.onchange = (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            this.processUpload(file);
                        }
                    };
                    input.click();
                },
                
                startFromScratch() {
                    this.loading = true;
                    // Simulate navigation to editor
                    setTimeout(() => {
                        alert('Opening blank presentation editor...');
                        this.loading = false;
                        // window.location.href = '/editor/new';
                    }, 1000);
                },
                
                tryAIAssistant() {
                    window.location.href = '/ai-assistant';
                },
                
                useTemplate(templateId) {
                    this.loading = true;
                    
                    // إنشاء عرض تقديمي جديد من القالب
                    fetch('/presentations', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            template_id: templateId,
                            title: 'عرض تقديمي جديد'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = `/presentations/${data.presentation.id}/edit`;
                        } else {
                            alert('حدث خطأ في إنشاء العرض التقديمي');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('حدث خطأ في إنشاء العرض التقديمي');
                    })
                    .finally(() => {
                        this.loading = false;
                    });
                },
                
                processUpload(file) {
                    this.loading = true;
                    // Simulate file processing
                    setTimeout(() => {
                        alert(`Processing ${file.name}...`);
                        this.loading = false;
                        // Handle actual upload logic here
                    }, 2000);
                },
                
                scrollToTemplates() {
                    document.getElementById('templates-section').scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        }
    </script>

    <!-- Enhanced Styles -->
    <style>
        /* Fix body and html scrolling */
        html, body {
            overflow-x: hidden;
            overflow-y: auto;
            height: auto;
            min-height: 100%;
        }
        
        /* Ensure main container can scroll */
        .main-content {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            padding-bottom: 8rem;
            overflow: visible;
        }
        
        /* Fix fixed background not interfering with scroll */
        .fixed {
            position: fixed;
            pointer-events: none;
        }
        
        .glass-effect-luxury {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .dark .glass-effect-luxury {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .glass-effect-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .dark .glass-effect-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Container fixes */
        .max-w-6xl {
            width: 100%;
            max-width: 72rem;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }
        
        /* Grid layout fixes */
        .grid {
            display: grid;
            gap: 2rem;
        }
        
        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        
        @media (max-width: 1024px) {
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
        }
        
        /* Spacing fixes */
        .mb-10 {
            margin-bottom: 2.5rem;
        }
        
        .mb-8 {
            margin-bottom: 2rem;
        }
        
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
        
        /* Mobile specific fixes */
        @media (max-width: 768px) {
            .main-content {
                padding-bottom: 10rem;
            }
            
            .p-6 {
                padding: 1.5rem;
            }
            
            .grid-cols-2 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
        }
        
        /* Ensure all content is scrollable */
        body {
            position: relative;
        }
        
        /* Fix for viewport height issues */
        @supports (-webkit-touch-callout: none) {
            .main-content {
                min-height: -webkit-fill-available;
            }
        }
    </style>
</x-layouts.app>
