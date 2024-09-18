<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <fieldset class="p-6 border rounded-xl text-xl bg-white shadow-md max-w-md mx-auto">
            <legend class="text-center text-2xl font-bold mb-6">
                {{ __('Log in') }}
            </legend>
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-600" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Social Login -->
            <div class="flex items-center justify-center mb-4">
                <a href="{{ route('auth.socialitelogin.redirect', 'google') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-md transition ease-in-out duration-150">
                    {{ __('Login with Google') }}
                </a>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="flex items-center justify-center mb-4">
                    <a class="inline-flex items-center px-4 py-2 underline text-sm text-gray-600 hover:text-gray-900 transition ease-in-out duration-150" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif

            <!-- Buttons -->
            <div class="mb-6">
                <x-primary-button class="w-full">
                    {{ __('Login') }}
                </x-primary-button>
            </div>

            <div class="flex gap-4">
                <x-primary-link href="{{ route('register') }}" class="w-1/2 text-center">
                    {{ __('Registration') }}
                </x-primary-link>

                <x-primary-link href="{{ route('admin.login.form') }}" class="w-1/2 text-center">
                    {{ __('Admin Login') }}
                </x-primary-link>
            </div>
        </fieldset>
    </form>
</x-guest-layout>
