<x-layouts.app :title="__('My Presentations')" x-data="presentationsData()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-pink-400 to-orange-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-green-400 to-blue-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-purple mb-2">
                                My Presentations
                            </h1>
                            <p class="text-white/70 text-lg">
                                Create and manage stunning presentations with advanced tools
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="glass-card p-3 rounded-xl hover:bg-white/10 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                            </button>
                            <div class="glass-card rounded-xl p-2 flex items-center space-x-3">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" 
                                       x-model="searchQuery" 
                                       placeholder="Search presentations..."
                                       class="bg-transparent border-none outline-none text-white placeholder-white/50 w-64">
                            </div>
                            <a href="/presentations/create" class="btn-luxury flex items-center space-x-2 animate-pulse-glow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Create New</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="glass-card rounded-2xl p-2">
                    <nav class="flex space-x-2">
                        <button @click="activeTab = 'all'" 
                                :class="activeTab === 'all' ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>All Presentations</span>
                        </button>
                        <button @click="activeTab = 'recent'" 
                                :class="activeTab === 'recent' ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Recent</span>
                        </button>
                        <button @click="activeTab = 'favorites'" 
                                :class="activeTab === 'favorites' ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span>Favorites</span>
                        </button>
                        <button @click="activeTab = 'shared'" 
                                :class="activeTab === 'shared' ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                            <span>Shared</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Presentations Grid -->
            <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    
                    <!-- Sample Presentations -->
                    <template x-for="presentation in filteredPresentations" :key="presentation.id">
                        <div class="glass-card rounded-2xl p-6 hover:scale-105 transition-all duration-300 cursor-pointer group animate-scale-in">
                            <!-- Presentation Thumbnail -->
                            <div class="aspect-video bg-gradient-to-br from-indigo-500/20 to-purple-600/20 rounded-xl mb-4 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 to-purple-500/10"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                
                                <!-- Quick Actions Overlay -->
                                <div class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center space-x-3">
                                    <button class="glass-card p-3 rounded-xl hover:bg-white/20 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                    <button class="glass-card p-3 rounded-xl hover:bg-white/20 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button class="glass-card p-3 rounded-xl hover:bg-white/20 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Favorite Button -->
                                <button class="absolute top-3 right-3 p-2 glass-card rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-white/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Presentation Info -->
                            <div class="space-y-3">
                                <div>
                                    <h3 class="font-semibold text-lg text-white mb-1" x-text="presentation.title"></h3>
                                    <p class="text-white/60 text-sm" x-text="presentation.description"></p>
                                </div>
                                
                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 text-white/80 text-xs rounded-lg border border-white/10" x-text="presentation.category"></span>
                                </div>
                                
                                <!-- Metadata -->
                                <div class="flex items-center justify-between text-xs text-white/50 pt-2 border-t border-white/10">
                                    <div class="flex items-center space-x-3">
                                        <span class="flex items-center space-x-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span x-text="presentation.slides + ' slides'"></span>
                                        </span>
                                        <span class="flex items-center space-x-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span x-text="presentation.lastModified"></span>
                                        </span>
                                    </div>
                                    
                                    <!-- Progress Bar -->
                                    <div class="w-16">
                                        <div class="progress-luxury">
                                            <div class="progress-bar" :style="`width: ${Math.random() * 100}%`"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Create New Card -->
                    <div class="glass-card rounded-2xl p-6 border-2 border-dashed border-white/20 hover:border-white/40 transition-all duration-300 cursor-pointer group flex items-center justify-center min-h-[280px]" 
                         onclick="window.location.href='/presentations/create'">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-white mb-2">Create New Presentation</h3>
                            <p class="text-white/60 text-sm">Start with a blank presentation or choose a template</p>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div x-show="filteredPresentations.length === 0" class="text-center py-16">
                    <div class="glass-card rounded-2xl p-12 max-w-md mx-auto">
                        <svg class="w-16 h-16 text-white/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-white mb-2">No presentations found</h3>
                        <p class="text-white/60 mb-6">Create your first presentation to get started</p>
                        <button onclick="window.location.href='/presentations/create'" class="btn-luxury">
                            Create Presentation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function presentationsData() {
            return {
                activeTab: 'all',
                searchQuery: '',
                presentations: [
                    {
                        id: 1,
                        title: 'Business Strategy 2025',
                        description: 'Comprehensive business plan for the upcoming year',
                        slides: 24,
                        lastModified: '2 days ago',
                        category: 'Business'
                    },
                    {
                        id: 2,
                        title: 'Product Launch Campaign',
                        description: 'Marketing presentation for new product launch',
                        slides: 18,
                        lastModified: '1 week ago',
                        category: 'Marketing'
                    },
                    {
                        id: 3,
                        title: 'Q4 Financial Review',
                        description: 'Quarterly performance analysis and insights',
                        slides: 15,
                        lastModified: '3 days ago',
                        category: 'Finance'
                    },
                    {
                        id: 4,
                        title: 'Team Training Workshop',
                        description: 'Professional development and skill enhancement',
                        slides: 32,
                        lastModified: '5 days ago',
                        category: 'Training'
                    },
                    {
                        id: 5,
                        title: 'Client Proposal',
                        description: 'Project proposal for enterprise client',
                        slides: 12,
                        lastModified: '1 day ago',
                        category: 'Sales'
                    },
                    {
                        id: 6,
                        title: 'Technology Roadmap',
                        description: 'Future technology initiatives and planning',
                        slides: 28,
                        lastModified: '4 days ago',
                        category: 'Technology'
                    }
                ],
                get filteredPresentations() {
                    let filtered = this.presentations;
                    
                    if (this.searchQuery) {
                        filtered = filtered.filter(p => 
                            p.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            p.description.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            p.category.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    }
                    
                    switch (this.activeTab) {
                        case 'recent':
                            filtered = filtered.filter(p => p.lastModified.includes('day'));
                            break;
                        case 'favorites':
                            filtered = filtered.slice(0, 2); // Sample favorites
                            break;
                        case 'shared':
                            filtered = filtered.slice(2, 4); // Sample shared
                            break;
                    }
                    
                    return filtered;
                }
            }
        }
    </script>
                        
                        <!-- Actions -->
                        <div class="flex items-center space-x-2 pt-2">
                            <button class="flex-1 px-3 py-2 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-lg text-sm font-medium hover:from-violet-700 hover:to-purple-700 transition-colors">
                                Open
                            </button>
                            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
                
            </div>
            
            <!-- Empty State (if no presentations) -->
            <div class="hidden text-center py-12">
                <div class="glass-effect rounded-2xl p-12 max-w-md mx-auto">
                    <svg class="w-16 h-16 text-slate-400 dark:text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No presentations yet</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">Get started by creating your first presentation.</p>
                    <a href="/presentations/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Presentation
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
