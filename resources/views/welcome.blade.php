<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Talabat</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
</head>

<body class="relative w-full">
    <nav x-data="{ open: false }"
        class="bg-orange-600 text-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <h1 class="font-bold text-4xl mt-3">talabat</h1>
                        <x-nav-link class="" href="">{{ __('All Restaurants') }}</x-nav-link>
                        <x-nav-link class="" href="">{{ __('Become a partner') }}</x-nav-link>
                        <x-nav-link class="" href="">{{ __('Offer') }}</x-nav-link>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="w-full flex items-center justify-between sm:hidden">
                    <h1 class="font-bold text-4xl my-3">talabat</h1>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Login/Register Buttons -->
                <div class="hidden sm:flex items-center space-x-4">
                    <x-primary-link class="" href="{{ route('login') }}">{{ __('Log in') }}</x-primary-link>
                    <x-primary-link class="" href="{{ route('register') }}">{{ __('Register') }}</x-primary-link>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1 my-2">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pb-1 border-t  border-gray-200 dark:border-gray-600">
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                </div>

                <x-responsive-nav-link class=""
                    href="">{{ __('All Restaurants') }}</x-responsive-nav-link>
                <x-responsive-nav-link class=""
                    href="">{{ __('Become a partner') }}</x-responsive-nav-link>
                <x-responsive-nav-link class="" href="">{{ __('Offer') }}</x-responsive-nav-link>

                <!-- Login/Register Buttons -->
                <div class="flex justify-end text-center m-2">
                    <x-responsive-nav-link class="text-center" href="{{ route('login') }}">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link class="text-center" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex justify-center items-center bg-pink-50 h-auto mb-10">
        <!-- Image containers go here -->
        {{-- <div class="w-2/12 hidden sm:block">
            <img class="w-full" src="{{ asset('build/assets/pngegg.png') }}" alt="">
        </div> --}}

        <div class="w-8/12 text-black text-center">
            <h1 class="text-2xl font-semibold sm:text-4xl my-5 sm:mt-0">Order food online in Egypt</h1>
            <div class="flex justify-center">
                <x-text-input class="block mt-1 w-4/6 sm: my-5" type="text" name="search"
                    placeholder="Search for restaurants or categories" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        {{-- <div class="w-2/12 hidden sm:block">
            <img class="w-full" src="{{ asset('build/assets/pngegg (1).png') }}" alt="">
        </div> --}}
    </div>
    <section>
        <div class="text-center mb-10">
            <p class="text-2xl font-semibold mb-3">Your everyday, right away</p>
            <p class="text-sm">Order food and grocery delivery online from hundreds of</p>
            <p class="text-sm">restaurants and shops nearby.</p>
        </div>

        <div class="w-7xl mx-auto px-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 justify-center">
            @foreach ($categories as $category)
            <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full h-48 object-cover" src="{{ $category['image'] }}" alt="">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{$category['name']}}</h5>
                    </a>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Explore
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
    </section>
</body>

</html>
