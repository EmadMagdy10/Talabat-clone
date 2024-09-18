<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::select(['name', 'image'])->get()->toArray();
        return view('welcome', compact('categories'));
    }
}
