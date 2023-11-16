<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Restaurant\StoreRestaurantCategoryRequest;
use App\Models\Category;
use App\Services\Image;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('panels.admin.categories.restaurant.index', compact('categories'));
    }

    public function create()
    {
        return view('panels.admin.categories.restaurant.create');
    }

    public function store(StoreRestaurantCategoryRequest $request)
    {
        try {
            Category::query()->create($request->validated());
            return redirect('panel/categories/restaurant')->with('success', 'restaurant category created successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/categories/restaurant', 500)->with('fail', 'failed to create restaurant category!');
        }
    }
}
