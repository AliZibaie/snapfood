<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Restaurant\StoreRestaurantCategoryRequest;
use App\Http\Requests\Admin\Categories\Restaurant\UpdateRestaurantCategoryRequest;
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

    public function destroy(int $id)
    {
        try {
            Category::destroy($id);
            return redirect('panel/categories/restaurant')->with('success', 'restaurant category deleted successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/categories/restaurant', 500)->with('fail', 'failed to delete restaurant category!');
        }
    }
    public function edit(int $id)
    {
        $category = Category::query()->find($id);
        return view('panels.admin.categories.restaurant.edit', compact('category'));
    }

    public function update(UpdateRestaurantCategoryRequest $request, int $id)
    {
        try {
            Category::query()->where('id', $id)->update($request->validated());
            return redirect('panel/categories/restaurant')->with('success', 'restaurant category updated successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/categories/restaurant', 500)->with('fail', 'failed to update restaurant category!');
        }
    }
}
