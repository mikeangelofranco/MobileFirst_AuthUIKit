<x-guest-layout>
    <x-auth.layout :title="__('Verify your email')" :subtitle="__('Check your inbox and click the verification link to continue.')">
        @if (session('status') === 'verification-link-sent')
            <x-auth.alert type="success" class="mb-4">
                {{ __('Verification email resent.') }}
            </x-auth.alert>
        @endif

        <div class="text-sm leading-relaxed text-[rgb(var(--c-muted))]">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\\'t receive the email, you can request another.') }}
        </div>

        <div
            class="mt-6 space-y-3"
            x-data="{ processing: false, cooldown: {{ session('status') === 'verification-link-sent' ? 60 : 0 }} }"
            x-init="if (cooldown > 0) { const t = setInterval(() => { cooldown = Math.max(0, cooldown - 1); if (cooldown === 0) clearInterval(t); }, 1000); }"
        >
            <form method="POST" action="{{ route('verification.send') }}" @submit="processing = true" class="space-y-3">
                @csrf

                <x-auth.button-primary
                    :loading-text="__('Resending...')"
                    x-bind:disabled="processing || cooldown > 0"
                >
                    <span x-show="cooldown === 0">{{ __('Resend verification email') }}</span>
                    <span x-show="cooldown > 0" x-cloak>{{ __('Resend in') }} <span x-text="cooldown"></span>s</span>
                </x-auth.button-primary>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="h-12 w-full rounded-xl border border-[rgb(var(--c-border))] bg-[rgb(var(--c-surface))] px-4 text-base font-semibold text-[rgb(var(--c-fg))] shadow-sm outline-none transition hover:bg-[rgb(var(--c-muted-bg))] focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]"
                >
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-auth.layout>
</x-guest-layout>
