<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('admin.add-product',$restaurant_id)}}" enctype="multipart/form-data">
        @csrf


        <fieldset class="p-5 border rounded-xl text-xl">
            <legend class="text-center">Add Product</legend>

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="type" :value="__('Type')" />
                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" 
                    required />
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" 
                    required autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" 
                    required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
        
            <div class="mt-4">
                <x-input-label for="image" :value="__('Product Image')" />
                <label class="block w-full py-2 px-3 bg-gray-200 text-gray-700 rounded-lg shadow-sm cursor-pointer hover:bg-gray-300 transition">
                    <span class="block text-center">Upload Image</span>
                    <input id="image" type="file" name="image" accept="image/*" class="hidden" required>
                </label>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
             
                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </fieldset>
    </form>
</x-admin-layout>