@props([
    'name' => 'code',
    'length' => 6,
])

<input
    name="{{ $name }}"
    inputmode="numeric"
    pattern="[0-9]*"
    autocomplete="one-time-code"
    maxlength="{{ $length }}"
    placeholder="{{ str_repeat('*', $length) }}"
    {{ $attributes->merge([
        'class' => 'h-12 w-full rounded-xl border border-[rgb(var(--c-border))] bg-[rgb(var(--c-surface))] px-3 text-base tracking-[0.35em] text-[rgb(var(--c-fg))] shadow-sm outline-none placeholder:text-[rgb(var(--c-muted))] focus-visible:border-[rgb(var(--c-primary))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]',
    ]) }}
/>
