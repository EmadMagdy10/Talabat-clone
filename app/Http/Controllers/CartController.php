<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Restaurant;

class CartController extends Controller
{
    public function addToCart(Request $request, $menuId)
    {
        $userId = auth()->id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        // استخدام جدول menus بدلاً من products
        $menu = Menu::findOrFail($menuId);
        $restaurantId = $menu->restaurant_id;
        $cartItems = $cart->cartItems;
        if ($cartItems->isNotEmpty()) {
            $firstMenuInCart = $cartItems->first()->menu;
            $firstMenuRestaurantId = $firstMenuInCart->restaurant_id;

            if ($restaurantId !== $firstMenuRestaurantId) {
                return redirect()->route('cart.show')->with('error', 'يمكنك إضافة منتجات من نفس المطعم فقط.');
            }
        }

        CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'menu_id' => $menuId],
            ['quantity' => $request->quantity, 'price' => $menu->price]
        );
        return redirect()->route('cart.show')->with('success', 'Item was added to cart');
    }

    public function showCart()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->with('cartItems.menu')->first();
        $cartItems = $cart ? $cart->cartItems : collect();
        $totalItems = $cartItems->sum('quantity');
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->menu->price * $item->quantity;
        });
        // \dd($cartItems);
        return view('cart', compact('cartItems', 'totalItems', 'totalAmount'));
    }
    public function delete($id)
    {
        CartItem::destroy($id);
        return redirect()->route('cart.show')->with(['delete' => 'Item is Deleted.']);
    }
    public function update_item(Request $request, $id)
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('menu_id', $id)->first();
        if (!$cartItem) {
            return redirect()->route('cart.show')->with('error', 'Item not found in cart.');
        }

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.show')->with('success', 'Cart item updated successfully!');
    }
}
