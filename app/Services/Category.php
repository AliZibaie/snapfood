<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Category
{
    public static function saveRestaurantCategory($request)
    {
        $category = \App\Models\Category::query()->create($request->validated());
        DB::table('categoriable')->insert(['categoriable_type'=>'App/Model/Restaurant', 'category_id'=>$category->id]);
    }
}
