@props([
    'loadingText' => null,
])

<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-[rgb(var(--c-primary))] px-4 text-base font-semibold text-white shadow-sm outline-none transition hover:bg-[rgb(var(--c-primary-hover))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed disabled:bg-[rgb(var(--c-primary-disabled))] disabled:text-white/90',
    ]) }}
>
    <svg x-show="processing" x-cloak class="h-5 w-5 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
    </svg>

    @if ($loadingText)
        <span x-show="!processing">{{ $slot }}</span>
        <span x-show="processing" x-cloak>{{ $loadingText }}</span>
    @else
        {{ $slot }}
    @endif
</button>

