
<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf


        <fieldset class="p-5 border rounded-xl text-xl">
            <legend class="text-center">Registration Form</legend>
            <!-- First Name-->

            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name') ?? (session('name') ? session('name')[0] : '')"
                    required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <!-- Last Name -->

            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name') ?? (session('name') ? session('name')[1] : '')"
                    required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? (session('provider_user') ? session('provider_user')->email : '')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            {{-- <div class="mt-4">
                <x-input-label for="governorate" :value="__('Governorate')" />
                <select id="governorate" name="governorate" class="block mt-1 w-full form-select">
                    <option value="alexandria" {{ old('governorate') == 'alexandria' ? 'selected' : '' }}>
                        Alexandria
                    </option>
                    <option value="cairo" {{ old('governorate') == 'cairo' ? 'selected' : '' }}>
                        Cairo
                    </option>
                </select>
                <x-input-error :messages="$errors->get('governorate')" class="mt-2" />
            </div> --}}
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </fieldset>
    </form>
</x-guest-layout>
