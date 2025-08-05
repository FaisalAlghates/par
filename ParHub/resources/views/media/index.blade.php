<x-layouts.app :title="__('Media Library')" x-data="mediaLibrary()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-orange-400 to-red-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-pink-400 to-red-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-orange mb-2">
                                Media Library
                            </h1>
                            <p class="text-white/70 text-lg">
                                Manage your presentation assets and media files
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button @click="uploadModal = true" class="glass-card px-6 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <span>Upload Files</span>
                            </button>
                            <div class="glass-card rounded-xl p-3 flex items-center space-x-3">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"></path>
                                </svg>
                                <select x-model="filterType" class="bg-transparent border-none outline-none text-white text-sm">
                                    <option value="all">All Files</option>
                                    <option value="images">Images</option>
                                    <option value="videos">Videos</option>
                                    <option value="documents">Documents</option>
                                    <option value="audio">Audio</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Storage Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <!-- Total Files -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">156</h3>
                    <p class="text-white/60 text-sm">Total Files</p>
                </div>

                <!-- Storage Used -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10M7 4v16a1 1 0 001 1h8a1 1 0 001-1V4M7 4H5a1 1 0 00-1 1v16a1 1 0 001 1h2"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">2.4 GB</h3>
                    <p class="text-white/60 text-sm">Storage Used</p>
                </div>

                <!-- Images -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">89</h3>
                    <p class="text-white/60 text-sm">Images</p>
                </div>

                <!-- Videos -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">23</h3>
                    <p class="text-white/60 text-sm">Videos</p>
                </div>
            </div>

            <!-- Search and Filter Bar -->
            <div class="glass-card rounded-2xl p-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 flex-1">
                        <div class="relative flex-1 max-w-md">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input x-model="searchQuery" type="text" placeholder="Search files..." class="w-full pl-12 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-orange-500 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'" class="p-2 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </button>
                        <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-orange-500 text-white' : 'text-white/70 hover:text-white hover:bg-white/10'" class="p-2 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Media Grid -->
            <div x-show="viewMode === 'grid'" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 animate-fade-in-up" style="animation-delay: 0.3s">
                <template x-for="file in filteredFiles" :key="file.id">
                    <div class="glass-card rounded-2xl p-4 hover:bg-white/10 transition-all duration-300 cursor-pointer group" @click="openFile(file)">
                        <div class="aspect-square rounded-lg mb-4 flex items-center justify-center overflow-hidden" :class="getFileTypeClass(file.type)">
                            <template x-if="file.type === 'image'">
                                <img :src="file.preview" :alt="file.name" class="w-full h-full object-cover rounded-lg">
                            </template>
                            <template x-if="file.type !== 'image'">
                                <svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="getFileIcon(file.type)">
                                </svg>
                            </template>
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm mb-1 truncate" x-text="file.name"></h3>
                            <p class="text-white/60 text-xs" x-text="file.size"></p>
                            <p class="text-white/50 text-xs mt-1" x-text="file.modified"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Media List -->
            <div x-show="viewMode === 'list'" class="glass-card rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-white/5 border-b border-white/10">
                            <tr>
                                <th class="text-left py-4 px-6 text-white font-medium">Name</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Type</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Size</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Modified</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="file in filteredFiles" :key="file.id">
                                <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-lg flex items-center justify-center" :class="getFileTypeClass(file.type)">
                                                <template x-if="file.type === 'image'">
                                                    <img :src="file.preview" :alt="file.name" class="w-full h-full object-cover rounded-lg">
                                                </template>
                                                <template x-if="file.type !== 'image'">
                                                    <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="getFileIcon(file.type)">
                                                    </svg>
                                                </template>
                                            </div>
                                            <span class="text-white font-medium" x-text="file.name"></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-white/70 capitalize" x-text="file.type"></td>
                                    <td class="py-4 px-6 text-white/70" x-text="file.size"></td>
                                    <td class="py-4 px-6 text-white/70" x-text="file.modified"></td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <button @click="downloadFile(file)" class="p-1 text-white/70 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                                </svg>
                                            </button>
                                            <button @click="deleteFile(file)" class="p-1 text-red-400 hover:text-red-300 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div x-show="uploadModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div @click.away="uploadModal = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="glass-card rounded-2xl p-8 max-w-md w-full">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Upload Files</h3>
                <p class="text-white/60 mb-6">Drag and drop files here or click to browse</p>
                
                <div class="border-2 border-dashed border-white/30 rounded-xl p-8 mb-6 hover:border-orange-500 transition-colors cursor-pointer">
                    <input type="file" multiple class="hidden" id="fileInput">
                    <label for="fileInput" class="cursor-pointer">
                        <svg class="w-12 h-12 text-white/50 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-white/70">Click to select files</p>
                    </label>
                </div>
                
                <div class="flex space-x-3">
                    <button @click="uploadModal = false" class="flex-1 px-4 py-2 text-white/70 hover:text-white transition-colors">Cancel</button>
                    <button class="flex-1 px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl hover:from-orange-600 hover:to-red-600 transition-all duration-300">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mediaLibrary() {
            return {
                viewMode: 'grid',
                filterType: 'all',
                searchQuery: '',
                uploadModal: false,
                
                files: [
                    {
                        id: 1,
                        name: 'presentation-bg.jpg',
                        type: 'image',
                        size: '2.4 MB',
                        modified: '2 hours ago',
                        preview: 'https://picsum.photos/200/200?random=1'
                    },
                    {
                        id: 2,
                        name: 'company-logo.png',
                        type: 'image',
                        size: '156 KB',
                        modified: '1 day ago',
                        preview: 'https://picsum.photos/200/200?random=2'
                    },
                    {
                        id: 3,
                        name: 'quarterly-report.pdf',
                        type: 'document',
                        size: '8.7 MB',
                        modified: '3 days ago',
                        preview: null
                    },
                    {
                        id: 4,
                        name: 'intro-video.mp4',
                        type: 'video',
                        size: '45.2 MB',
                        modified: '1 week ago',
                        preview: null
                    },
                    {
                        id: 5,
                        name: 'background-music.mp3',
                        type: 'audio',
                        size: '3.8 MB',
                        modified: '2 weeks ago',
                        preview: null
                    }
                ],

                get filteredFiles() {
                    let filtered = this.files;
                    
                    if (this.filterType !== 'all') {
                        filtered = filtered.filter(file => {
                            if (this.filterType === 'images') return file.type === 'image';
                            if (this.filterType === 'videos') return file.type === 'video';
                            if (this.filterType === 'documents') return file.type === 'document';
                            if (this.filterType === 'audio') return file.type === 'audio';
                            return true;
                        });
                    }
                    
                    if (this.searchQuery) {
                        filtered = filtered.filter(file => 
                            file.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    }
                    
                    return filtered;
                },

                getFileTypeClass(type) {
                    const classes = {
                        image: 'bg-gradient-to-br from-blue-500/20 to-cyan-500/20',
                        video: 'bg-gradient-to-br from-purple-500/20 to-pink-500/20',
                        document: 'bg-gradient-to-br from-green-500/20 to-emerald-500/20',
                        audio: 'bg-gradient-to-br from-orange-500/20 to-red-500/20'
                    };
                    return classes[type] || 'bg-gradient-to-br from-gray-500/20 to-slate-500/20';
                },

                getFileIcon(type) {
                    const icons = {
                        document: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>',
                        video: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>',
                        audio: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>'
                    };
                    return icons[type] || '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>';
                },

                openFile(file) {
                    console.log('Opening file:', file.name);
                    // Implement file opening logic
                },

                downloadFile(file) {
                    console.log('Downloading file:', file.name);
                    // Implement download logic
                },

                deleteFile(file) {
                    if (confirm(`Are you sure you want to delete ${file.name}?`)) {
                        this.files = this.files.filter(f => f.id !== file.id);
                    }
                }
            }
        }
    </script>

    <style>
        .gradient-text-orange {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</x-layouts.app>
