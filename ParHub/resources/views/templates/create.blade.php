<x-page :title="__('New template')" :subtitle="__('Define the slide layout and its styles')">
    <form method="POST" action="{{ route('templates.store') }}" enctype="multipart/form-data">
        @csrf
        @include('templates._form')
    </form>
</x-page>
