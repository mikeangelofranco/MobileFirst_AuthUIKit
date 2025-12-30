<div {{ $attributes->merge(['class' => 'rounded-2xl bg-[rgba(var(--c-surface),0.94)] p-5 shadow-lg ring-1 ring-[rgb(var(--c-border))] backdrop-blur-sm transition-shadow duration-150 dark:bg-[rgba(var(--c-surface),0.90)] dark:shadow-[0_12px_45px_rgba(0,0,0,0.35)] sm:p-6']) }}>
    {{ $slot }}
</div>
