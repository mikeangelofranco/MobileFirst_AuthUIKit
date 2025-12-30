<x-guest-layout>
    <x-auth.layout :title="__('Choose a new password')" :subtitle="__('Enter your email and set a new password.')">
        @if (session('status'))
            <x-auth.alert type="success" class="mb-4">
                {{ session('status') }}
            </x-auth.alert>
        @endif

        @if ($errors->any() && ! $errors->has('email') && ! $errors->has('password') && ! $errors->has('password_confirmation'))
            <x-auth.alert type="error" title="{{ __('Reset failed') }}" class="mb-4">
                {{ __('Something went wrong. Please request a new reset link and try again.') }}
            </x-auth.alert>
        @endif

        <form method="POST" action="{{ route('password.store') }}" x-data="{ processing: false }" @submit="processing = true" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-auth.field name="email" :label="__('Email')" :required="true">
                <x-auth.input
                    name="email"
                    type="email"
                    autocomplete="username"
                    :required="true"
                    :autofocus="true"
                    :value="old('email', $request->email)"
                    placeholder="name@example.com"
                    inputmode="email"
                />
            </x-auth.field>

            <x-auth.field name="password" :label="__('New password')" :required="true">
                <x-auth.password-input
                    name="password"
                    autocomplete="new-password"
                    :required="true"
                    placeholder="New password"
                />
            </x-auth.field>

            <x-auth.field name="password_confirmation" :label="__('Confirm new password')" :required="true">
                <x-auth.password-input
                    name="password_confirmation"
                    autocomplete="new-password"
                    :required="true"
                    placeholder="Repeat password"
                />
            </x-auth.field>

            <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                <x-auth.button-primary
                    :loading-text="__('Resetting...')"
                    x-bind:disabled="processing"
                >
                    {{ __('Reset password') }}
                </x-auth.button-primary>

                <div class="mt-3 text-center text-sm">
                    <a class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('password.request') }}">
                        {{ __('Request a new reset link') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth.layout>
</x-guest-layout>
