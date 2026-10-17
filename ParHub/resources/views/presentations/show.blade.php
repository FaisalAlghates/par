<x-page :title="$presentation->title" :subtitle="$presentation->description">
    <x-slot:actions>
        @if ($presentation->user_id === auth()->id())
            <a href="{{ route('presentations.edit', $presentation) }}" class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Edit') }}</a>
        @endif
        <a href="{{ route('presentations.index') }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('All presentations') }}</a>
    </x-slot:actions>

    <div class="grid gap-4 sm:grid-cols-4 mb-8 text-white">
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Status') }}</div><div class="text-xl font-semibold capitalize">{{ $presentation->status }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Views') }}</div><div class="text-3xl font-bold">{{ $presentation->views }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Slides') }}</div><div class="text-3xl font-bold">{{ count((array) $presentation->slides) }}</div></div>
        <div class="glass-card rounded-2xl p-6"><div class="text-white/60">{{ __('Last edited') }}</div><div class="text-xl font-semibold">{{ optional($presentation->last_edited ?? $presentation->updated_at)->diffForHumans() }}</div></div>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        @forelse ((array) $presentation->slides as $index => $slide)
            <section class="glass-card rounded-2xl p-8 aspect-video flex flex-col justify-center text-white" aria-label="{{ __('Slide :n', ['n' => $index + 1]) }}">
                <div class="text-sm text-white/50 mb-2">{{ __('Slide :n', ['n' => $index + 1]) }}</div>
                <h2 class="text-2xl font-bold mb-2">{{ data_get($slide, 'title', __('Untitled')) }}</h2>
                <p class="text-white/80">{{ data_get($slide, 'content', '') }}</p>
            </section>
        @empty
            <div class="glass-card rounded-2xl p-10 text-center text-white/70 sm:col-span-2">{{ __('This presentation has no slides yet.') }}</div>
        @endforelse
    </div>
</x-page>
