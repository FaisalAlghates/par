<x-page :title="__('Import and export')" :subtitle="__('Bring existing files in, or take your presentations out')">
    <div class="grid gap-6 lg:grid-cols-2">
        <section class="glass-card rounded-2xl p-8 text-white">
            <h2 class="text-2xl font-semibold mb-2">{{ __('Import a file') }}</h2>
            <p class="text-white/70 mb-6">{{ __('PDF, DOCX or PPTX, up to 20 MB. The file becomes a presentation in your workspace.') }}</p>
            <form method="POST" action="{{ route('presentations.upload') }}" enctype="multipart/form-data" class="grid gap-4">
                @csrf
                <div>
                    <label for="title" class="block mb-2 text-white/80">{{ __('Title') }}</label>
                    <input id="title" name="title" required maxlength="255" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
                </div>
                <div>
                    <label for="file" class="block mb-2 text-white/80">{{ __('File') }}</label>
                    <input id="file" name="file" type="file" required accept=".pdf,.docx,.pptx" class="w-full text-white" />
                </div>
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Import') }}</button>
            </form>
        </section>

        <section class="glass-card rounded-2xl p-8 text-white">
            <h2 class="text-2xl font-semibold mb-2">{{ __('Export') }}</h2>
            <p class="text-white/70 mb-6">{{ __('Open a presentation and use your browser to print it to PDF. Exporting to PowerPoint is planned.') }}</p>
            <a href="{{ route('presentations.index') }}" class="inline-block px-6 py-3 rounded-xl glass-card text-white">{{ __('Choose a presentation') }}</a>
        </section>
    </div>
</x-page>
