<x-layouts.app :title="__('Profile')" x-data="profileData()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-80 h-80 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-purple-400 to-blue-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full opacity-10 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8 animate-fade-in-down">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-blue mb-2">
                                My Profile
                            </h1>
                            <p class="text-white/70 text-lg">
                                Manage your account settings and preferences
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button @click="editMode = !editMode" class="glass-card px-6 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span x-text="editMode ? 'Cancel' : 'Edit Profile'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Profile Picture & Basic Info -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-4xl font-bold mx-auto mb-4">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                            </div>
                            <template x-if="editMode">
                                <button class="absolute bottom-2 right-2 w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </button>
                            </template>
                        </div>
                        
                        <h2 class="text-2xl font-bold text-white mb-2">{{ auth()->user()->name ?? 'User Name' }}</h2>
                        <p class="text-white/60 mb-4">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                        
                        <div class="space-y-3">
                            <div class="glass-card p-3 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-white/70">Member since</span>
                                    <span class="text-white">{{ auth()->user()->created_at ? auth()->user()->created_at->format('M Y') : 'Jan 2025' }}</span>
                                </div>
                            </div>
                            <div class="glass-card p-3 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-white/70">Presentations</span>
                                    <span class="text-white">{{ \App\Models\Presentation::count() }}</span>
                                </div>
                            </div>
                            <div class="glass-card p-3 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <span class="text-white/70">Plan</span>
                                    <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-xs px-2 py-1 rounded-full">Pro</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Personal Information -->
                    <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-white">Personal Information</h3>
                            <template x-if="editMode">
                                <button @click="saveProfile()" class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg hover:from-green-600 hover:to-emerald-600 transition-all duration-300">
                                    Save Changes
                                </button>
                            </template>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Full Name</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white">{{ auth()->user()->name ?? 'John Doe' }}</span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.name" type="text" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Email</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white">{{ auth()->user()->email ?? 'john@example.com' }}</span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.email" type="email" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Job Title</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white" x-text="profile.jobTitle"></span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.jobTitle" type="text" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Company</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white" x-text="profile.company"></span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.company" type="text" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Phone</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white" x-text="profile.phone"></span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.phone" type="tel" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2">Location</label>
                                <template x-if="!editMode">
                                    <div class="glass-card p-3 rounded-xl">
                                        <span class="text-white" x-text="profile.location"></span>
                                    </div>
                                </template>
                                <template x-if="editMode">
                                    <input x-model="profile.location" type="text" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </template>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-white/70 text-sm font-medium mb-2">Bio</label>
                            <template x-if="!editMode">
                                <div class="glass-card p-3 rounded-xl">
                                    <span class="text-white" x-text="profile.bio"></span>
                                </div>
                            </template>
                            <template x-if="editMode">
                                <textarea x-model="profile.bio" rows="3" class="w-full p-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                            </template>
                        </div>
                    </div>

                    <!-- Account Settings -->
                    <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                        <h3 class="text-xl font-bold text-white mb-6">Account Settings</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                                <div>
                                    <h4 class="text-white font-medium">Email Notifications</h4>
                                    <p class="text-white/60 text-sm">Receive updates about your presentations</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input x-model="settings.emailNotifications" type="checkbox" class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-white/20 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                                <div>
                                    <h4 class="text-white font-medium">Marketing Emails</h4>
                                    <p class="text-white/60 text-sm">Receive tips and product updates</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input x-model="settings.marketingEmails" type="checkbox" class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-white/20 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                                <div>
                                    <h4 class="text-white font-medium">Two-Factor Authentication</h4>
                                    <p class="text-white/60 text-sm">Add an extra layer of security</p>
                                </div>
                                <button class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg hover:from-green-600 hover:to-emerald-600 transition-all duration-300 text-sm">
                                    Enable
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Summary -->
                    <div class="glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                        <h3 class="text-xl font-bold text-white mb-6">Activity Summary</h3>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center p-4 bg-white/5 rounded-xl">
                                <div class="text-2xl font-bold text-white mb-1">{{ \App\Models\Presentation::count() }}</div>
                                <div class="text-white/60 text-sm">Presentations</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-xl">
                                <div class="text-2xl font-bold text-white mb-1">{{ \App\Models\Template::count() }}</div>
                                <div class="text-white/60 text-sm">Templates Used</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-xl">
                                <div class="text-2xl font-bold text-white mb-1">24</div>
                                <div class="text-white/60 text-sm">Collaborations</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-xl">
                                <div class="text-2xl font-bold text-white mb-1">156</div>
                                <div class="text-white/60 text-sm">Total Views</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function profileData() {
            return {
                editMode: false,
                
                profile: {
                    name: '{{ auth()->user()->name ?? "John Doe" }}',
                    email: '{{ auth()->user()->email ?? "john@example.com" }}',
                    jobTitle: 'Senior Product Manager',
                    company: 'Tech Solutions Inc.',
                    phone: '+966 55 123 4567',
                    location: 'Riyadh, Saudi Arabia',
                    bio: 'Passionate about creating impactful presentations and helping teams communicate effectively. 5+ years experience in product management and strategic planning.'
                },

                settings: {
                    emailNotifications: true,
                    marketingEmails: false,
                    twoFactorAuth: false
                },

                saveProfile() {
                    // Simulate saving profile
                    console.log('Saving profile:', this.profile);
                    
                    // Show success message
                    alert('Profile updated successfully!');
                    
                    // Exit edit mode
                    this.editMode = false;
                }
            }
        }
    </script>

    <style>
        .gradient-text-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</x-layouts.app>
