<x-page :title="$template->name" :subtitle="__('Template preview')">
    <x-slot:actions>
        <a href="{{ route('templates.show', $template) }}" class="px-5 py-3 rounded-xl glass-card text-white">{{ __('Back to template') }}</a>
    </x-slot:actions>

    @php($accent = data_get($template->styles, 'accent', '#8b5cf6'))
    @php($background = data_get($template->styles, 'background', '#0f172a'))
    <div class="grid gap-6 sm:grid-cols-2">
        @forelse ((array) $template->layout as $index => $slide)
            <section class="rounded-2xl p-8 aspect-video flex flex-col justify-center text-white" style="background: {{ $background }}; border: 2px solid {{ $accent }}" aria-label="{{ __('Slide :n', ['n' => $index + 1]) }}">
                <div class="text-sm opacity-60 mb-2">{{ __('Slide :n', ['n' => $index + 1]) }}</div>
                <h2 class="text-2xl font-bold mb-2" style="color: {{ $accent }}">{{ data_get($slide, 'title', __('Untitled')) }}</h2>
                <p class="opacity-80">{{ data_get($slide, 'content', '') }}</p>
            </section>
        @empty
            <div class="glass-card rounded-2xl p-10 text-center text-white/70 sm:col-span-2">{{ __('This template has no slides yet.') }}</div>
        @endforelse
    </div>
</x-page>
