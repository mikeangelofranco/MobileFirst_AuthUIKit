<a
    {{ $attributes->merge([
        'class' => 'inline-flex h-12 w-full items-center justify-center rounded-xl border border-[rgb(var(--c-border))] bg-[rgb(var(--c-surface))] px-4 text-base font-semibold text-[rgb(var(--c-fg))] shadow-sm outline-none transition hover:bg-[rgb(var(--c-muted-bg))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]',
    ]) }}
>
    {{ $slot }}
</a>

