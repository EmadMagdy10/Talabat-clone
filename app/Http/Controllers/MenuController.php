<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;

class MenuController extends Controller
{
    /*------------------------USERS------------------------*/
    public function show($id)
    {
        $menue = Menu::where('restaurant_id', $id)->get()->toArray();
        $restaurant = Restaurant::find($id);
        $restaurant_name = $restaurant->name;
        return view('food/menue', compact('menue', 'restaurant_name'));
    }
    /*------------------------ADMIN------------------------*/

    public function admin_show($id)
    {
        try {
            $restaurant = auth()->user()->restaurants()->find($id);
            $this->authorize('view', $restaurant);

            if (!$restaurant) {
                return redirect()->route('admin.dashboard')->withErrors(['error' => 'Restaurant not found.']);
            }

            $menu = Menu::where('restaurant_id', $id)->get();

            return view('admin.admin-menu', compact('menu', 'id'));
        } catch (AuthorizationException $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'You do not have permission to view this restaurant.']);
        }
    }

    public function delete($id)
    {
        Menu::destroy($id);
        return redirect()->route('admin.menue.show')->with(['delete' => 'Item is Deleted.']);
    }

    public function show_add_product($restaurant_id)
    {
        $restaurant = auth()->user()->restaurants()->find($restaurant_id);

        if (!$restaurant) {
            return redirect()->route('admin.dashboard')->withErrors(['restaurant_id' => 'Restaurant not found or you do not have permission.']);
        }

        return view('admin.add-product', ['restaurant_id' => $restaurant_id]);
    }
    public function add_product(Request $request, $restaurant_id)
    {
        $restaurant = auth()->user()->restaurants()->find($restaurant_id);

        if (!$restaurant) {
            return redirect()->route('admin.dashboard')->withErrors(['restaurant_id' => 'Restaurant not found or you do not have permission.']);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $imagePath = $request->file('image')->store('images/products', 'public');

        $product = Menu::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'restaurant_id' => $restaurant_id,
        ]);

        return redirect()->route('admin.menue.show', $restaurant_id)->with(['success' => 'Product added successfully.']);
    }
}
