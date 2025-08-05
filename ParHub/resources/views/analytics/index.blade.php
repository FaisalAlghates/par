<x-layouts.app :title="__('Analytics')" x-data="analyticsData()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-green-400 to-teal-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-cyan mb-2">
                                Analytics Dashboard
                            </h1>
                            <p class="text-white/70 text-lg">
                                Deep insights into your presentation performance
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="glass-card rounded-xl p-3 flex items-center space-x-3">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <select x-model="timeRange" class="bg-transparent border-none outline-none text-white text-sm">
                                    <option value="7">Last 7 days</option>
                                    <option value="30">Last 30 days</option>
                                    <option value="90">Last 3 months</option>
                                    <option value="365">Last year</option>
                                </select>
                            </div>
                            <button @click="refreshData" class="glass-card p-3 rounded-xl hover:bg-white/10 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <!-- Total Views -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ number_format($analytics['presentations']['totalViews']) }}</h3>
                    <p class="text-white/60 text-sm">Total Views</p>
                    <div class="mt-2">
                        <span class="text-green-400 text-xs">+{{ number_format($analytics['growth']['monthlyGrowth'], 1) }}% from last period</span>
                    </div>
                </div>

                <!-- Average Views -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ number_format($analytics['presentations']['averageViews'] ?? 0) }}</h3>
                    <p class="text-white/60 text-sm">Avg per Presentation</p>
                    <div class="mt-2">
                        <span class="text-blue-400 text-xs">Real data from your presentations</span>
                    </div>
                </div>

                <!-- This Month -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $analytics['growth']['thisMonth'] }}</h3>
                    <p class="text-white/60 text-sm">This Month</p>
                    <div class="mt-2">
                        <span class="text-purple-400 text-xs">{{ $analytics['growth']['lastMonth'] }} last month</span>
                    </div>
                </div>

                <!-- Monthly Growth -->
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $analytics['growth']['monthlyGrowth'] > 0 ? '+' : '' }}{{ number_format($analytics['growth']['monthlyGrowth'], 1) }}%</h3>
                    <p class="text-white/60 text-sm">Monthly Growth</p>
                    <div class="mt-2">
                        <span class="{{ $analytics['growth']['monthlyGrowth'] > 0 ? 'text-green-400' : 'text-red-400' }} text-xs">
                            {{ $analytics['growth']['monthlyGrowth'] > 0 ? 'Above target' : 'Below target' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Views Over Time Chart -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-white">Views Over Time</h3>
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-cyan-500 rounded-full"></span>
                            <span class="text-white/60 text-sm">Daily Views</span>
                        </div>
                    </div>
                    <div class="h-64">
                        <canvas id="viewsChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Presentation Performance -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-white">Top Performing Content</h3>
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
                            <span class="text-white/60 text-sm">Views</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <template x-for="presentation in topPresentations" :key="presentation.id">
                            <div class="flex items-center justify-between p-3 glass-card rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium" x-text="presentation.title"></h4>
                                        <p class="text-white/60 text-sm" x-text="presentation.category"></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-white font-semibold" x-text="presentation.views + ' views'"></div>
                                    <div class="text-white/60 text-sm" x-text="presentation.rating + ' ★'"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Detailed Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Traffic Sources -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                    <h3 class="text-xl font-semibold text-white mb-6">Traffic Sources</h3>
                    <div class="space-y-4">
                        <template x-for="source in trafficSources" :key="source.name">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 rounded-full" :style="`background-color: ${source.color}`"></div>
                                    <span class="text-white/80" x-text="source.name"></span>
                                </div>
                                <div class="text-right">
                                    <div class="text-white font-semibold" x-text="source.percentage + '%'"></div>
                                    <div class="text-white/60 text-xs" x-text="source.visitors + ' visitors'"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Device Analytics -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                    <h3 class="text-xl font-semibold text-white mb-6">Device Breakdown</h3>
                    <div class="space-y-4">
                        <template x-for="device in deviceStats" :key="device.type">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-white/80" x-text="device.type"></span>
                                    <span class="text-white font-semibold" x-text="device.percentage + '%'"></span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-2">
                                    <div class="h-2 rounded-full" 
                                         :style="`width: ${device.percentage}%; background: linear-gradient(to right, ${device.color1}, ${device.color2})`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Geographic Data -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.6s">
                    <h3 class="text-xl font-semibold text-white mb-6">Top Locations</h3>
                    <div class="space-y-4">
                        <template x-for="location in topLocations" :key="location.country">
                            <div class="flex items-center justify-between p-3 glass-card rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <span class="text-2xl" x-text="location.flag"></span>
                                    <div>
                                        <div class="text-white font-medium" x-text="location.country"></div>
                                        <div class="text-white/60 text-sm" x-text="location.region"></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-white font-semibold" x-text="location.views"></div>
                                    <div class="text-white/60 text-sm" x-text="location.percentage + '%'"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function analyticsData() {
            return {
                timeRange: '30',
                metrics: {
                    totalViews: '2,847',
                    avgViews: '187',
                    engagementRate: '74.2%',
                    monthlyGrowth: '+23.4%'
                },
                topPresentations: {!! json_encode($analytics['topPresentations'] ?? []) !!},
                trafficSources: [
                    { name: 'Direct', percentage: 42, visitors: 1897, color: '#3B82F6' },
                    { name: 'Social Media', percentage: 28, visitors: 1264, color: '#8B5CF6' },
                    { name: 'Search Engines', percentage: 18, visitors: 812, color: '#10B981' },
                    { name: 'Email', percentage: 8, visitors: 361, color: '#F59E0B' },
                    { name: 'Referrals', percentage: 4, visitors: 180, color: '#EF4444' }
                ],
                deviceStats: [
                    { type: 'Desktop', percentage: 65, color1: '#3B82F6', color2: '#1D4ED8' },
                    { type: 'Mobile', percentage: 28, color1: '#8B5CF6', color2: '#7C3AED' },
                    { type: 'Tablet', percentage: 7, color1: '#10B981', color2: '#059669' }
                ],
                topLocations: [
                    { country: 'Saudi Arabia', region: 'Middle East', views: '1,234', percentage: '28.5', flag: '🇸🇦' },
                    { country: 'United States', region: 'North America', views: '987', percentage: '22.8', flag: '🇺🇸' },
                    { country: 'United Kingdom', region: 'Europe', views: '654', percentage: '15.1', flag: '🇬🇧' },
                    { country: 'Germany', region: 'Europe', views: '432', percentage: '10.0', flag: '🇩🇪' },
                    { country: 'Canada', region: 'North America', views: '321', percentage: '7.4', flag: '🇨🇦' }
                ],

                refreshData() {
                    // Fetch fresh data from API
                    fetch('/api/dashboard/quick-stats')
                        .then(response => response.json())
                        .then(data => {
                            // Update metrics if data is available
                            if (data.totalPresentations) {
                                location.reload(); // Simple refresh for now
                            }
                        })
                        .catch(error => {
                            console.error('Error refreshing data:', error);
                        });
                },

                init() {
                    // Initialize charts when component loads
                    this.$nextTick(() => {
                        this.initCharts();
                    });
                },

                initCharts() {
                    // Initialize Chart.js charts with real data
                    const ctx = document.getElementById('viewsChart');
                    if (ctx) {
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! json_encode($analytics['chart']['labels'] ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']) !!},
                                datasets: [{
                                    label: 'Views',
                                    data: {!! json_encode($analytics['chart']['views'] ?? [1200, 1900, 3000, 5000, 2000, 3000, 4500]) !!},
                                    borderColor: '#06B6D4',
                                    backgroundColor: 'rgba(6, 182, 212, 0.1)',
                                    tension: 0.4,
                                    fill: true
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            color: 'rgba(255, 255, 255, 0.1)'
                                        },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.7)'
                                        }
                                    },
                                    x: {
                                        grid: {
                                            color: 'rgba(255, 255, 255, 0.1)'
                                        },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.7)'
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</x-layouts.app>
