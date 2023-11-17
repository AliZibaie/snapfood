<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Category
{
    public static function saveRestaurantCategory($request)
    {
        $category = \App\Models\Category::query()->create($request->validated());
        DB::table('categoriables')->insert(['categoriable_type'=>'App/Models/Restaurant', 'category_id'=>$category->id, 'created_at'=>now()]);
    }
    public static function saveFoodCategory($request)
    {
        $category = \App\Models\Category::query()->create($request->validated());
        DB::table('categoriables')->insert(['categoriable_type'=>'App/Models/Food', 'category_id'=>$category->id, 'created_at'=>now()]);
    }

    public static function getRestaurantCategories()
    {
        return \App\Models\Category::query()
            ->select('*')
            ->join('categoriables', 'categoriables.category_id', '=', 'categories.id')
            ->where('categoriables.categoriable_type', '=',  'App/Models/Restaurant')->get();
    }

    public static function getFoodCategories()
    {
        return \App\Models\Category::query()
            ->select('*')
            ->join('categoriables', 'categoriables.category_id', '=', 'categories.id')
            ->where('categoriables.categoriable_type', '=',  'App/Models/Food')->get();
    }

    public static function saveRestaurantCategories(...$types)
    {
        self::saveRestaurantCategory();
    }
}
