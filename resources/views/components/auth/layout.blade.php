@props([
    'title',
    'subtitle' => null,
    'showLogo' => true,
])

<div class="min-h-dvh bg-[rgb(var(--c-bg))] text-[rgb(var(--c-fg))]">
    <div class="relative mx-auto flex w-full max-w-[900px] flex-col px-4 py-6 sm:py-10">
        <div class="pointer-events-none absolute inset-0 hidden sm:block">
            <div class="absolute inset-0 opacity-70 dark:opacity-50"
                style="background-image: radial-gradient(700px 260px at 50% 0%, rgba(var(--c-primary), 0.16), transparent 60%);">
            </div>

            <div class="absolute -left-24 top-20 h-64 w-64 rounded-full blur-3xl opacity-50 dark:opacity-35"
                style="background: radial-gradient(circle at 30% 30%, rgba(var(--c-primary), 0.24), transparent 55%);">
            </div>

            <div class="absolute -right-24 bottom-16 h-64 w-64 rounded-full blur-3xl opacity-50 dark:opacity-35"
                style="background: radial-gradient(circle at 70% 70%, rgba(var(--c-primary), 0.20), transparent 55%);">
            </div>
        </div>

        <div class="relative flex items-center justify-between">
            @if ($showLogo)
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 rounded-xl px-2 py-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]">
                    <x-application-logo class="h-8 w-8 fill-current text-[rgb(var(--c-primary))]" />
                    <span class="text-sm font-semibold tracking-tight">{{ config('app.name') }}</span>
                </a>
            @else
                <span></span>
            @endif

            <x-auth.theme-toggle />
        </div>

        <div class="relative mt-8 w-full">
            <div class="mx-auto w-full max-w-[420px]">
                <header class="px-1">
                    <h1 class="text-[26px] font-semibold leading-tight tracking-tight text-[rgb(var(--c-fg))]">
                        {{ $title }}
                    </h1>
                    @if ($subtitle)
                        <p class="mt-2 text-sm leading-relaxed text-[rgb(var(--c-muted))]">
                            {{ $subtitle }}
                        </p>
                    @endif
                </header>

                <div class="mt-6">
                    <x-auth.card>
                        {{ $slot }}
                    </x-auth.card>
                </div>

                <footer class="mt-6 px-1">
                    <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-sm text-[rgb(var(--c-muted))]">
                        <a class="underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ url('/terms') }}">Terms</a>
                        <a class="underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ url('/privacy') }}">Privacy</a>
                        <a class="underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ url('/support') }}">Support</a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
