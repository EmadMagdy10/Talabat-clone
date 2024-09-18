<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded">
        {{ session('error') }}
    </div>
@endif
@if (session('delete'))
    <div class="bg-red-500 text-white p-4 rounded">
        {{ session('delete') }}
    </div>
@endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full text-black text-center py-8"> 
                    <h1 class="text-2xl font-semibold sm:text-4xl my-5 sm:mt-0">Review Your Cart</h1>
                </div>
            </div>
            
            <!-- Cart Items Section -->
            <div class="mt-4 max-w-7xl mx-auto px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center">
                @foreach ($cartItems as $cartItem)
                <div class="bg-white shadow-lg border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 w-72">
                    <a href="{{ route('menue.show', $cartItem->menu->id) }}">
                        <img class="rounded-t-lg h-40 w-full object-cover" src="{{ asset('storage/' . $cartItem->menu->image) }}" alt="Menu Item Logo">
                    </a>
                    <div class="p-4">
                        <!-- Display item name -->
                        <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">{{ $cartItem->menu->name }}</h5>

                        <!-- Display item price -->
                        <p class="text-gray-700 dark:text-gray-400 mb-4">Price: {{ $cartItem->price . '$' }} </p>

                        <!-- Select quantity with plus/minus buttons -->
                        <div class="flex items-center justify-center mb-4">
                            <button class="bg-gray-200 px-3 py-1 rounded-l-lg text-gray-700" onclick="decreaseQuantity('{{ $cartItem->menu->id }}')">-</button>
                            <input id="quantity-{{ $cartItem->menu->id }}" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="border border-gray-300 w-12 text-center">
                            <button class="bg-gray-200 px-3 py-1 rounded-r-lg text-gray-700" onclick="increaseQuantity('{{ $cartItem->menu->id }}')">+</button>
                        </div>

                        <!-- Button to update or remove item from cart -->
                        <form action="{{ route('update.item.cart', $cartItem->menu->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="hidden-quantity-{{ $cartItem->menu->id }}" name="quantity" value="{{ $cartItem->quantity }}">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>                
                        </form>
                        <form action="{{route('delete.item.cart' , $cartItem->id ) }}" method="post" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                {{ __('Remove') }}
                            </x-danger-button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Cart Summary Section -->
            <div class="mt-8 max-w-7xl mx-auto px-8 text-center">
                <h2 class="text-xl font-semibold mb-4">Cart Summary</h2>
                <p class="text-gray-700 dark:text-gray-400 mb-2">Total Items: {{ $totalItems }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4">Total Amount: {{ $totalAmount . '$' }}</p>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md shadow-sm text-white hover:bg-blue-600">
                    {{ __('Proceed to Checkout') }}
                </a>
            </div>
        </div>
    </div>

    <!-- JavaScript for handling quantity increment/decrement -->
    <script>
        function decreaseQuantity(productId) {
            var quantityInput = document.getElementById('quantity-' + productId);
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                document.getElementById('hidden-quantity-' + productId).value = quantityInput.value;
            }
        }

        function increaseQuantity(productId) {
            var quantityInput = document.getElementById('quantity-' + productId);
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            document.getElementById('hidden-quantity-' + productId).value = quantityInput.value;
        }
    </script>
</x-app-layout>
