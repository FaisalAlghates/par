<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ParHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .elegant-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .glow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-blue-900 dark:to-indigo-900 flex items-center justify-center p-4">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-gradient-to-br from-violet-400/20 to-purple-600/20 rounded-full filter blur-3xl floating-animation"></div>
        <div class="absolute top-1/2 -right-10 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute -bottom-10 left-1/2 w-36 h-36 bg-gradient-to-br from-emerald-400/20 to-teal-600/20 rounded-full filter blur-3xl floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md">
        <div class="glass-effect rounded-3xl p-8 elegant-shadow">
            
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 elegant-shadow floating-animation">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
                    Welcome to <span class="gradient-text">ParHub</span>
                </h1>
                <p class="text-slate-600 dark:text-slate-400">
                    Sign in to your account to continue
                </p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <ul class="text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <p class="text-sm text-green-600">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                @csrf
                
                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input 
                            name="email"
                            type="email" 
                            id="email"
                            required 
                            autofocus 
                            autocomplete="email"
                            value="dfsdrge@gmail.com"
                            placeholder="email@example.com"
                            class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-violet-500 text-slate-900 dark:text-white placeholder-slate-500 backdrop-blur-sm transition-all duration-200"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Password
                        </label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            name="password"
                            type="password" 
                            id="password"
                            required 
                            autocomplete="current-password"
                            value="password"
                            placeholder="Enter your password"
                            class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-violet-500 text-slate-900 dark:text-white placeholder-slate-500 backdrop-blur-sm transition-all duration-200"
                        >
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        name="remember"
                        type="checkbox" 
                        id="remember"
                        class="w-4 h-4 text-violet-600 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded focus:ring-violet-500 focus:ring-2"
                    >
                    <label for="remember" class="ml-2 text-sm text-slate-700 dark:text-slate-300">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button 
                        type="submit" 
                        class="w-full group relative overflow-hidden px-6 py-4 bg-gradient-to-r from-violet-600 to-purple-600 text-white text-lg font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] glow hover:from-violet-700 hover:to-purple-700"
                    >
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Sign In
                        </span>
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-700 text-center">
                <p class="text-slate-600 dark:text-slate-400 mb-4">
                    Don't have an account?
                </p>
                <a href="{{ route('register') }}" class="w-full px-6 py-3 glass-effect rounded-xl hover:bg-white/20 transition-all duration-300 text-slate-700 dark:text-slate-300 font-medium inline-block">
                    Create New Account
                </a>
                
                <!-- Temporary Quick Login Button for Testing -->
                <div class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Testing Purpose Only:</p>
                    <div class="flex gap-2 text-xs justify-center">
                        <a href="{{ route('test.login') }}" class="text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 transition-colors underline">
                            Auto Login
                        </a>
                        <span class="text-slate-400">|</span>
                        <a href="{{ route('quick.login') }}" class="text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 transition-colors underline">
                            Quick Login Test
                        </a>
                        <span class="text-slate-400">|</span>
                        <a href="{{ route('quick.login.direct') }}" class="text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 transition-colors underline">
                            Direct Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
