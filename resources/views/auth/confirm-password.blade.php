<x-guest-layout>
    <x-auth.layout :title="__('Confirm your password')" :subtitle="__('Please confirm your password to continue.')">
        <form method="POST" action="{{ route('password.confirm') }}" x-data="{ processing: false }" @submit="processing = true" class="space-y-4">
            @csrf

            <x-auth.field name="password" :label="__('Password')" :required="true">
                <x-auth.password-input
                    name="password"
                    autocomplete="current-password"
                    :required="true"
                    :autofocus="true"
                    placeholder="********"
                />
            </x-auth.field>

            <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                <x-auth.button-primary
                    :loading-text="__('Confirming...')"
                    x-bind:disabled="processing"
                >
                    {{ __('Confirm') }}
                </x-auth.button-primary>

                <div class="mt-3 text-center text-sm">
                    <a class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('dashboard') }}">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth.layout>
</x-guest-layout>
