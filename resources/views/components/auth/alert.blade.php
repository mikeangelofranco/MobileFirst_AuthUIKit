@props([
    'type' => 'info', // info|success|error
    'title' => null,
])

@php
    $styles = match ($type) {
        'success' => [
            'bg' => 'bg-[rgba(var(--c-success),0.12)]',
            'ring' => 'ring-[rgba(var(--c-success),0.35)]',
            'text' => 'text-[rgb(var(--c-success))]',
        ],
        'error' => [
            'bg' => 'bg-[rgba(var(--c-danger),0.10)]',
            'ring' => 'ring-[rgba(var(--c-danger),0.35)]',
            'text' => 'text-[rgb(var(--c-danger))]',
        ],
        default => [
            'bg' => 'bg-[rgba(var(--c-primary),0.10)]',
            'ring' => 'ring-[rgba(var(--c-primary),0.30)]',
            'text' => 'text-[rgb(var(--c-fg))]',
        ],
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-xl {$styles['bg']} p-4 ring-1 {$styles['ring']}"]) }} role="status">
    @if ($title)
        <div class="text-sm font-semibold {{ $styles['text'] }}">{{ $title }}</div>
    @endif
    <div class="mt-1 text-sm text-[rgb(var(--c-fg))]">
        {{ $slot }}
    </div>
</div>

