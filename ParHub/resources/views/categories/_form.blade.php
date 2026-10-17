@php($category = $category ?? null)
<div class="glass-card rounded-2xl p-8 text-white grid gap-6 max-w-2xl">
    <div>
        <label for="name" class="block mb-2 text-white/80">{{ __('Name') }}</label>
        <input id="name" name="name" required maxlength="255" value="{{ old('name', $category?->name) }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
    </div>
    <div>
        <label for="description" class="block mb-2 text-white/80">{{ __('Description') }}</label>
        <textarea id="description" name="description" rows="3" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white">{{ old('description', $category?->description) }}</textarea>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label for="color" class="block mb-2 text-white/80">{{ __('Color') }}</label>
            <input id="color" name="color" type="color" value="{{ old('color', $category?->color ?: '#8b5cf6') }}" class="h-12 w-full rounded-xl bg-white/10 border border-white/20" />
        </div>
        <div>
            <label for="icon" class="block mb-2 text-white/80">{{ __('Icon name') }}</label>
            <input id="icon" name="icon" maxlength="100" value="{{ old('icon', $category?->icon) }}" class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white" />
        </div>
    </div>
    <label class="flex items-center gap-3">
        <input type="hidden" name="is_active" value="0" />
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category?->is_active ?? true)) class="w-5 h-5" />
        <span>{{ __('Active') }}</span>
    </label>
    <div class="flex gap-3">
        <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold">{{ __('Save') }}</button>
        <a href="{{ route('categories.index') }}" class="px-6 py-3 rounded-xl glass-card text-white">{{ __('Cancel') }}</a>
    </div>
</div>
