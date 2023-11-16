<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Food\StoreFoodCategoryRequest;
use App\Http\Requests\Admin\Categories\Food\UpdateFoodCategoryRequest;
use App\Models\Category;
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
    public function create()
    {
        return view('panels.admin.categories.food.create');
    }
    public function store(StoreFoodCategoryRequest $request)
    {
        try {
            CategoryService::saveFoodCategory($request);
            return redirect('panel/categories/food')->with('success', 'food category created successfully!');
        }catch (\Throwable $exception){
//            dd($exception->getMessage());
            return redirect('panel/categories/food', 500)->with('fail', 'failed to create food category!');
        }
    }
    public function edit(int $id)
    {
        $category = Category::query()->find($id);
        return view('panels.admin.categories.food.edit', compact('category'));
    }

    public function update(UpdateFoodCategoryRequest $request, int $id)
    {
        try {
            Category::query()->where('id', $id)->update($request->validated());
            return redirect('panel/categories/food')->with('success', 'food category updated successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/categories/food', 500)->with('fail', 'failed to update food category!');
        }
    }
    public function destroy(int $id)
    {
        try {
            Category::destroy($id);
            return redirect('panel/categories/food')->with('success', 'food category deleted successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/categories/food', 500)->with('fail', 'failed to delete food category!');
        }
    }
}
