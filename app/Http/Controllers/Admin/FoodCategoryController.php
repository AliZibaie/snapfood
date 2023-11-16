<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Category as CategoryService;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryService::getFoodCategories();
//        dd($categories);
        return view('panels.admin.categories.food.index', compact('categories'));
    }
}
