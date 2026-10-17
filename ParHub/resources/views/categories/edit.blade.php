<x-page :title="__('Edit category')" :subtitle="$category->name">
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        @include('categories._form')
    </form>

    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="mt-6" onsubmit="return confirm('{{ __('Delete this category?') }}')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-6 py-3 rounded-xl glass-card text-red-300">{{ __('Delete category') }}</button>
    </form>
</x-page>
