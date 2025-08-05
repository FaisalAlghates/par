<x-layouts.app :title="__('Help & Support')" x-data="helpSupport()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-purple-400 to-blue-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-indigo mb-2">
                                Help & Support
                            </h1>
                            <p class="text-white/70 text-lg">
                                Get help, learn new features, and connect with our community
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button @click="openChat()" class="glass-card px-6 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span>Live Chat</span>
                            </button>
                            <button @click="contactSupport()" class="glass-card px-6 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>Contact Support</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <!-- Getting Started -->
                <div class="glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 cursor-pointer" @click="showGettingStarted = true">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Getting Started</h3>
                    <p class="text-white/60">Learn the basics and get up to speed quickly</p>
                </div>

                <!-- Video Tutorials -->
                <div class="glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 cursor-pointer" @click="showTutorials = true">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Video Tutorials</h3>
                    <p class="text-white/60">Step-by-step video guides for all features</p>
                </div>

                <!-- Community -->
                <div class="glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 cursor-pointer" @click="showCommunity = true">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Community</h3>
                    <p class="text-white/60">Connect with other users and share tips</p>
                </div>
            </div>

            <!-- Search Help -->
            <div class="glass-card rounded-2xl p-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input x-model="searchQuery" @input="searchHelp()" type="text" placeholder="Search help articles, tutorials, and FAQs..." class="w-full pl-12 pr-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-lg">
                </div>
                <div x-show="searchResults.length > 0" class="mt-4 space-y-2">
                    <template x-for="result in searchResults" :key="result.id">
                        <div class="p-3 bg-white/5 rounded-lg hover:bg-white/10 transition-colors cursor-pointer" @click="openArticle(result)">
                            <h4 class="text-white font-medium" x-text="result.title"></h4>
                            <p class="text-white/60 text-sm" x-text="result.excerpt"></p>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Popular Help Topics -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.3s">
                <h2 class="text-2xl font-bold text-white mb-6">Popular Help Topics</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="topic in popularTopics" :key="topic.id">
                        <div class="glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 cursor-pointer" @click="openTopic(topic)">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center" :class="topic.iconClass">
                                    <svg class="w-5 h-5" :class="topic.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="topic.icon">
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white font-semibold" x-text="topic.title"></h3>
                                    <p class="text-white/60 text-sm" x-text="topic.articles + ' articles'"></p>
                                </div>
                            </div>
                            <p class="text-white/70 text-sm" x-text="topic.description"></p>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Recent Updates -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- What's New -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">What's New</h3>
                    </div>
                    <div class="space-y-4">
                        <template x-for="update in recentUpdates" :key="update.id">
                            <div class="p-4 bg-white/5 rounded-xl">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="text-white font-medium" x-text="update.title"></h4>
                                    <span class="text-xs text-white/50" x-text="update.date"></span>
                                </div>
                                <p class="text-white/70 text-sm" x-text="update.description"></p>
                                <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full" :class="update.typeClass" x-text="update.type"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Get in Touch</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Live Chat</h4>
                                <p class="text-white/60 text-sm">Available 24/7 for instant help</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Email Support</h4>
                                <p class="text-white/60 text-sm">support@parhub.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Phone Support</h4>
                                <p class="text-white/60 text-sm">+966 11 123 4567</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.6s">
                <h3 class="text-2xl font-bold text-white mb-6">Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <template x-for="faq in faqs" :key="faq.id">
                        <div class="border-b border-white/10 pb-4">
                            <button @click="faq.open = !faq.open" class="w-full text-left flex items-center justify-between py-2">
                                <h4 class="text-white font-medium" x-text="faq.question"></h4>
                                <svg class="w-5 h-5 text-white/50 transition-transform" :class="faq.open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="faq.open" x-transition class="mt-2">
                                <p class="text-white/70" x-text="faq.answer"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function helpSupport() {
            return {
                searchQuery: '',
                searchResults: [],
                showGettingStarted: false,
                showTutorials: false,
                showCommunity: false,

                popularTopics: [
                    {
                        id: 1,
                        title: 'Creating Presentations',
                        description: 'Learn how to create stunning presentations from scratch',
                        articles: 15,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>',
                        iconClass: 'bg-gradient-to-r from-blue-500/20 to-cyan-500/20',
                        iconColor: 'text-blue-400'
                    },
                    {
                        id: 2,
                        title: 'Templates & Themes',
                        description: 'Using and customizing templates for your presentations',
                        articles: 12,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>',
                        iconClass: 'bg-gradient-to-r from-purple-500/20 to-pink-500/20',
                        iconColor: 'text-purple-400'
                    },
                    {
                        id: 3,
                        title: 'Sharing & Collaboration',
                        description: 'How to share presentations and collaborate with teams',
                        articles: 8,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>',
                        iconClass: 'bg-gradient-to-r from-green-500/20 to-emerald-500/20',
                        iconColor: 'text-green-400'
                    },
                    {
                        id: 4,
                        title: 'Media & Assets',
                        description: 'Managing images, videos, and other media files',
                        articles: 10,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>',
                        iconClass: 'bg-gradient-to-r from-orange-500/20 to-red-500/20',
                        iconColor: 'text-orange-400'
                    },
                    {
                        id: 5,
                        title: 'Analytics & Reports',
                        description: 'Understanding your presentation performance metrics',
                        articles: 6,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>',
                        iconClass: 'bg-gradient-to-r from-teal-500/20 to-cyan-500/20',
                        iconColor: 'text-teal-400'
                    },
                    {
                        id: 6,
                        title: 'Account & Settings',
                        description: 'Managing your account, billing, and preferences',
                        articles: 9,
                        icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>',
                        iconClass: 'bg-gradient-to-r from-indigo-500/20 to-purple-500/20',
                        iconColor: 'text-indigo-400'
                    }
                ],

                recentUpdates: [
                    {
                        id: 1,
                        title: 'New Analytics Dashboard',
                        description: 'Enhanced analytics with real-time charts and insights',
                        date: '2 days ago',
                        type: 'Feature',
                        typeClass: 'bg-green-500/20 text-green-400'
                    },
                    {
                        id: 2,
                        title: 'Improved Media Library',
                        description: 'Better file organization and preview capabilities',
                        date: '1 week ago',
                        type: 'Update',
                        typeClass: 'bg-blue-500/20 text-blue-400'
                    },
                    {
                        id: 3,
                        title: 'Performance Optimization',
                        description: 'Faster loading times and improved responsiveness',
                        date: '2 weeks ago',
                        type: 'Fix',
                        typeClass: 'bg-orange-500/20 text-orange-400'
                    }
                ],

                faqs: [
                    {
                        id: 1,
                        question: 'How do I create my first presentation?',
                        answer: 'Click on the "New Presentation" button in your dashboard, choose a template or start from scratch, and begin adding your content using our intuitive editor.',
                        open: false
                    },
                    {
                        id: 2,
                        question: 'Can I collaborate with team members?',
                        answer: 'Yes! You can share presentations with team members and set different permission levels (view, edit, comment) for collaborative work.',
                        open: false
                    },
                    {
                        id: 3,
                        question: 'How do I export my presentations?',
                        answer: 'Go to your presentation, click the "Export" button, and choose from various formats including PDF, PowerPoint, or HTML.',
                        open: false
                    },
                    {
                        id: 4,
                        question: 'Is there a mobile app available?',
                        answer: 'Currently, ParHub is optimized for web browsers and works great on mobile devices. A dedicated mobile app is in development.',
                        open: false
                    },
                    {
                        id: 5,
                        question: 'How can I upgrade my storage?',
                        answer: 'Visit the Billing section in your account settings to view available storage plans and upgrade options.',
                        open: false
                    }
                ],

                searchHelp() {
                    if (this.searchQuery.length > 2) {
                        // Simulate search results
                        this.searchResults = [
                            {
                                id: 1,
                                title: 'How to create presentations',
                                excerpt: 'Step-by-step guide to creating your first presentation...'
                            },
                            {
                                id: 2,
                                title: 'Sharing presentations with teams',
                                excerpt: 'Learn how to collaborate and share with team members...'
                            }
                        ];
                    } else {
                        this.searchResults = [];
                    }
                },

                openArticle(article) {
                    console.log('Opening article:', article.title);
                    // Implement article opening logic
                },

                openTopic(topic) {
                    console.log('Opening topic:', topic.title);
                    // Implement topic opening logic
                },

                openChat() {
                    console.log('Opening live chat');
                    // Implement live chat logic
                },

                contactSupport() {
                    console.log('Opening contact support');
                    // Implement contact support logic
                }
            }
        }
    </script>

    <style>
        .gradient-text-indigo {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</x-layouts.app>
