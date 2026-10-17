<x-page :title="$category->name" :subtitle="$category->description">
    <x-slot:actions>
        <a href="{{ route('categories.edit', $category) }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('Edit') }}</a>
        <a href="{{ route('categories.index') }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('All categories') }}</a>
    </x-slot:actions>

    <div class="grid gap-4 sm:grid-cols-3 mb-8">
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Templates') }}</div><div class="text-4xl font-bold">{{ $stats['templates'] }}</div></div>
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Active templates') }}</div><div class="text-4xl font-bold">{{ $stats['activeTemplates'] }}</div></div>
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Downloads') }}</div><div class="text-4xl font-bold">{{ $stats['totalDownloads'] }}</div></div>
    </div>

    @if ($category->templates->isEmpty())
        <div class="glass-card rounded-2xl p-10 text-center text-white/70">{{ __('No templates in this category yet.') }}</div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($category->templates as $template)
                <a href="{{ route('templates.show', $template) }}" class="glass-card rounded-2xl p-6 text-white block">
                    <h2 class="text-xl font-semibold mb-2">{{ $template->name }}</h2>
                    <p class="text-white/70 line-clamp-2">{{ $template->description }}</p>
                </a>
            @endforeach
        </div>
    @endif
</x-page>
