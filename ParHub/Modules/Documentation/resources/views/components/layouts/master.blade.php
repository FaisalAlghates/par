<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: false }" 
      :class="{ 'dark': darkMode }">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ config('app.name', 'DocuMagic AI') }} - Upload Document</title>

        <meta name="description" content="Upload your documents and transform them into stunning AI-powered presentations">
        <meta name="keywords" content="AI, presentations, documents, PDF, Word, PowerPoint, automation, artificial intelligence">
        <meta name="author" content="DocuMagic AI Team">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="icon" type="image/png" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Additional design libraries -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        
        <!-- Custom Styles -->
        <style>
            :root {
                --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --tertiary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                --glass-bg: rgba(255, 255, 255, 0.1);
                --glass-border: rgba(255, 255, 255, 0.2);
                --shadow-glow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                --shadow-elegant: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            
            .glass-effect {
                background: var(--glass-bg);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid var(--glass-border);
            }
            
            .gradient-text {
                background: var(--primary-gradient);
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
            
            .glow {
                box-shadow: var(--shadow-glow);
            }
            
            .elegant-shadow {
                box-shadow: var(--shadow-elegant);
            }
            
            .aurora-bg {
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: aurora 15s ease infinite;
            }
            
            @keyframes aurora {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .mesh-gradient {
                background: radial-gradient(circle at 20% 80%, #120078 0%, transparent 50%),
                           radial-gradient(circle at 80% 20%, #8e0e00 0%, transparent 50%),
                           radial-gradient(circle at 40% 40%, #2b1b17 0%, transparent 50%),
                           radial-gradient(circle at 80% 80%, #000 0%, transparent 50%),
                           radial-gradient(circle at 20% 20%, #20295F 0%, transparent 50%);
            }
        </style>
    </head>

    <body class="font-inter antialiased transition-all duration-500 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 overflow-x-hidden">
        {{ $slot }}

        @livewireScripts
        <script src="//unpkg.com/alpinejs" defer></script>
        
        <!-- Smooth scrolling and enhanced interactions -->
        <script>
            // Enhanced dark mode with system preference detection
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
            
            // Smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
            
            // Add loading animation
            window.addEventListener('load', function() {
                document.body.classList.add('animate__fadeIn');
            });
        </script>
    </body>
</html>
