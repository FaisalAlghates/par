<x-layouts.app :title="__('Templates')" x-data="templatesData()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-72 h-72 bg-gradient-to-r from-emerald-400 to-cyan-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1.5s"></div>
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-56 h-56 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full opacity-15 blur-3xl animate-pulse" style="animation-delay: 0.5s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-blue mb-2">
                                Presentation Templates
                            </h1>
                            <p class="text-white/70 text-lg">
                                Professional templates designed to make your presentations stand out
                            </p>
                        </div>
                            <div class="flex items-center space-x-3">
                                <div class="glass-card rounded-xl p-2 flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" 
                                           x-model="searchQuery" 
                                           placeholder="Search templates..."
                                           class="bg-transparent border-none outline-none text-white placeholder-white/50 w-64"
                                           @input="$nextTick(() => { /* Search handling */ })">
                                </div>
                                
                                <!-- View Mode Toggle -->
                                <div class="glass-card rounded-xl p-1 flex">
                                    <button @click="viewMode = 'grid'" 
                                            :class="viewMode === 'grid' ? 'bg-white/20 text-white' : 'text-white/70 hover:text-white'"
                                            class="p-2 rounded-lg transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                    </button>
                                    <button @click="viewMode = 'list'" 
                                            :class="viewMode === 'list' ? 'bg-white/20 text-white' : 'text-white/70 hover:text-white'"
                                            class="p-2 rounded-lg transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <!-- Sort Dropdown -->
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" 
                                            class="glass-card p-3 rounded-xl hover:bg-white/10 transition-all duration-300 group flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                        <span class="text-white/70 text-sm">Sort</span>
                                        <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    
                                    <!-- Dropdown Menu -->
                                    <div x-show="open" 
                                         x-transition 
                                         @click.away="open = false"
                                         class="absolute right-0 mt-2 w-48 glass-card rounded-xl shadow-xl z-50">
                                        <div class="p-2 space-y-1">
                                            <button @click="sortBy = 'popular'; open = false" 
                                                    :class="sortBy === 'popular' ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'"
                                                    class="w-full text-left px-3 py-2 rounded-lg transition-all duration-200 text-sm">
                                                Most Popular
                                            </button>
                                            <button @click="sortBy = 'rating'; open = false" 
                                                    :class="sortBy === 'rating' ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'"
                                                    class="w-full text-left px-3 py-2 rounded-lg transition-all duration-200 text-sm">
                                                Highest Rated
                                            </button>
                                            <button @click="sortBy = 'name'; open = false" 
                                                    :class="sortBy === 'name' ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'"
                                                    class="w-full text-left px-3 py-2 rounded-lg transition-all duration-200 text-sm">
                                                Name A-Z
                                            </button>
                                            <button @click="sortBy = 'recent'; open = false" 
                                                    :class="sortBy === 'recent' ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'"
                                                    class="w-full text-left px-3 py-2 rounded-lg transition-all duration-200 text-sm">
                                                Most Recent
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <!-- Category Filters -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="glass-card rounded-2xl p-2">
                    <nav class="flex flex-wrap gap-2">
                        <button @click="activeCategory = 'all'" 
                                :class="activeCategory === 'all' ? 'bg-gradient-to-r from-emerald-500 to-cyan-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>All Templates</span>
                        </button>
                        <template x-for="category in categories" :key="category.id">
                            <button @click="activeCategory = category.id" 
                                    :class="activeCategory === category.id ? 'bg-gradient-to-r from-emerald-500 to-cyan-600 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5'"
                                    class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2">
                                <span x-html="category.icon"></span>
                                <span x-text="category.name"></span>
                            </button>
                        </template>
                    </nav>
                </div>
            </div>

            <!-- Featured Templates -->
            <div class="mb-12 animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold gradient-text-purple">Featured Templates</h2>
                    <div class="flex items-center space-x-3">
                        <span class="text-white/60">Popular this week</span>
                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="template in featuredTemplates" :key="template.id">
                        <div class="glass-card rounded-2xl overflow-hidden hover:scale-105 transition-all duration-300 cursor-pointer group animate-scale-in">
                            <!-- Template Preview -->
                            <div class="aspect-video relative overflow-hidden" :class="template.gradientClass">
                                <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center text-white">
                                        <div class="w-16 h-16 mx-auto mb-4 glass-card rounded-2xl flex items-center justify-center">
                                            <span x-html="template.icon"></span>
                                        </div>
                                        <p class="text-sm font-medium" x-text="template.slides + ' Slides'"></p>
                                        <p class="text-xs opacity-80 mt-1" x-text="template.category"></p>
                                    </div>
                                </div>
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                                    <div class="text-center space-y-3">
                                        <button class="btn-luxury px-6 py-3">
                                            Use Template
                                        </button>
                                        <div class="flex items-center justify-center space-x-3">
                                            <button class="glass-card p-2 rounded-lg hover:bg-white/20 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button class="glass-card p-2 rounded-lg hover:bg-white/20 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Featured Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="glass-card px-3 py-1 text-xs font-medium text-white/90 rounded-full border border-white/20">
                                        ⭐ Featured
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Template Info -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h3 class="text-lg font-semibold text-white mb-1" x-text="template.name"></h3>
                                        <p class="text-white/60 text-sm" x-text="template.description"></p>
                                    </div>
                                    <div class="text-right">
                                        <div class="flex items-center space-x-1 text-amber-400 mb-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <span class="text-xs" x-text="template.rating"></span>
                                        </div>
                                        <p class="text-white/50 text-xs" x-text="template.downloads + ' downloads'"></p>
                                    </div>
                                </div>
                                
                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <template x-for="tag in template.tags" :key="tag">
                                        <span class="px-2 py-1 bg-gradient-to-r from-emerald-500/20 to-cyan-500/20 text-white/80 text-xs rounded-lg border border-white/10" x-text="tag"></span>
                                    </template>
                                </div>
                                
                                <!-- Actions -->
                                <div class="flex items-center space-x-2">
                                    <button class="flex-1 btn-luxury text-sm py-2">
                                        Use Template
                                    </button>
                                    <button class="glass-card p-2 rounded-lg hover:bg-white/10 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- All Templates -->
            <div class="animate-fade-in-up" style="animation-delay: 0.6s">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold gradient-text-blue">All Templates</h2>
                    <div class="flex items-center space-x-4">
                        <div class="glass-card rounded-xl p-2">
                            <select x-model="sortBy" class="bg-transparent border-none outline-none text-white text-sm">
                                <option value="popular" class="bg-gray-800">Most Popular</option>
                                <option value="recent" class="bg-gray-800">Recently Added</option>
                                <option value="rating" class="bg-gray-800">Highest Rated</option>
                                <option value="name" class="bg-gray-800">Name A-Z</option>
                            </select>
                        </div>
                        <div class="glass-card rounded-xl p-2 flex space-x-1">
                            <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-white/20' : ''" class="p-2 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </button>
                            <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-white/20' : ''" class="p-2 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Templates Grid -->
                <div x-show="viewMode === 'grid'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <template x-for="template in filteredTemplates" :key="template.id">
                        <div class="glass-card rounded-xl overflow-hidden hover:scale-105 transition-all duration-300 cursor-pointer group">
                            <!-- Template Preview -->
                            <div class="aspect-video relative overflow-hidden" :class="template.gradientClass">
                                <div class="absolute inset-0 bg-black/10"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span x-html="template.icon" class="text-3xl text-white/80"></span>
                                </div>
                                <!-- Hover Actions -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button class="glass-card px-4 py-2 text-sm font-medium text-white hover:bg-white/20 transition-colors rounded-lg">
                                        Preview
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Template Info -->
                            <div class="p-4">
                                <h3 class="font-semibold text-white mb-1 text-sm" x-text="template.name"></h3>
                                <p class="text-white/60 text-xs mb-3" x-text="template.category + ' • ' + template.slides + ' slides'"></p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-1 text-amber-400">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-xs" x-text="template.rating"></span>
                                    </div>
                                    <button class="glass-card p-1.5 rounded-lg hover:bg-white/10 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Templates List View -->
                <div x-show="viewMode === 'list'" class="space-y-3">
                    <template x-for="template in filteredTemplates" :key="template.id">
                        <div class="glass-card rounded-xl p-4 hover:bg-white/5 transition-all duration-300 cursor-pointer group">
                            <div class="flex items-center space-x-4">
                                <!-- Thumbnail -->
                                <div class="w-20 h-14 rounded-lg overflow-hidden flex-shrink-0" :class="template.gradientClass">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span x-html="template.icon" class="text-lg text-white/80"></span>
                                    </div>
                                </div>
                                
                                <!-- Info -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-white truncate" x-text="template.name"></h3>
                                    <p class="text-white/60 text-sm" x-text="template.description"></p>
                                    <div class="flex items-center space-x-4 text-xs text-white/50 mt-1">
                                        <span x-text="template.category"></span>
                                        <span x-text="template.slides + ' slides'"></span>
                                        <span x-text="template.downloads + ' downloads'"></span>
                                    </div>
                                </div>
                                
                                <!-- Rating -->
                                <div class="flex items-center space-x-1 text-amber-400">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-sm" x-text="template.rating"></span>
                                </div>
                                
                                <!-- Actions -->
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="flex space-x-2">
                                        <button class="btn-luxury text-sm px-4 py-2">Use Template</button>
                                        <button class="glass-card p-2 rounded-lg hover:bg-white/10 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function templatesData() {
            return {
                activeCategory: 'all',
                searchQuery: '',
                sortBy: 'popular',
                viewMode: 'grid',
                categories: [
                    {
                        id: 'business',
                        name: 'Business',
                        icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8"></path></svg>'
                    },
                    {
                        id: 'education',
                        name: 'Education',
                        icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>'
                    },
                    {
                        id: 'marketing',
                        name: 'Marketing',
                        icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>'
                    },
                    {
                        id: 'creative',
                        name: 'Creative',
                        icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path></svg>'
                    },
                    {
                        id: 'reports',
                        name: 'Reports',
                        icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'
                    }
                ],
                featuredTemplates: [
                    {
                        id: 1,
                        name: 'Modern Business Pitch',
                        description: 'Professional pitch deck for startups',
                        category: 'Business',
                        slides: 25,
                        rating: 4.9,
                        downloads: 1200,
                        tags: ['Startup', 'Investment', 'Modern'],
                        gradientClass: 'bg-gradient-to-br from-blue-600 to-purple-600',
                        icon: '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8"></path></svg>'
                    },
                    {
                        id: 2,
                        name: 'Creative Portfolio',
                        description: 'Showcase your creative work beautifully',
                        category: 'Creative',
                        slides: 18,
                        rating: 4.8,
                        downloads: 890,
                        tags: ['Portfolio', 'Design', 'Creative'],
                        gradientClass: 'bg-gradient-to-br from-pink-500 to-orange-500',
                        icon: '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path></svg>'
                    },
                    {
                        id: 3,
                        name: 'Education Presentation',
                        description: 'Engaging slides for educational content',
                        category: 'Education',
                        slides: 30,
                        rating: 4.7,
                        downloads: 1560,
                        tags: ['Teaching', 'Learning', 'Academic'],
                        gradientClass: 'bg-gradient-to-br from-emerald-500 to-cyan-600',
                        icon: '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>'
                    }
                ],
                templates: [
                    {
                        id: 4,
                        name: 'Marketing Campaign',
                        description: 'Launch your products effectively',
                        category: 'Marketing',
                        slides: 22,
                        rating: 4.6,
                        downloads: 720,
                        gradientClass: 'bg-gradient-to-br from-indigo-500 to-purple-600',
                        icon: '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path></svg>'
                    },
                    {
                        id: 5,
                        name: 'Financial Report',
                        description: 'Present financial data clearly',
                        category: 'Reports',
                        slides: 16,
                        rating: 4.5,
                        downloads: 650,
                        gradientClass: 'bg-gradient-to-br from-green-500 to-teal-600',
                        icon: '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'
                    },
                    {
                        id: 6,
                        name: 'Product Showcase',
                        description: 'Highlight your products beautifully',
                        category: 'Business',
                        slides: 20,
                        rating: 4.8,
                        downloads: 980,
                        gradientClass: 'bg-gradient-to-br from-purple-500 to-pink-600',
                        icon: '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>'
                    }
                ],
                get filteredTemplates() {
                    let allTemplates = [...this.templates];
                    
                    if (this.searchQuery) {
                        allTemplates = allTemplates.filter(t => 
                            t.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            t.description.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            t.category.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    }
                    
                    if (this.activeCategory !== 'all') {
                        allTemplates = allTemplates.filter(t => 
                            t.category.toLowerCase() === this.activeCategory.toLowerCase()
                        );
                    }
                    
                    // Sort templates
                    switch (this.sortBy) {
                        case 'rating':
                            allTemplates.sort((a, b) => b.rating - a.rating);
                            break;
                        case 'name':
                            allTemplates.sort((a, b) => a.name.localeCompare(b.name));
                            break;
                        case 'recent':
                            // For demo, reverse order
                            allTemplates.reverse();
                            break;
                        default: // popular
                            allTemplates.sort((a, b) => b.downloads - a.downloads);
                    }
                    
                    return allTemplates;
                },
                
                // Interactive methods
                useTemplate(template) {
                    if (template) {
                        // Show loading state
                        this.isLoading = true;
                        
                        // Simulate navigation to editor
                        setTimeout(() => {
                            alert(`Opening template: ${template.name} in editor...`);
                            this.isLoading = false;
                            // In real app: window.location.href = `/editor?template=${template.id}`;
                        }, 1000);
                    }
                },
                
                favoriteTemplate(template) {
                    // Toggle favorite status
                    template.isFavorite = !template.isFavorite;
                    
                    if (template.isFavorite) {
                        this.showNotification(`Added "${template.name}" to favorites!`, 'success');
                    } else {
                        this.showNotification(`Removed "${template.name}" from favorites`, 'info');
                    }
                },
                
                previewTemplate(template) {
                    alert(`Previewing: ${template.name}`);
                    // In real app: open preview modal or new window
                },
                
                shareTemplate(template) {
                    if (navigator.share) {
                        navigator.share({
                            title: template.name,
                            text: template.description,
                            url: window.location.href + `?template=${template.id}`
                        });
                    } else {
                        // Fallback to clipboard
                        navigator.clipboard.writeText(window.location.href + `?template=${template.id}`);
                        this.showNotification('Template link copied to clipboard!', 'success');
                    }
                },
                
                showNotification(message, type = 'info') {
                    // Simple notification system
                    const notification = document.createElement('div');
                    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg text-white z-50 ${
                        type === 'success' ? 'bg-green-500' : 
                        type === 'error' ? 'bg-red-500' : 'bg-blue-500'
                    }`;
                    notification.textContent = message;
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                },
                
                isLoading: false
            }
        }
    </script>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    </template>
                </div>
            </div>

            <!-- All Templates -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">All Templates</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    
                    @for($i = 1; $i <= 12; $i++)
                    @php
                    $colors = [
                        'from-violet-600 to-purple-600',
                        'from-blue-600 to-cyan-600',
                        'from-emerald-600 to-teal-600',
                        'from-orange-600 to-red-600',
                        'from-pink-600 to-rose-600',
                        'from-indigo-600 to-blue-600'
                    ];
                    $categories = ['Business', 'Education', 'Creative', 'Marketing', 'Reports', 'Portfolio'];
                    $color = $colors[($i - 1) % count($colors)];
                    $category = $categories[($i - 1) % count($categories)];
                    @endphp
                    
                    <div class="glass-effect rounded-xl overflow-hidden elegant-shadow hover:scale-105 transition-all duration-300 cursor-pointer group">
                        <!-- Template Preview -->
                        <div class="aspect-video bg-gradient-to-br {{ $color }} relative">
                            <div class="absolute inset-0 bg-white/10"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="px-4 py-2 bg-white text-slate-900 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                                    Use Template
                                </button>
                            </div>
                        </div>
                        
                        <!-- Template Info -->
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Template {{ $i }}</h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 mb-3">{{ $category }} • {{ rand(15, 35) }} slides</p>
                            <div class="flex items-center space-x-2">
                                <button class="flex-1 px-3 py-2 bg-gradient-to-r {{ $color }} text-white rounded-lg text-xs font-medium hover:opacity-90 transition-opacity">
                                    Use
                                </button>
                                <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                    
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
