@props([
    'name',
    'id' => null,
    'type' => 'text',
    'value' => null,
    'autocomplete' => null,
    'required' => false,
    'autofocus' => false,
])

@php
    $inputId = $id ?? $name;
    $hasError = $errors->has($name);
@endphp

<input
    id="{{ $inputId }}"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ old($name, $value) }}"
    @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
    @if ($required) required @endif
    @if ($autofocus) autofocus @endif
    aria-describedby="{{ $inputId }}-help {{ $inputId }}-error"
    aria-invalid="{{ $hasError ? 'true' : 'false' }}"
    {{ $attributes->merge([
        'class' => ($hasError
            ? 'h-12 w-full rounded-xl border border-[rgb(var(--c-danger))] bg-[rgb(var(--c-surface))] px-3 text-base text-[rgb(var(--c-fg))] shadow-sm outline-none placeholder:text-[rgb(var(--c-muted))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-danger))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed disabled:bg-[rgb(var(--c-muted-bg))]'
            : 'h-12 w-full rounded-xl border border-[rgb(var(--c-border))] bg-[rgb(var(--c-surface))] px-3 text-base text-[rgb(var(--c-fg))] shadow-sm outline-none placeholder:text-[rgb(var(--c-muted))] focus-visible:border-[rgb(var(--c-primary))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed disabled:bg-[rgb(var(--c-muted-bg))]'
        ),
    ]) }}
/>

