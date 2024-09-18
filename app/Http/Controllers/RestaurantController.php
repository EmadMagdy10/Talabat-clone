<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show()
    {
        $restaurants = Restaurant::all()->toArray();
        return view('food/food', compact('restaurants'));
    }
}
