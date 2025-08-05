<x-layouts.app :title="__('AI Assistant')" x-data="aiAssistantData()">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-96 h-96 bg-gradient-to-r from-orange-400 to-red-500 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-red-400 to-pink-500 rounded-full opacity-15 blur-3xl animate-pulse" style="animation-delay: 2s"></div>
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
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-4xl font-bold text-white">
                                            AI Assistant
                                        </h1>
                                        <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm px-3 py-1 rounded-full font-semibold animate-pulse">
                                            Beta
                                        </span>
                                    </div>
                                </div>
                                <p class="text-white/70 text-lg">
                                    Create stunning presentations with the power of artificial intelligence.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="flex items-center space-x-3">
                            <button @click="showHelp = !showHelp" 
                                    class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <button @click="startNewChat()" 
                                    class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                                <svg class="w-5 h-5 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Chat Interface -->
            <div class="grid lg:grid-cols-4 gap-8">
                
                <!-- Chat Area -->
                <div class="lg:col-span-3">
                    <div class="glass-effect-card rounded-3xl p-8 h-[600px] flex flex-col">
                        
                        <!-- Chat Header -->
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">AI Presentation Creator</h3>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-slate-500 dark:text-slate-400">
                                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                <span>Online</span>
                            </div>
                        </div>

                        <!-- Messages Area -->
                        <div class="flex-1 overflow-y-auto mb-6 space-y-4" x-ref="messagesContainer">
                            
                            <!-- Welcome Message -->
                            <div x-show="messages.length === 0" class="text-center py-12">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Welcome to AI Assistant!</h4>
                                <p class="text-slate-600 dark:text-slate-400 mb-6 max-w-md mx-auto">
                                    Tell me what presentation you'd like to create, and I'll help you build it step by step.
                                </p>
                                
                                <!-- Quick Start Examples -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-w-lg mx-auto">
                                    <button @click="sendMessage('Create a business pitch presentation for a new mobile app')" 
                                            class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 text-left">
                                        <div class="text-sm font-medium text-slate-900 dark:text-white">Business Pitch</div>
                                        <div class="text-xs text-slate-600 dark:text-slate-400">Mobile app presentation</div>
                                    </button>
                                    <button @click="sendMessage('Help me create an educational presentation about climate change')" 
                                            class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 text-left">
                                        <div class="text-sm font-medium text-slate-900 dark:text-white">Educational</div>
                                        <div class="text-xs text-slate-600 dark:text-slate-400">Climate change topic</div>
                                    </button>
                                    <button @click="sendMessage('Create a marketing presentation for social media strategy')" 
                                            class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 text-left">
                                        <div class="text-sm font-medium text-slate-900 dark:text-white">Marketing</div>
                                        <div class="text-xs text-slate-600 dark:text-slate-400">Social media focus</div>
                                    </button>
                                    <button @click="sendMessage('Help me make a portfolio presentation to showcase my work')" 
                                            class="glass-card p-3 rounded-xl hover:bg-white/20 transition-all duration-300 text-left">
                                        <div class="text-sm font-medium text-slate-900 dark:text-white">Portfolio</div>
                                        <div class="text-xs text-slate-600 dark:text-slate-400">Showcase work</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Chat Messages -->
                            <template x-for="message in messages" :key="message.id">
                                <div :class="message.type === 'user' ? 'flex justify-end' : 'flex justify-start'">
                                    <div :class="message.type === 'user' ? 
                                        'bg-gradient-to-r from-orange-500 to-red-600 text-white max-w-xs lg:max-w-md px-4 py-3 rounded-2xl rounded-tr-md' :
                                        'glass-card max-w-xs lg:max-w-md px-4 py-3 rounded-2xl rounded-tl-md'">
                                        <div class="text-sm" x-text="message.content"></div>
                                        <div :class="message.type === 'user' ? 'text-white/70' : 'text-slate-500 dark:text-slate-400'" 
                                             class="text-xs mt-1" x-text="message.time"></div>
                                    </div>
                                </div>
                            </template>

                            <!-- Typing Indicator -->
                            <div x-show="isTyping" class="flex justify-start">
                                <div class="glass-card max-w-xs px-4 py-3 rounded-2xl rounded-tl-md">
                                    <div class="flex items-center space-x-1">
                                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"></div>
                                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Input Area -->
                        <div class="relative">
                            <div class="flex items-center space-x-3">
                                <div class="flex-1 relative">
                                    <input x-model="currentMessage" 
                                           @keydown.enter="sendMessage()"
                                           :disabled="isTyping"
                                           type="text" 
                                           placeholder="Describe the presentation you want to create..."
                                           class="w-full bg-white/10 border border-white/20 rounded-2xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500/50 backdrop-blur-sm">
                                </div>
                                <button @click="sendMessage()" 
                                        :disabled="!currentMessage.trim() || isTyping"
                                        :class="(!currentMessage.trim() || isTyping) ? 'opacity-50 cursor-not-allowed' : 'hover:scale-105'"
                                        class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-3 rounded-2xl transition-all duration-300 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    
                    <!-- AI Capabilities -->
                    <div class="glass-effect-card rounded-2xl p-6">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            AI Capabilities
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-2 text-sm">
                                <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                                <span class="text-slate-600 dark:text-slate-400">Smart Content Generation</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm">
                                <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                <span class="text-slate-600 dark:text-slate-400">Auto Design Suggestions</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm">
                                <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                <span class="text-slate-600 dark:text-slate-400">Instant Slide Creation</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                <span class="text-slate-600 dark:text-slate-400">Template Recommendations</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Conversations -->
                    <div class="glass-effect-card rounded-2xl p-6">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Recent Chats
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="p-2 glass-card rounded-lg cursor-pointer hover:bg-white/20 transition-colors">
                                <div class="font-medium text-slate-900 dark:text-white">Business Pitch</div>
                                <div class="text-slate-500 dark:text-slate-400">2 hours ago</div>
                            </div>
                            <div class="p-2 glass-card rounded-lg cursor-pointer hover:bg-white/20 transition-colors">
                                <div class="font-medium text-slate-900 dark:text-white">Marketing Strategy</div>
                                <div class="text-slate-500 dark:text-slate-400">Yesterday</div>
                            </div>
                            <div class="p-2 glass-card rounded-lg cursor-pointer hover:bg-white/20 transition-colors">
                                <div class="font-medium text-slate-900 dark:text-white">Portfolio Review</div>
                                <div class="text-slate-500 dark:text-slate-400">3 days ago</div>
                            </div>
                        </div>
                    </div>

                    <!-- Help Section -->
                    <div x-show="showHelp" class="glass-effect-card rounded-2xl p-6">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Tips & Help
                        </h4>
                        <div class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                            <div>• Be specific about your presentation topic and audience</div>
                            <div>• Mention the number of slides you need</div>
                            <div>• Include any specific points you want to cover</div>
                            <div>• Ask for design style preferences</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript for AI Assistant -->
    <script>
        function aiAssistantData() {
            return {
                messages: [],
                currentMessage: '',
                isTyping: false,
                showHelp: false,
                messageId: 1,
                
                sendMessage(message = null) {
                    const messageText = message || this.currentMessage.trim();
                    if (!messageText || this.isTyping) return;
                    
                    // Add user message
                    this.messages.push({
                        id: this.messageId++,
                        type: 'user',
                        content: messageText,
                        time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
                    });
                    
                    this.currentMessage = '';
                    this.isTyping = true;
                    
                    // Simulate AI response
                    setTimeout(() => {
                        this.messages.push({
                            id: this.messageId++,
                            type: 'ai',
                            content: this.generateAIResponse(messageText),
                            time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
                        });
                        this.isTyping = false;
                        this.scrollToBottom();
                    }, 2000);
                    
                    this.scrollToBottom();
                },
                
                generateAIResponse(userMessage) {
                    const responses = [
                        "Great idea! I can help you create a professional presentation. Let me suggest a structure with an introduction, main points, and conclusion. Would you like me to start with a specific template?",
                        "That sounds like an excellent topic! I recommend starting with 8-10 slides including a title slide, agenda, key points, and call to action. What's your target audience?",
                        "Perfect! I can create a compelling presentation for you. Let's begin with a strong opening slide and then develop your main arguments. Do you have any specific data or examples you'd like to include?",
                        "Excellent choice! I'll help you build a presentation that captures attention. We should include visual elements, clear messaging, and a logical flow. What's the main goal of this presentation?"
                    ];
                    return responses[Math.floor(Math.random() * responses.length)];
                },
                
                startNewChat() {
                    this.messages = [];
                    this.currentMessage = '';
                    this.isTyping = false;
                },
                
                scrollToBottom() {
                    this.$nextTick(() => {
                        const container = this.$refs.messagesContainer;
                        container.scrollTop = container.scrollHeight;
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
        
        /* Chat scrollbar styling */
        .overflow-y-auto::-webkit-scrollbar {
            width: 4px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
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
        
        .lg\:grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
        
        .lg\:col-span-3 {
            grid-column: span 3 / span 3;
        }
        
        @media (max-width: 1024px) {
            .lg\:grid-cols-4 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
            
            .lg\:col-span-3 {
                grid-column: span 1 / span 1;
            }
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
            
            .h-\[600px\] {
                height: 500px;
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
