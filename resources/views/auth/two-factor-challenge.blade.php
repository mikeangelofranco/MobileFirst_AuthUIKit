<x-guest-layout>
    <x-auth.layout :title="__('Two-step verification')" :subtitle="__('Enter the 6-digit code from your authenticator app.')">
        <form method="POST" action="#" x-data="{ processing: false, cooldown: 0 }" @submit.prevent="processing = true" class="space-y-4">
            <x-auth.field name="code" :label="__('Verification code')" :required="true" :help="__('This is a UI-only placeholder. Wire this up to Fortify/Jetstream to enable real 2FA.')">
                <x-auth.otp-input name="code" />
            </x-auth.field>

            <label for="trust_device" class="inline-flex items-center gap-2 text-sm text-[rgb(var(--c-muted))]">
                <x-auth.checkbox name="trust_device" id="trust_device" />
                <span>{{ __('Trust this device') }}</span>
            </label>

            <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                <x-auth.button-primary :loading-text="__('Verifying...')" x-bind:disabled="processing">
                    {{ __('Verify') }}
                </x-auth.button-primary>

                <div class="mt-3 text-center text-sm text-[rgb(var(--c-muted))]">
                    <button
                        type="button"
                        class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]"
                        x-bind:disabled="cooldown > 0"
                        @click="cooldown = 60; const t = setInterval(() => { cooldown = Math.max(0, cooldown - 1); if (cooldown === 0) clearInterval(t); }, 1000);"
                    >
                        <span x-show="cooldown === 0">{{ __('Resend code') }}</span>
                        <span x-show="cooldown > 0" x-cloak>{{ __('Resend in') }} <span x-text="cooldown"></span>s</span>
                    </button>
                </div>
            </div>
        </form>
    </x-auth.layout>
</x-guest-layout>
