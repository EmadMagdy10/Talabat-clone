<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full text-black text-center py-8"> 
                    <h1 class="text-2xl font-semibold sm:text-4xl my-5 sm:mt-0">Order food online in Egypt</h1>
                    <div class="flex justify-center"> 
                        <x-text-input 
                            class="block mt-1 w-4/6 sm:w-3/6 my-5 text-center" 
                            type="text"  name="search"  placeholder="Search for restaurants" required 
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="mt-4 max-w-7xl mx-auto px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 justify-center">
                @foreach ($restaurants as $restaurant)
                <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 w-72">
                    <a href="{{route('menue.show', $restaurant['id'])}}">
                        <img class="rounded-t-lg h-40 w-full object-cover" src="{{ $restaurant['logo'] }}" alt="Restaurant Logo">
                        <div class="p-3">
                            
                            <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">{{ $restaurant['name'] }}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</x-app-layout>
