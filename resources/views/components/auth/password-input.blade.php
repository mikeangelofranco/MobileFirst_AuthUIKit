@props([
    'name',
    'id' => null,
    'autocomplete' => null,
    'required' => false,
    'autofocus' => false,
])

@php
    $inputId = $id ?? $name;
    $hasError = $errors->has($name);
@endphp

<div x-data="{ show: false }" class="relative">
    <input
        id="{{ $inputId }}"
        name="{{ $name }}"
        :type="show ? 'text' : 'password'"
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if ($required) required @endif
        @if ($autofocus) autofocus @endif
        aria-describedby="{{ $inputId }}-help {{ $inputId }}-error"
        aria-invalid="{{ $hasError ? 'true' : 'false' }}"
        {{ $attributes->merge([
            'class' => ($hasError
                ? 'h-12 w-full rounded-xl border border-[rgb(var(--c-danger))] bg-[rgb(var(--c-surface))] px-3 pr-12 text-base text-[rgb(var(--c-fg))] shadow-sm outline-none placeholder:text-[rgb(var(--c-muted))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-danger))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed disabled:bg-[rgb(var(--c-muted-bg))]'
                : 'h-12 w-full rounded-xl border border-[rgb(var(--c-border))] bg-[rgb(var(--c-surface))] px-3 pr-12 text-base text-[rgb(var(--c-fg))] shadow-sm outline-none placeholder:text-[rgb(var(--c-muted))] focus-visible:border-[rgb(var(--c-primary))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed disabled:bg-[rgb(var(--c-muted-bg))]'
            ),
        ]) }}
    />

    <button
        type="button"
        class="absolute inset-y-0 right-0 inline-flex items-center justify-center rounded-r-xl px-3 text-sm text-[rgb(var(--c-muted))] hover:text-[rgb(var(--c-fg))] focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]"
        :aria-label="show ? 'Hide password' : 'Show password'"
        :aria-pressed="show.toString()"
        @click="show = !show"
    >
        <span x-show="!show">Show</span>
        <span x-show="show">Hide</span>
    </button>
</div>

