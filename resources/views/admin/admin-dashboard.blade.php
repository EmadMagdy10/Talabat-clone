<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ($errors->has('error'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('error') }}</strong>
    </div>
@endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="w-full text-black text-center py-8">
                    @if ($restaurants->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            @foreach ($restaurants as $restaurant)
                                <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-lg overflow-hidden">
                                    <a href="{{ route('admin.menue.show', $restaurant->id) }}" class="block">
                                        <!-- صورة المطعم -->
                                        <img class="rounded-t-lg h-40 w-full object-cover" src="{{ $restaurant->logo }}" alt="Restaurant Logo">
                                        
                                        <!-- تفاصيل المطعم -->
                                        <div class="p-4">
                                            <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">
                                                {{ $restaurant->name }}
                                            </h5>
                                            <p class="text-gray-700 dark:text-gray-400">
                                                {{ $restaurant->description ?? __('No description available') }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">{{ __('No restaurants available.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
