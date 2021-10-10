<x-guest-layout>
    <div class="grid sm:grid-cols-2 items-center">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-logo class="h-20" />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">

                    @if (Route::has('register'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    @endif

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>

        <div class="text-gray-600 p-10 space-y-4">

            <h2 class="text-3xl font-bold">Every So Often</h2>

            <p>Set-up recurring tasks and get reminders sent to your inbox.</p>

            <p>For example; <strong>Change the furnace filter every 4 months.</strong></p>

            <p>Created by <a class="underline text-blue" href="https://github.com/RPillz/EverySoOften">@RPillz</a></p>

        </div>
    </div>

</x-guest-layout>
