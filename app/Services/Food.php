<?php

namespace App\Services;

use App\Models\FoodCategory;
use App\Models\Food as Model;
use Illuminate\Support\Facades\Auth;

class Food
{
    public static function store($request)
    {
        $newRecord = Auth::user()->restaurant->foods()->create(['name'=>$request->name, 'raw_materials'=>$request->raw_materials, 'price'=>$request->price]);
        if ($request->input('type')){
            foreach ($request->input('type') as $type) {
                $id = FoodCategory::query()->where('type', $type)->first()->id;
                $newRecord->foodCategories()->attach($id);
            }
        }
        if ($request->validated('image')){
            Image::save($request, 'foods', $newRecord);
        }
    }

    public static function delete(Model $food)
    {
        $food->foodCategories()->detach();
        Image::delete($food, 'foods');
        $food->delete();
    }
    public static function getUnselectedCategories(Model $food)
    {
        $selected = $food->foodCategories->pluck('type')->toArray();
        $unselected = FoodCategory::query()->whereNotIn('type', $selected)->get();
        return $unselected;
    }

    public static function update($request, $food)
    {
        $food->update(['name'=>$request->validated('name'), 'raw_materials'=>$request->validated('raw_materials'), 'price'=>$request->validated('price')]);
        if ($request->validated('type')){
            $food->foodCategories()->detach();
            foreach ($request->input('type') as $type) {
                $id = FoodCategory::query()->where('type', $type)->first()->id;
                $food->foodCategories()->attach($id);
            }
        }
        if ($request->validated('image')){
            if (isset($food->image->url)){
                Image::delete($food, 'foods');
            }
            Image::save($request, 'foods', $food);
        }
    }

    public static function index()
    {
        Auth::user()->restaurant->foods()->paginate(5);
        $user = Auth::user();
        $foodsQuery = $user->restaurant->foods()->whereBetween('food.created_at', [now()->startOfWeek(), now()->endOfWeek()]);

        if (request()->has('name') ) {
            $name = request()->input('name');
            $foodsQuery->where('food.name', 'like', "%$name%");
        }

        if (request()->input('category')) {
            $category = request()->input('category');
            $foodsQuery->whereHas('foodCategories', function ($query) use ($category) {
                $query->where('food_categories.type', $category);
            });
        }
        return $foodsQuery->paginate(2);
    }

}
