<x-guest-layout>
    <x-auth.layout :title="__('Create account')" :subtitle="__('Create your account in seconds.')">
        <form method="POST" action="{{ route('register') }}" x-data="{ processing: false }" @submit="processing = true" class="space-y-4">
            @csrf

            <x-auth.field name="name" :label="__('Full name')" :required="true">
                <x-auth.input
                    name="name"
                    type="text"
                    autocomplete="name"
                    :required="true"
                    :autofocus="true"
                    placeholder="Jane Doe"
                />
            </x-auth.field>

            <x-auth.field name="email" :label="__('Email')" :required="true">
                <x-auth.input
                    name="email"
                    type="email"
                    autocomplete="username"
                    :required="true"
                    placeholder="name@example.com"
                    inputmode="email"
                />
            </x-auth.field>

            <x-auth.field
                name="password"
                :label="__('Password')"
                :required="true"
                :help="__('Use at least 8 characters. Consider a mix of letters, numbers, and symbols.')"
            >
                <x-auth.password-input
                    name="password"
                    autocomplete="new-password"
                    :required="true"
                    placeholder="Create a password"
                />
            </x-auth.field>

            <x-auth.field name="password_confirmation" :label="__('Confirm password')" :required="true">
                <x-auth.password-input
                    name="password_confirmation"
                    autocomplete="new-password"
                    :required="true"
                    placeholder="Repeat password"
                />
            </x-auth.field>

            <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                <x-auth.button-primary
                    :loading-text="__('Creating...')"
                    x-bind:disabled="processing"
                >
                    {{ __('Create account') }}
                </x-auth.button-primary>

                <div class="mt-3 text-center text-sm text-[rgb(var(--c-muted))]">
                    <span>{{ __('Already have an account?') }}</span>
                    <a class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('login') }}">
                        {{ __('Sign in') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth.layout>
</x-guest-layout>
