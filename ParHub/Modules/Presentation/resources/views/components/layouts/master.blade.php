<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ $title ?? 'Presentation Viewer' }} - {{ config('app.name', 'DocuMagic AI') }}</title>

        <meta name="description" content="{{ $description ?? 'View and present your AI-generated presentations' }}">
        <meta name="keywords" content="{{ $keywords ?? 'presentations, AI, slides, viewer, DocuMagic' }}">
        <meta name="author" content="{{ $author ?? 'DocuMagic AI Team' }}">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="icon" type="image/png" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="font-inter antialiased">
        {{ $slot }}

        @livewireScripts
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
