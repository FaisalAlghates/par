<x-page :title="__('New category')" :subtitle="__('Group related templates together')">
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        @include('categories._form')
    </form>
</x-page>
