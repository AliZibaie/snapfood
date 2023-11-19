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
        $food->image()->delete();
        $food->delete();
    }
    public static function getUnselectedCategories()
    {
//        $selected = Auth::user()->restaurant->restaurantCategories->pluck('type')->toArray();
//        $unselected = RestaurantCategory::query()->whereNotIn('type', $selected)->get();
//        return $unselected;
    }
}
