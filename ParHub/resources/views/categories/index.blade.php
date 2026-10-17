<x-page :title="__('Categories')" :subtitle="__('Organize templates into categories')">
    <x-slot:actions>
        <a href="{{ route('categories.create') }}" class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('New category') }}</a>
    </x-slot:actions>

    <div class="grid gap-4 sm:grid-cols-3 mb-8">
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Categories') }}</div><div class="text-4xl font-bold">{{ $stats['total'] }}</div></div>
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Active') }}</div><div class="text-4xl font-bold">{{ $stats['active'] }}</div></div>
        <div class="glass-card rounded-2xl p-6 text-white"><div class="text-white/60">{{ __('Templates') }}</div><div class="text-4xl font-bold">{{ $stats['totalTemplates'] }}</div></div>
    </div>

    @if ($categories->isEmpty())
        <div class="glass-card rounded-2xl p-10 text-center text-white/70">{{ __('No categories yet.') }}</div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <article class="glass-card rounded-2xl p-6 text-white">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="inline-block w-4 h-4 rounded-full" style="background: {{ $category->color ?: '#8b5cf6' }}"></span>
                        <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
                    </div>
                    <p class="text-white/70 mb-4">{{ $category->description ?: __('No description') }}</p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-white/60">{{ trans_choice(':count template|:count templates', $category->templates_count) }}</span>
                        <span class="flex gap-3">
                            <a class="underline" href="{{ route('categories.show', $category) }}">{{ __('Open') }}</a>
                            <a class="underline" href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
                        </span>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</x-page>
