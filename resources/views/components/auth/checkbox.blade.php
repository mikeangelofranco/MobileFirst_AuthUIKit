@props([
    'name',
    'id' => null,
    'checked' => false,
])

@php
    $checkboxId = $id ?? $name;
@endphp

<input
    id="{{ $checkboxId }}"
    name="{{ $name }}"
    type="checkbox"
    @checked(old($name, $checked))
    {{ $attributes->merge([
        'class' => 'h-5 w-5 rounded-md border border-[rgb(var(--c-border))] text-[rgb(var(--c-primary))] focus:ring-2 focus:ring-[rgb(var(--c-primary))] focus:ring-offset-2 focus:ring-offset-[rgb(var(--c-bg))] disabled:cursor-not-allowed',
    ]) }}
/>

