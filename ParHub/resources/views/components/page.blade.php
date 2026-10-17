@props(['title', 'subtitle' => null])

<x-layouts.app :title="$title">
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-72 h-72 bg-gradient-to-r from-emerald-400 to-cyan-500 rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full opacity-20 blur-3xl"></div>
    </div>

    <div class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <div class="glass-effect-luxury rounded-2xl p-8">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h1 class="text-4xl font-bold gradient-text-blue mb-2">{{ $title }}</h1>
                            @if ($subtitle)
                                <p class="text-white/70 text-lg">{{ $subtitle }}</p>
                            @endif
                        </div>
                        @isset($actions)
                            <div class="flex items-center gap-3">{{ $actions }}</div>
                        @endisset
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-6 glass-card rounded-xl p-4 text-emerald-300" role="status">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-6 glass-card rounded-xl p-4 text-red-300" role="alert">
                    <ul class="list-disc ms-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
