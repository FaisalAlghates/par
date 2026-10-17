@php($template = $template ?? null)
@php($json = fn ($value, $fallback) => json_encode($value ?: $fallback, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
<div class="glass-card rounded-2xl p-8 text-white grid gap-6 max-w-3xl">
    <div>
        <label for="name" class="block mb-2 text-white/80">{{ __('Name') }}</label>
        <input id="name" name="name" required maxlength="255" value="{{ old('name', $template?->name) }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
    </div>
    <div>
        <label for="description" class="block mb-2 text-white/80">{{ __('Description') }}</label>
        <textarea id="description" name="description" rows="3" required class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">{{ old('description', $template?->description) }}</textarea>
    </div>
    <div class="grid gap-6 sm:grid-cols-3">
        <div>
            <label for="category_id" class="block mb-2 text-white/80">{{ __('Category') }}</label>
            <select id="category_id" name="category_id" required class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="text-black" @selected(old('category_id', $template?->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="type" class="block mb-2 text-white/80">{{ __('Type') }}</label>
            <select id="type" name="type" required class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">
                <option value="free" class="text-black" @selected(old('type', $template?->is_premium ? 'premium' : 'free') === 'free')>{{ __('Free') }}</option>
                <option value="premium" class="text-black" @selected(old('type', $template?->is_premium ? 'premium' : 'free') === 'premium')>{{ __('Premium') }}</option>
            </select>
        </div>
        <div>
            <label for="price" class="block mb-2 text-white/80">{{ __('Price') }}</label>
            <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $template?->price) }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
        </div>
    </div>
    <div>
        <label for="layout" class="block mb-2 text-white/80">{{ __('Layout (JSON)') }}</label>
        <textarea id="layout" name="layout" rows="6" required class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white font-mono text-sm">{{ old('layout', $json($template?->layout, [['title' => 'Title slide', 'content' => '', 'type' => 'title']])) }}</textarea>
    </div>
    <div>
        <label for="styles" class="block mb-2 text-white/80">{{ __('Styles (JSON)') }}</label>
        <textarea id="styles" name="styles" rows="4" required class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white font-mono text-sm">{{ old('styles', $json($template?->styles, ['font' => 'Inter', 'background' => '#0f172a', 'accent' => '#8b5cf6'])) }}</textarea>
    </div>
    <div>
        <label for="tags" class="block mb-2 text-white/80">{{ __('Tags (comma separated)') }}</label>
        <input id="tags" name="tags" value="{{ old('tags') }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
    </div>
    <div>
        <label for="preview_image" class="block mb-2 text-white/80">{{ __('Preview image') }}</label>
        <input id="preview_image" name="preview_image" type="file" accept="image/*" class="w-full text-white" />
    </div>
    <label class="flex items-center gap-3">
        <input type="hidden" name="is_active" value="0" />
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $template?->is_active ?? true)) class="w-5 h-5" />
        <span>{{ __('Active') }}</span>
    </label>
    <div class="flex gap-3">
        <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Save') }}</button>
        <a href="{{ route('templates.index') }}" class="px-6 py-3 rounded-xl glass-card text-white">{{ __('Cancel') }}</a>
    </div>
</div>
