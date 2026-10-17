<x-page :title="$template->name" :subtitle="$template->description">
    <x-slot:actions>
        <a href="{{ route('templates.preview', $template) }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('Preview') }}</a>
        <a href="{{ route('templates.download', $template) }}" class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Download') }}</a>
        <a href="{{ route('templates.edit', $template) }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('Edit') }}</a>
    </x-slot:actions>

    <div class="grid gap-4 sm:grid-cols-4 mb-8 text-white">
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Category') }}</div><div class="text-xl font-semibold">{{ $stats['category'] }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Downloads') }}</div><div class="text-3xl font-bold">{{ $stats['downloads'] ?? 0 }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Rating') }}</div><div class="text-3xl font-bold">{{ number_format((float) ($stats['rating'] ?? 0), 1) }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Type') }}</div><div class="text-xl font-semibold">{{ $template->is_premium ? __('Premium') : __('Free') }}</div></div>
    </div>

    <h2 class="text-2xl font-semibold text-white mb-4">{{ __('Related templates') }}</h2>
    @if ($relatedTemplates->isEmpty())
        <div class="glass-card rounded-2xl p-8 text-center text-white/70">{{ __('No related templates yet.') }}</div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($relatedTemplates as $related)
                <a href="{{ route('templates.show', $related) }}" class="glass-card rounded-2xl p-6 text-white block">
                    <h3 class="font-semibold mb-1">{{ $related->name }}</h3>
                    <p class="text-white/70 text-sm line-clamp-2">{{ $related->description }}</p>
                </a>
            @endforeach
        </div>
    @endif
</x-page>
