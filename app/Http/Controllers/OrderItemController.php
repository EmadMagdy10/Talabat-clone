<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function add_item(Request $request, $id)
    {
        $m = Menu::where('id', $id)->get();
        \dd($m);
    }
}
