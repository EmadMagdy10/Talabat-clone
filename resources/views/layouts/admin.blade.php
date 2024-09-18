<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- الخطوط -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- السكريبتات -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- شريط التنقل -->
    <nav x-data="{ open: false }" class="bg-orange-600 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl py-2 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="font-bold text-4xl mt-3 text-white">Dashboard</h1>
                    <!-- روابط التنقل -->
                    <div class="hidden sm:flex sm:ml-10 space-x-8 mt-2">
                        <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold text-white hover:text-gray-300">{{ __('Main') }}</a>
                        <a href="#" class="text-xl font-semibold text-white hover:text-gray-300">{{ __('المستخدمون') }}</a>
                        <a href="#" class="text-xl font-semibold text-white hover:text-gray-300">{{ __('الإعدادات') }}</a>
                    </div>
                </div>

                <!-- قائمة الإعدادات المنسدلة -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-700 hover:bg-orange-800 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::guard('admin')->user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('الملف الشخصي') }}</a>
                            <!-- تسجيل الخروج -->
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- زر القائمة للشاشات الصغيرة -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- قائمة التنقل للشاشات الصغيرة -->
        <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-base font-medium text-white">{{ __('Main') }}</a>
                <a href="#" class="block px-4 py-2 text-base font-medium text-white">{{ __('المستخدمون') }}</a>
                <a href="#" class="block px-4 py-2 text-base font-medium text-white">{{ __('الإعدادات') }}</a>
            </div>

            <!-- خيارات الإعدادات للشاشات الصغيرة -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::guard('admin')->user()->name }}</div>
                    <div class="font-medium text-sm text-gray-300">{{ Auth::guard('admin')->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <a href="#" class="block px-4 py-2 text-base font-medium text-white">{{ __('الملف الشخصي') }}</a>
                    <!-- تسجيل الخروج -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-base font-medium text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- محتوى الصفحة -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
