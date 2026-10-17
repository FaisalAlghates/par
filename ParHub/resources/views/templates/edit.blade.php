<x-page :title="__('Edit template')" :subtitle="$template->name">
    <form method="POST" action="{{ route('templates.update', $template) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('templates._form')
    </form>

    <form method="POST" action="{{ route('templates.destroy', $template) }}" class="mt-6" onsubmit="return confirm('{{ __('Delete this template?') }}')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-6 py-3 rounded-xl glass-card text-red-300">{{ __('Delete template') }}</button>
    </form>
</x-page>
