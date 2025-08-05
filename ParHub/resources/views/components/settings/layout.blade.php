<div class="flex items-start max-md:flex-col animate-fade-in-up">
    <div class="me-10 w-full pb-4 md:w-[220px] animate-fade-in-left delay-100">
        <flux:navlist class="glass-card p-4">
            <flux:navlist.item 
                :href="route('settings.profile')" 
                wire:navigate 
                class="smooth-transition hover:transform hover:translateX-2 hover:scale-105"
            >
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>{{ __('Profile') }}</span>
                </div>
            </flux:navlist.item>
            
            <flux:navlist.item 
                :href="route('settings.password')" 
                wire:navigate 
                class="smooth-transition hover:transform hover:translateX-2 hover:scale-105"
            >
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m0 0a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9a2 2 0 012-2m0 0V7a2 2 0 012-2"></path>
                    </svg>
                    <span>{{ __('Password') }}</span>
                </div>
            </flux:navlist.item>
            
            <flux:navlist.item 
                :href="route('settings.appearance')" 
                wire:navigate 
                class="smooth-transition hover:transform hover:translateX-2 hover:scale-105"
            >
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                    <span>{{ __('Appearance') }}</span>
                </div>
            </flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6 animate-fade-in-right delay-200">
        <div class="glass-card p-8 min-h-[500px]">
            <flux:heading class="animate-scale-in">{{ $heading ?? '' }}</flux:heading>
            <flux:subheading class="animate-fade-in-up delay-100">{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full max-w-lg animate-fade-in-up delay-300">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
