@props([
    'name',
    'label',
    'help' => null,
    'required' => false,
    'id' => null,
])

@php
    $fieldId = $id ?? $name;
    $hasError = $errors->has($name);
    $errorMessage = $errors->first($name);
@endphp

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    <label for="{{ $fieldId }}" class="block text-[13px] font-medium text-[rgb(var(--c-fg))]">
        {{ $label }}
        @if ($required)
            <span class="text-[rgb(var(--c-danger))]" aria-hidden="true">*</span>
        @endif
    </label>

    {{ $slot }}

    <p id="{{ $fieldId }}-help" class="{{ $help ? 'text-xs text-[rgb(var(--c-muted))]' : 'sr-only' }}">
        {{ $help ?? '' }}
    </p>

    <p id="{{ $fieldId }}-error" class="{{ $hasError ? 'text-xs text-[rgb(var(--c-danger))]' : 'sr-only' }}" role="{{ $hasError ? 'alert' : 'none' }}">
        {{ $hasError ? $errorMessage : '' }}
    </p>
</div>

