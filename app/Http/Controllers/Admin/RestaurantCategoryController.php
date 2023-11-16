<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('panels.admin.categories.restaurant.index', compact('categories'));
    }
}
