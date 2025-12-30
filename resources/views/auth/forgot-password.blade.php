<x-guest-layout>
    <x-auth.layout :title="__('Reset password')" :subtitle="__('We\'ll email you a reset link if the address exists.')">
        @if (session('status'))
            <x-auth.alert type="success" title="{{ __('Check your email') }}" class="mb-4">
                {{ __('If the email exists, we sent a password reset link.') }}
            </x-auth.alert>

            <x-auth.button-secondary href="{{ route('login') }}">
                {{ __('Back to sign in') }}
            </x-auth.button-secondary>
        @else
            <form method="POST" action="{{ route('password.email') }}" x-data="{ processing: false }" @submit="processing = true" class="space-y-4">
                @csrf

                <x-auth.field name="email" :label="__('Email')" :required="true">
                    <x-auth.input
                        name="email"
                        type="email"
                        autocomplete="username"
                        :required="true"
                        :autofocus="true"
                        placeholder="name@example.com"
                        inputmode="email"
                    />
                </x-auth.field>

                <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                    <x-auth.button-primary
                        :loading-text="__('Sending...')"
                        x-bind:disabled="processing"
                    >
                        {{ __('Send reset link') }}
                    </x-auth.button-primary>

                    <div class="mt-3 text-center text-sm">
                        <a class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('login') }}">
                            {{ __('Back to sign in') }}
                        </a>
                    </div>
                </div>
            </form>
        @endif
    </x-auth.layout>
</x-guest-layout>
