<x-layouts.app :title="__('Shared Files')" x-data="sharedFiles()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-teal-400 to-blue-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-cyan-400 to-teal-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-teal mb-2">
                                Shared with Me
                            </h1>
                            <p class="text-white/70 text-lg">
                                Files and presentations shared by your team
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="glass-card rounded-xl p-3 flex items-center space-x-3">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"></path>
                                </svg>
                                <select x-model="filterType" class="bg-transparent border-none outline-none text-white text-sm">
                                    <option value="all">All Shared</option>
                                    <option value="presentations">Presentations</option>
                                    <option value="documents">Documents</option>
                                    <option value="media">Media Files</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sharing Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <!-- Shared with Me -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">42</h3>
                    <p class="text-white/60 text-sm">Shared with Me</p>
                </div>

                <!-- Team Members -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">8</h3>
                    <p class="text-white/60 text-sm">Team Members</p>
                </div>

                <!-- Recent Shares -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">12</h3>
                    <p class="text-white/60 text-sm">This Week</p>
                </div>

                <!-- Collaborations -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">15</h3>
                    <p class="text-white/60 text-sm">Active Collaborations</p>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="glass-card rounded-2xl p-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center space-x-4">
                    <div class="relative flex-1">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input x-model="searchQuery" type="text" placeholder="Search shared files..." class="w-full pl-12 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Shared Files List -->
            <div class="glass-card rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-white/5 border-b border-white/10">
                            <tr>
                                <th class="text-left py-4 px-6 text-white font-medium">File</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Shared By</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Type</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Size</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Shared</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Access</th>
                                <th class="text-left py-4 px-6 text-white font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="file in filteredFiles" :key="file.id">
                                <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-lg flex items-center justify-center" :class="getFileTypeClass(file.type)">
                                                <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="getFileIcon(file.type)">
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-white font-medium" x-text="file.name"></div>
                                                <div class="text-white/60 text-sm" x-text="file.description"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold" x-text="file.sharedBy.initials"></div>
                                            <span class="text-white/70" x-text="file.sharedBy.name"></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium" :class="getTypeColor(file.type)" x-text="file.type"></span>
                                    </td>
                                    <td class="py-4 px-6 text-white/70" x-text="file.size"></td>
                                    <td class="py-4 px-6 text-white/70" x-text="file.sharedDate"></td>
                                    <td class="py-4 px-6">
                                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium" :class="getAccessColor(file.access)" x-text="file.access"></span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <button @click="openFile(file)" class="p-1 text-white/70 hover:text-white transition-colors" title="Open">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button @click="downloadFile(file)" class="p-1 text-white/70 hover:text-white transition-colors" title="Download">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                                </svg>
                                            </button>
                                            <button @click="addToMyFiles(file)" class="p-1 text-teal-400 hover:text-teal-300 transition-colors" title="Add to My Files">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
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

            <!-- Recent Collaborators -->
            <div class="mt-8 animate-fade-in-up" style="animation-delay: 0.4s">
                <h2 class="text-2xl font-bold text-white mb-6">Recent Collaborators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <template x-for="collaborator in collaborators" :key="collaborator.id">
                        <div class="glass-card rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-4" x-text="collaborator.initials"></div>
                            <h3 class="text-white font-medium mb-1" x-text="collaborator.name"></h3>
                            <p class="text-white/60 text-sm mb-3" x-text="collaborator.role"></p>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="text-xs text-white/50" x-text="collaborator.sharedFiles + ' files shared'"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sharedFiles() {
            return {
                filterType: 'all',
                searchQuery: '',
                
                files: [
                    {
                        id: 1,
                        name: 'Q4 Financial Report',
                        description: 'Quarterly financial analysis and projections',
                        type: 'Presentation',
                        size: '15.2 MB',
                        sharedDate: '2 hours ago',
                        access: 'View',
                        sharedBy: {
                            name: 'Sarah Johnson',
                            initials: 'SJ'
                        }
                    },
                    {
                        id: 2,
                        name: 'Marketing Strategy 2024',
                        description: 'Complete marketing roadmap for next year',
                        type: 'Document',
                        size: '8.7 MB',
                        sharedDate: '1 day ago',
                        access: 'Edit',
                        sharedBy: {
                            name: 'Mike Chen',
                            initials: 'MC'
                        }
                    },
                    {
                        id: 3,
                        name: 'Product Demo Video',
                        description: 'Latest product features demonstration',
                        type: 'Video',
                        size: '125 MB',
                        sharedDate: '3 days ago',
                        access: 'View',
                        sharedBy: {
                            name: 'Emily Rodriguez',
                            initials: 'ER'
                        }
                    },
                    {
                        id: 4,
                        name: 'Brand Guidelines',
                        description: 'Updated company brand assets and guidelines',
                        type: 'Document',
                        size: '45.6 MB',
                        sharedDate: '1 week ago',
                        access: 'Comment',
                        sharedBy: {
                            name: 'David Kim',
                            initials: 'DK'
                        }
                    }
                ],

                collaborators: [
                    {
                        id: 1,
                        name: 'Sarah Johnson',
                        initials: 'SJ',
                        role: 'Marketing Director',
                        sharedFiles: 12
                    },
                    {
                        id: 2,
                        name: 'Mike Chen',
                        initials: 'MC',
                        role: 'Product Manager',
                        sharedFiles: 8
                    },
                    {
                        id: 3,
                        name: 'Emily Rodriguez',
                        initials: 'ER',
                        role: 'UX Designer',
                        sharedFiles: 15
                    },
                    {
                        id: 4,
                        name: 'David Kim',
                        initials: 'DK',
                        role: 'Brand Manager',
                        sharedFiles: 6
                    }
                ],

                get filteredFiles() {
                    let filtered = this.files;
                    
                    if (this.filterType !== 'all') {
                        filtered = filtered.filter(file => {
                            if (this.filterType === 'presentations') return file.type === 'Presentation';
                            if (this.filterType === 'documents') return file.type === 'Document';
                            if (this.filterType === 'media') return file.type === 'Video' || file.type === 'Audio';
                            return true;
                        });
                    }
                    
                    if (this.searchQuery) {
                        filtered = filtered.filter(file => 
                            file.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            file.description.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    }
                    
                    return filtered;
                },

                getFileTypeClass(type) {
                    const classes = {
                        'Presentation': 'bg-gradient-to-br from-blue-500/20 to-cyan-500/20',
                        'Document': 'bg-gradient-to-br from-green-500/20 to-emerald-500/20',
                        'Video': 'bg-gradient-to-br from-purple-500/20 to-pink-500/20',
                        'Audio': 'bg-gradient-to-br from-orange-500/20 to-red-500/20'
                    };
                    return classes[type] || 'bg-gradient-to-br from-gray-500/20 to-slate-500/20';
                },

                getFileIcon(type) {
                    const icons = {
                        'Presentation': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>',
                        'Document': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>',
                        'Video': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>',
                        'Audio': '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>'
                    };
                    return icons[type] || '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>';
                },

                getTypeColor(type) {
                    const colors = {
                        'Presentation': 'bg-blue-500/20 text-blue-400',
                        'Document': 'bg-green-500/20 text-green-400',
                        'Video': 'bg-purple-500/20 text-purple-400',
                        'Audio': 'bg-orange-500/20 text-orange-400'
                    };
                    return colors[type] || 'bg-gray-500/20 text-gray-400';
                },

                getAccessColor(access) {
                    const colors = {
                        'View': 'bg-blue-500/20 text-blue-400',
                        'Edit': 'bg-green-500/20 text-green-400',
                        'Comment': 'bg-yellow-500/20 text-yellow-400',
                        'Owner': 'bg-purple-500/20 text-purple-400'
                    };
                    return colors[access] || 'bg-gray-500/20 text-gray-400';
                },

                openFile(file) {
                    console.log('Opening file:', file.name);
                    // Implement file opening logic
                },

                downloadFile(file) {
                    console.log('Downloading file:', file.name);
                    // Implement download logic
                },

                addToMyFiles(file) {
                    console.log('Adding to my files:', file.name);
                    // Implement add to my files logic
                }
            }
        }
    </script>

    <style>
        .gradient-text-teal {
            background: linear-gradient(135deg, #14b8a6 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</x-layouts.app>
