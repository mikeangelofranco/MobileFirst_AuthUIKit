<x-guest-layout>
    <x-auth.layout :title="__('Sign in')" :subtitle="__('Welcome back. Sign in to continue.')">
        @if (session('status'))
            <x-auth.alert type="success" class="mb-4">
                {{ session('status') }}
            </x-auth.alert>
        @endif

        @if (($errors->first('email') === __('auth.failed')) || ($errors->first('email') === __('auth.throttle')))
            <x-auth.alert type="error" title="{{ __('Sign in failed') }}" class="mb-4">
                {{ $errors->first('email') }}
            </x-auth.alert>
        @endif

        <form method="POST" action="{{ route('login') }}" x-data="{ processing: false }" @submit="processing = true" class="space-y-4">
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

            <x-auth.field name="password" :label="__('Password')" :required="true">
                <x-auth.password-input
                    name="password"
                    autocomplete="current-password"
                    :required="true"
                    placeholder="********"
                />
            </x-auth.field>

            <div class="flex items-center justify-between gap-3">
                <label for="remember" class="inline-flex items-center gap-2 text-sm text-[rgb(var(--c-muted))]">
                    <x-auth.checkbox name="remember" id="remember" />
                    <span>{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="sticky bottom-4 pt-2 sm:static sm:bottom-auto sm:pt-0">
                <x-auth.button-primary
                    :loading-text="__('Signing in...')"
                    x-bind:disabled="processing"
                >
                    {{ __('Sign in') }}
                </x-auth.button-primary>

                <div class="mt-3 text-center text-sm text-[rgb(var(--c-muted))]">
                    <span>{{ __('New here?') }}</span>
                    <a class="font-medium text-[rgb(var(--c-primary))] underline-offset-4 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-[rgb(var(--c-primary))] focus-visible:ring-offset-2 focus-visible:ring-offset-[rgb(var(--c-bg))]" href="{{ route('register') }}">
                        {{ __('Create an account') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth.layout>
</x-guest-layout>
