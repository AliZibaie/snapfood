<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Food\StoreFoodCategoryRequest;
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
}
