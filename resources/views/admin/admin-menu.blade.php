<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Show Menu') }}
            </h2>
            <a href="{{ route('admin.add-product', $id) }}" class="bg-green-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-green-600 transition duration-300">
                {{ __('Add New Product') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <!-- تحقق من وجود المنتجات وعرضها -->
                @if ($menu->isNotEmpty())
                    <div class="w-full text-black text-center py-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            @foreach ($menu as $product)
                                <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-lg overflow-hidden">
                                    <!-- صورة المنتج -->
                                    <img class="rounded-t-lg h-40 w-full object-cover" src="{{ asset('storage/' . $product['image']) }}" alt="Product Image">
                                    
                                    <!-- تفاصيل المنتج -->
                                    <div class="p-4">
                                        <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">
                                            {{ $product['name'] }}
                                        </h5>
                                        <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">
                                            {{ $product['price']  }}$
                                        </h5>
                                        
                                        <!-- أزرار التحكم في المنتج -->
                                        <div class="flex justify-between items-center mt-4">
                                            <!-- زر تعديل المنتج -->
                                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                                                {{ __('Edit') }}
                                            </a>

                                            <!-- زر حذف المنتج -->
                                            <form action="{{ route('admin.delete', $product['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition duration-300">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="w-full text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400">{{ __('No products available.') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
