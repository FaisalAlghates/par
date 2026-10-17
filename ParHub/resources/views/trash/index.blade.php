<x-page :title="__('Trash')" :subtitle="__('Deleted presentations')">
    <div class="glass-card rounded-2xl p-10 text-center text-white">
        <div class="text-5xl mb-4" aria-hidden="true">🗑</div>
        <h2 class="text-2xl font-semibold mb-2">{{ __('The trash is empty') }}</h2>
        <p class="text-white/70 max-w-xl mx-auto">{{ __('Presentations you delete are removed right away. Recovering deleted items is not available yet.') }}</p>
        <a href="{{ route('presentations.index') }}" class="inline-block mt-6 px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Back to presentations') }}</a>
    </div>
</x-page>
