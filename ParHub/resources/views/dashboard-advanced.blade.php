<x-layouts.app :title="__('Advanced Dashboard')" x-data="dashboardData()">
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
                                Dashboard Overview
                            </h1>
                            <p class="text-white/70 text-lg">
                                Your presentation analytics and insights
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button @click="refreshStats" class="glass-card p-3 rounded-xl hover:bg-white/10 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </button>
                            <div class="text-white/50 text-sm">
                                Last updated: {{ now()->format('H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <!-- Total Presentations -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['presentations']['total'] }}</h3>
                    <p class="text-white/60 text-sm">Total Presentations</p>
                    <div class="mt-2">
                        <span class="text-green-400 text-xs">{{ $stats['presentations']['published'] }} published</span>
                    </div>
                </div>

                <!-- Total Views -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ number_format($stats['presentations']['totalViews']) }}</h3>
                    <p class="text-white/60 text-sm">Total Views</p>
                    <div class="mt-2">
                        <span class="text-blue-400 text-xs">{{ $stats['presentations']['published'] > 0 ? number_format($stats['presentations']['totalViews'] / $stats['presentations']['published']) : 0 }} avg per presentation</span>
                    </div>
                </div>

                <!-- Available Templates -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['templates']['total'] }}</h3>
                    <p class="text-white/60 text-sm">Available Templates</p>
                    <div class="mt-2">
                        <span class="text-green-400 text-xs">{{ $stats['templates']['free'] }} free</span>
                        <span class="text-yellow-400 text-xs ml-2">{{ $stats['templates']['premium'] }} premium</span>
                    </div>
                </div>

                <!-- Average Rating -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ number_format($stats['reviews']['averageRating'] ?? 0, 1) }}</h3>
                    <p class="text-white/60 text-sm">Average Rating</p>
                    <div class="mt-2">
                        <span class="text-purple-400 text-xs">{{ $stats['reviews']['total'] }} reviews</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Presentations Chart -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-white">Presentations Over Time</h3>
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                            <span class="text-white/60 text-sm">Monthly</span>
                        </div>
                    </div>
                    <div class="h-64 flex items-end space-x-2">
                        @foreach($presentationsChart as $data)
                        <div class="flex-1 flex flex-col items-center">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-purple-500 rounded-t-lg opacity-80 hover:opacity-100 transition-opacity duration-300"
                                 style="height: {{ $data->count > 0 ? ($data->count / $presentationsChart->max('count')) * 200 : 2 }}px"></div>
                            <div class="text-white/60 text-xs mt-2">{{ $data->month_name }}</div>
                            <div class="text-white text-sm font-semibold">{{ $data->count }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Views Chart -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-white">Views This Week</h3>
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            <span class="text-white/60 text-sm">Daily</span>
                        </div>
                    </div>
                    <div class="h-64">
                        <svg class="w-full h-full" viewBox="0 0 300 200">
                            @php
                                $maxViews = collect($viewsChart)->max('views') ?: 1;
                                $points = collect($viewsChart)->map(function($item, $index) use ($maxViews) {
                                    $x = ($index / (count($viewsChart) - 1)) * 280 + 10;
                                    $y = 190 - (($item['views'] / $maxViews) * 170);
                                    return "{$x},{$y}";
                                })->implode(' ');
                            @endphp
                            <polyline fill="none" stroke="url(#greenGradient)" stroke-width="3" points="{{ $points }}"/>
                            <defs>
                                <linearGradient id="greenGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:#10B981;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#34D399;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            @foreach($viewsChart as $index => $data)
                            <circle cx="{{ ($index / (count($viewsChart) - 1)) * 280 + 10 }}" 
                                   cy="{{ 190 - (($data['views'] / $maxViews) * 170) }}" 
                                   r="4" 
                                   fill="#10B981"
                                   class="hover:r-6 transition-all duration-200">
                                <title>{{ $data['date'] }}: {{ $data['views'] }} views</title>
                            </circle>
                            @endforeach
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Presentations -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                    <h3 class="text-xl font-semibold text-white mb-6">Recent Presentations</h3>
                    <div class="space-y-4">
                        @foreach($recentPresentations as $presentation)
                        <div class="flex items-center space-x-3 p-3 glass-card rounded-xl hover:bg-white/5 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-white font-medium">{{ Str::limit($presentation->title, 20) }}</h4>
                                <p class="text-white/60 text-sm">{{ $presentation->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-white/50 text-sm">
                                {{ $presentation->views }} views
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Popular Templates -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                    <h3 class="text-xl font-semibold text-white mb-6">Popular Templates</h3>
                    <div class="space-y-4">
                        @foreach($popularTemplates as $template)
                        <div class="flex items-center space-x-3 p-3 glass-card rounded-xl hover:bg-white/5 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-white font-medium">{{ Str::limit($template->name, 18) }}</h4>
                                <p class="text-white/60 text-sm">{{ $template->category->name }}</p>
                            </div>
                            <div class="text-white/50 text-sm">
                                {{ $template->formatted_downloads }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Reviews -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.6s">
                    <h3 class="text-xl font-semibold text-white mb-6">Recent Reviews</h3>
                    <div class="space-y-4">
                        @foreach($recentReviews as $review)
                        <div class="p-3 glass-card rounded-xl">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full flex items-center justify-center">
                                    <span class="text-purple-400 text-xs font-semibold">{{ substr($review->user->name, 0, 1) }}</span>
                                </div>
                                <div class="flex-1">
                                    <div class="text-yellow-400 text-sm">{{ $review->formatted_rating }}</div>
                                </div>
                                <div class="text-white/50 text-xs">
                                    {{ $review->time_ago }}
                                </div>
                            </div>
                            <p class="text-white/70 text-sm">{{ Str::limit($review->comment, 80) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function dashboardData() {
            return {
                refreshStats() {
                    fetch('/dashboard/quick-stats')
                        .then(response => response.json())
                        .then(data => {
                            // Update stats in real-time
                            console.log('Stats updated:', data);
                        });
                }
            }
        }
    </script>
</x-layouts.app>
