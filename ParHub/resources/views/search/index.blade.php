<x-page :title="__('Search')" :subtitle="__('Find templates and presentations')">
    <form method="GET" action="{{ route('search.index') }}" class="glass-card rounded-2xl p-6 mb-8 grid gap-4 md:grid-cols-5 text-white" role="search">
        <div class="md:col-span-2">
            <label for="q" class="sr-only">{{ __('Search') }}</label>
            <input id="q" name="q" value="{{ $query }}" placeholder="{{ __('Search...') }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
        </div>
        <div>
            <label for="type" class="sr-only">{{ __('Type') }}</label>
            <select id="type" name="type" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">
                @foreach (['all' => __('Everything'), 'templates' => __('Templates'), 'presentations' => __('Presentations')] as $value => $label)
                    <option value="{{ $value }}" class="text-black" @selected($type === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="category" class="sr-only">{{ __('Category') }}</label>
            <select id="category" name="category" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">
                <option value="" class="text-black">{{ __('Any category') }}</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" class="text-black" @selected((string) $category === (string) $item->id)>{{ $item->name }} ({{ $item->templates_count }})</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-3">
            <label for="sort" class="sr-only">{{ __('Sort') }}</label>
            <select id="sort" name="sort" class="flex-1 rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">
                @foreach (['relevance' => __('Relevance'), 'newest' => __('Newest'), 'popular' => __('Popular'), 'downloads' => __('Downloads'), 'rating' => __('Rating')] as $value => $label)
                    <option value="{{ $value }}" class="text-black" @selected($sort === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Search') }}</button>
        </div>
    </form>

    @php
        $templates = $type === 'presentations' ? collect() : ($type === 'templates' ? $results : ($results['templates'] ?? collect()));
        $presentations = $type === 'templates' ? collect() : ($type === 'presentations' ? $results : ($results['presentations'] ?? collect()));
    @endphp

    @if ($query === '')
        <div class="glass-card rounded-2xl p-10 text-center text-white/70">{{ __('Type something to search.') }}</div>
    @elseif ($templates->isEmpty() && $presentations->isEmpty())
        <div class="glass-card rounded-2xl p-10 text-center text-white/70">{{ __('No results for ":q".', ['q' => $query]) }}</div>
    @else
        @if ($templates->isNotEmpty())
            <h2 class="text-2xl font-semibold text-white mb-4">{{ __('Templates') }} ({{ $templates->count() }})</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-10">
                @foreach ($templates as $template)
                    <a href="{{ route('templates.show', $template) }}" class="glass-card rounded-2xl p-6 text-white block">
                        <h3 class="font-semibold mb-1">{{ $template->name }}</h3>
                        <p class="text-white/70 text-sm line-clamp-2">{{ $template->description }}</p>
                        <span class="text-xs text-white/50">{{ optional($template->category)->name }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        @if ($presentations->isNotEmpty())
            <h2 class="text-2xl font-semibold text-white mb-4">{{ __('Presentations') }} ({{ $presentations->count() }})</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($presentations as $presentation)
                    <a href="{{ route('presentations.show', $presentation) }}" class="glass-card rounded-2xl p-6 text-white block">
                        <h3 class="font-semibold mb-1">{{ $presentation->title }}</h3>
                        <p class="text-white/70 text-sm line-clamp-2">{{ $presentation->description }}</p>
                        <span class="text-xs text-white/50 capitalize">{{ $presentation->status }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    @endif
</x-page>
